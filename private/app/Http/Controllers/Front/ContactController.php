<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
use App\Http\Requests\ContactRequest;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class ContactController extends Controller
{    
    protected $menuRepository;
    protected $projectCategoryRepository;
    protected $projectRepository;
    protected $qtextRepository;
    protected $basicConfigRepository;
    protected $contactRepository;
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository,
            ContactRepository $contactRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->serviceCategoryRepository = $serviceCategoryRepository;
        $this->qtextRepository = $qtextRepository;
        $this->basicConfigRepository = $basicConfigRepository;
        $this->contactRepository = $contactRepository;
    }
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menuRepository->getActive();
        $services = $this->serviceCategoryRepository->getActive(10); 
        $qtextRecruit = $this->qtextRepository->getRecruit();
        $qtextContact = $this->qtextRepository->getFooterContact();
        $qtextIntroduction = $this->qtextRepository->getIntroduction();
        $basicConfigs = $this->basicConfigRepository->getAll();
        
	
        return view('front.contact.index', compact('menus','services' 
                ,'qtextRecruit'
                , 'qtextContact'
                , 'qtextIntroduction'
                , 'basicConfigs'));
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
