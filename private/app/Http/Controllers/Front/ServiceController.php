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
        $services = getPaginateByPidData($this->currentMenu,$serviceCategories[0], $this->serviceRepository, 6);     
        return view('front.service.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'services' => $this->services 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'serviceCategories' => $serviceCategories
                ,'services' => $services] );
    }
    
    public function getItem(Request $request, $serviceItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-i(?P<digit>\d+)$/', $serviceItem, $matches);
        $itemId = $matches['digit'];    
        $serviceCategories = $this->serviceCategoryRepository->getActive(3);           
        $service = $this->serviceRepository->getById($itemId);       
	
        return view('front.service.itemIndex', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'services' => $this->services 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'serviceCategories' => $serviceCategories
                ,'service' => $service] );
    }
    
}
