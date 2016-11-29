<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Front\FrontControllerBase;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class SearchController extends FrontControllerBase
{   
    protected $projectRepository;
    protected $serviceRepository;
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository
            , ServiceRepository $serviceRepository
            , ProjectRepository $projectRepository)
    {        
        parent::__construct("projects", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);
        $this->projectRepository = $projectRepository;
        $this->serviceRepository = $serviceRepository;        
    }
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        parent::GetPageData();
        $value = $request->input('search');
        $record_title = (session('locale') == 'en') ? 'e_title': 'title';
        
        $projectMenu = $this->menus->first(function ($value, $key) {
            return $value->e_view == 'projects';
        });  
        $projects = $this->projectRepository->search($value, $record_title);
        $services = $this->serviceRepository->search($value, $record_title);
        return view('front.search.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'projects' => $projects
                ,'services' => $services
                ,'projectMenu' => $projectMenu]);
    }    
}
