<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontControllerBase;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class ServiceController extends FrontControllerBase
{    
    protected $serviceRepository;
    
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , ServiceRepository $serviceRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {
        parent::__construct("services", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);        
        $this->serviceRepository = $serviceRepository;
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
    
    public function getCategory(Request $request, $serviceItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-p(?P<digit>\d+)$/', $serviceItem, $matches);
        $categoryId = $matches['digit'];           
        $currentServiceCategory = $this->serviceCategoryRepository->getById($categoryId);       
        return $this->showIndex($currentServiceCategory);
    }
    
    private function showIndex($currentServiceCategory = null){
        if(!$currentServiceCategory){
            $currentServiceCategory = $this->serviceCategories[0];
        }
        $services = getPaginateByPidData($this->currentMenu,$currentServiceCategory, $this->serviceRepository, 6);             
        return view('front.service.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'services' => $services,
                'currentServiceCategory' => $currentServiceCategory]);
    }
    
    public function getItem(Request $request, $serviceItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-i(?P<digit>\d+)$/', $serviceItem, $matches);
        $itemId = $matches['digit'];             
        $service = $this->serviceRepository->getById($itemId);       
	
        return view('front.service.itemIndex', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'serviceCategories' => $serviceCategories
                ,'service' => $service] );
    }
    
    
}
