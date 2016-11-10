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
use App\Http\Controllers\Controller;
use Session;

class FrontControllerBase extends Controller
{ 
    protected $menuRepository;
    protected $projectCategoryRepository;
    protected $projectRepository;
    protected $qtextRepository;
    protected $basicConfigRepository;
    
    //variable    
    protected $menus;
    protected $services; 
    protected $qtextRecruit;
    protected $qtextFooterContact;
    protected $qtextIntroduction;
    protected $basicConfigs;
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->serviceCategoryRepository = $serviceCategoryRepository;
        $this->qtextRepository = $qtextRepository;
        $this->basicConfigRepository = $basicConfigRepository;
        $this->middleware('front');
    }    
    public function GetPageData(){
        $this->menus = $this->menuRepository->getActive();
        $this->services = $this->serviceCategoryRepository->getActive(10); 
        $this->qtextRecruit = $this->qtextRepository->getRecruit();
        $this->qtextFooterContact = $this->qtextRepository->getFooterContact();
        $this->qtextIntroduction = $this->qtextRepository->getIntroduction();
        $this->basicConfigs = $this->basicConfigRepository->getAll();
    }
}
