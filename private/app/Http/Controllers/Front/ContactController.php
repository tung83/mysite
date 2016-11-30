<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontControllerBase;
use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
use App\Http\Requests\ContactRequest;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class ContactController extends FrontControllerBase
{   
    protected $contactRepository;
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository,
            ContactRepository $contactRepository)
    {        
        parent::__construct("contact", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);
        $this->contactRepository = $contactRepository;
    }
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        parent::GetPageData();
        $qtextContact = $this->qtextRepository->getContact();
        return view('front.contact.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'qtextContact' => $qtextContact]);
    }
    
    /**
     * Store a newly created contact in storage.
     *
     * @param  ContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'g-recaptcha-response' => 'required|recaptcha',
            'email' => 'bail|required|email'
        ]);
        
        $this->sendMail($request);

        $this->contactRepository->store($request->all());

        return redirect('/')->with('ok', trans('front/contact.ok'));
    }
    
    private function sendMail($request){
        $this->basicConfigs = $this->basicConfigRepository->getAll();  
       
        $subject =  trans('front/site.mail_subject'); 
        $body = '
        <html>
        <head>
        	<title>'.$subject.'</title>
        </head>
        <body>
        	<p>'.trans('front/contact.fullName').': '.$request->input('fullName').'</p>
        	<p>'.trans('front/contact.companyName').': '.$request->input('company').'</p>        	
        	<p>'.trans('front/contact.address').': '.$request->input('address').'</p>
        	<p>'.trans('front/contact.phone').': '.$request->input('phone').'</p>        
        	<p>Fax: '.$request->input('fax').'</p>	
        	<p>Email: '.$request->input('email').'</p>
                <p>'.trans('front/contact.department').': '.$request->input('department').'</p>
        	<p>'.trans('front/contact.content').': '.nl2br($request->input('content')).'</p>
        </body>
        </html>';
//        Mail::send('emails.notificar', ['accion' => $accion], function ($m) use ($accion) {
//            $m->from(env('MAIL_FROM'), env('MAIL_NAME'));
//            $m->to("jtd@adagal.es", "Jtd")->subject('Nova acción formativa');
//        });
//        Mail::send('users.mails.welcome', array('firstname'=>Input::get('firstname')), function($message){
//            $message->to($request->input('search'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome to the Laravel 4 Auth App!');
//        });
        \Mail::send(['html' => 'front.contact.email'], array('body' => $body, 'title'=>$subject)
                , function($message){
                    $receiver = $this->basicConfigs->first(function ($value, $key) {
                   return $value['key'] == 'smtp_receiver';
                   });
                   $message->from('quantrimang.psmedia@gmail.com', trans('front/site.mail_name'));

                   $message->to('nguyenthanhtungdits@yahoo.com')->subject(trans('front/site.mail_subject'));
        });
    }
    
}
