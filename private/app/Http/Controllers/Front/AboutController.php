<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontControllerBase;
use Illuminate\Http\Request;
use App\Repositories\AboutRepository;
use App\Http\Requests\AboutRequest;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class AboutController extends FrontControllerBase
{   
    protected $aboutRepository;
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository,
            AboutRepository $aboutRepository)
    {        
        parent::__construct("about", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);
        $this->aboutRepository = $aboutRepository;
    }
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        parent::GetPageData();
        $about = $this->aboutRepository->getFirst();
        return view('front.about.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'services' => $this->services 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterAbout' => $this->qtextFooterAbout
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'about' => $about]);
    }
    
    /**
     * Store a newly created about in storage.
     *
     * @param  AboutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'g-recaptcha-response' => 'required|recaptcha',
            'email' => 'bail|required|email'
        ]);
        $this->aboutRepository->store($request->all());

        return redirect('/')->with('ok', trans('front/about.ok'));
    }
    
    
}
