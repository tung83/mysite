<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\FaqRepository;
use App\Repositories\CareerRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\NewsCategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class HomeController extends FrontControllerBase
{ 
    protected $customerRepository;
    protected $faqRepository;
    protected $careerRepository;
    protected $projectCategoryRepository;
    protected $projectRepository;
    protected $newsCategoryRepository;
    protected $newsRepository;
    
    public function __construct(MenuRepository $menuRepository
            ,CustomerRepository $customerRepository
            ,FaqRepository $faqRepository
            ,CareerRepository $careerRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , ProjectCategoryRepository $projectCategoryRepository
            , ProjectRepository $projectRepository
            , NewsCategoryRepository $newsCategoryRepository
            , NewsRepository $newsRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {        
        parent::__construct("home", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);
        $this->customerRepository = $customerRepository;
        $this->faqRepository = $faqRepository;
        $this->careerRepository = $careerRepository;
        $this->projectCategoryRepository = $projectCategoryRepository;
        $this->projectRepository = $projectRepository;
        $this->newsCategoryRepository = $newsCategoryRepository;
        $this->newsRepository = $newsRepository;
    }
    
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        parent::GetPageData();
        $projectMenu = $this->menus->first(function ($value, $key) {
            return $value->e_view == 'projects';
        });  
        $newsMenu = $this->menus->first(function ($value, $key) {
            return $value->e_view == 'news';
        });  
        $faqMenu = $this->menus->first(function ($value, $key) {
            return $value->e_view == 'advisory';
        });  
        $careerMenu = $this->menus->first(function ($value, $key) {
            return $value->e_view == 'careers';
        }); 
        $projectCategories = $this->projectCategoryRepository->getActive(3);           
        $projects = getPaginateByPidData($projectMenu,$projectCategories[0], $this->projectRepository, 6);        
        $newsCategories = $this->newsCategoryRepository->getActive(3);           
        $news = getPaginateByPidData($newsMenu,$newsCategories[0], $this->newsRepository, 3);
        $customers = $this->customerRepository->getActive(20);
        $faqs = $this->faqRepository->getActive(6);
        $careers = $this->careerRepository->getActive(3);
      
	
        return view('front.home.index', ['projectMenu' =>$projectMenu
                ,'newsMenu' =>$newsMenu
                ,'faqMenu' =>$faqMenu
                ,'careerMenu' =>$careerMenu
                ,'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'services' => $this->services 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'projectCategories' => $projectCategories
                ,'projects' => $projects
                ,'newsCategories' => $newsCategories
                ,'news' => $news
                ,'customers' => $customers
                ,'faqs' => $faqs
                ,'careers' => $careers]);
    }
}
