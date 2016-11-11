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
                ,'services' => $this->services 
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
        $this->contactRepository->store($request->all());

        return redirect('/')->with('ok', trans('front/contact.ok'));
    }
    
    
}
