<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontControllerBase;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\CareerCategoryRepository;
use App\Repositories\CareerRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class CareerController extends FrontControllerBase
{    
    protected $careerCategoryRepository;
    protected $careerRepository;
    
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , CareerCategoryRepository $careerCategoryRepository
            , CareerRepository $careerRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {
        parent::__construct("careers", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);        
        $this->careerCategoryRepository = $careerCategoryRepository;
        $this->careerRepository = $careerRepository;
    }
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        parent::GetPageData();      
        return $this->showIndex();
    }
    
    public function getCategory(Request $request, $careerItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-p(?P<digit>\d+)$/', $careerItem, $matches);
        $categoryId = $matches['digit'];           
        $currentCareerCategory = $this->careerCategoryRepository->getById($categoryId);       
        return $this->showIndex($currentCareerCategory);
    }
    
    private function showIndex($currentCareerCategory = null){
        $careerCategories = $this->careerCategoryRepository->getActive(3); 
        if(!$currentCareerCategory){
            $currentCareerCategory = $careerCategories[0];
        }
        $careers = getPaginateByPidData($this->currentMenu,$currentCareerCategory, $this->careerRepository, 6);             
        return view('front.career.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'careerCategories' => $careerCategories
                ,'careers' => $careers,
                'currentCareerCategory' => $currentCareerCategory]);
    }
    
    public function getItem(Request $request, $careerItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-i(?P<digit>\d+)$/', $careerItem, $matches);
        $itemId = $matches['digit'];    
        $careerCategories = $this->careerCategoryRepository->getActive(3);           
        $career = $this->careerRepository->getById($itemId);       
	
        return view('front.career.itemIndex', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'careerCategories' => $careerCategories
                ,'career' => $career] );
    }
    
    
}
