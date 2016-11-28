<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontControllerBase;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\AboutCategoryRepository;
use App\Repositories\AboutRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class AboutController extends FrontControllerBase
{    
    protected $aboutCategoryRepository;
    protected $aboutRepository;
    
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , AboutCategoryRepository $aboutCategoryRepository
            , AboutRepository $aboutRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {
        parent::__construct("abouts", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);        
        $this->aboutCategoryRepository = $aboutCategoryRepository;
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
        return $this->showIndex();
    }
    
    public function getCategory(Request $request, $aboutItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-p(?P<digit>\d+)$/', $aboutItem, $matches);
        $categoryId = $matches['digit'];           
        $currentAboutCategory = $this->aboutCategoryRepository->getById($categoryId);       
        return $this->showIndex($currentAboutCategory);
    }
    
    private function showIndex($currentAboutCategory = null){
        $aboutCategories = $this->aboutCategoryRepository->getActive(3); 
        if(!$currentAboutCategory){
            $currentAboutCategory = $aboutCategories[0];
        }
        $abouts = getPaginateByPidData($this->currentMenu,$currentAboutCategory, $this->aboutRepository, 6);             
        return view('front.about.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'aboutCategories' => $aboutCategories
                ,'abouts' => $abouts,
                'currentAboutCategory' => $currentAboutCategory]);
    }
    
    public function getItem(Request $request, $aboutItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-i(?P<digit>\d+)$/', $aboutItem, $matches);
        $itemId = $matches['digit'];    
        $aboutCategories = $this->aboutCategoryRepository->getActive(3);           
        $about = $this->aboutRepository->getById($itemId);       
	
        return view('front.about.itemIndex', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'aboutCategories' => $aboutCategories
                ,'about' => $about] );
    }
    
    
}
