<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class ProjectAjaxController extends Controller
{
    /**
     * The ProjectRepository instance.
     *
     * @var \App\Repositories\ProjectRepository
     */
    private $menuEView;
    protected $menuRepository;
    protected $projectCategoryRepository;
    protected $projectRepository;

    /**
     * Create a new ProjectAjaxController instance.
     *
     * @param  \App\Repositories\ProjectRepository $projectCategoryRepository
     * @return void
     */
    public function __construct(MenuRepository $menuRepository
            ,ProjectRepository $projectRepository
            , ProjectCategoryRepository $projectCategoryRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->projectRepository = $projectRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->middleware('ajax');
        $this->menuEView = 'projects';
    }
    
    public function partialHomeData(Request $request)
    {     
        $projectMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $projectCategory = $this->projectCategoryRepository->getById($pid);
        $projects = getPaginateByPidData($projectMenu,$projectCategory, $this->projectRepository, 6);
        if(!$request->input('page'))
        {
            return view('front.home.partials.project-category', ['projectMenu' => $projectMenu, 'projects' => $projects, 'projectCategory' => $projectCategory])->render();        
        }
        else {     
               return view('front.home.partials.project-items', compact('projectMenu','projects'))->render();
        }
    }
    
    public function partialProjectData(Request $request)
    {       
        $currentMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $projectCategory = $this->projectCategoryRepository->getById($pid);
        $projects = getPaginateByPidData($currentMenu,$projectCategory, $this->projectRepository, 6);
        return view('front.project.partials.project-category', compact('currentMenu','projects'))->render();  
    }
}
