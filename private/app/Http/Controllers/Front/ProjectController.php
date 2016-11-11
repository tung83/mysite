<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontControllerBase;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class ProjectController extends FrontControllerBase
{    
    protected $projectCategoryRepository;
    protected $projectRepository;
    
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , ProjectCategoryRepository $projectCategoryRepository
            , ProjectRepository $projectRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {
        parent::__construct("projects", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);        
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->projectRepository = $projectRepository;
    }
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        parent::GetPageData();    
        $projectCategories = $this->projectCategoryRepository->getActive(3); 
        $projects = getPaginateByPidData($this->currentMenu,$projectCategories[0], $this->projectRepository, 6);     
        return view('front.project.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'services' => $this->services 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'projectCategories' => $projectCategories
                ,'projects' => $projects] );
    }
    
    public function getItem(Request $request, $projectItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-i(?P<digit>\d+)$/', $projectItem, $matches);
        $itemId = $matches['digit'];    
        $projectCategories = $this->projectCategoryRepository->getActive(3);           
        $project = $this->projectRepository->getById($itemId);       
	
        return view('front.project.itemIndex', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'services' => $this->services 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'projectCategories' => $projectCategories
                ,'project' => $project] );
    }
    
}
