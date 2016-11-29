<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\NewsCategoryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class NewsController extends FrontControllerBase
{    
    protected $newsCategoryRepository;
    protected $newsRepository;
    
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , NewsCategoryRepository $newsCategoryRepository
            , NewsRepository $newsRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {        
        parent::__construct("news", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);
        $this->newsCategoryRepository = $newsCategoryRepository;
        $this->newsRepository = $newsRepository;
    }
    public function index()
    {
        parent::GetPageData();      
        return $this->showIndex();
    }
    
    public function getCategory(Request $request, $newsItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-p(?P<digit>\d+)$/', $newsItem, $matches);
        $categoryId = $matches['digit'];           
        $currentNewsCategory = $this->newsCategoryRepository->getById($categoryId);       
        return $this->showIndex($currentNewsCategory);
    }
    
    private function showIndex($currentNewsCategory = null){
        $newsCategories = $this->newsCategoryRepository->getActive(); 
        if(!$currentNewsCategory){
            $currentNewsCategory = $newsCategories[0];
        }
        $newsList = getPaginateByPidData($this->currentMenu,$currentNewsCategory, $this->newsRepository, 6);          
        $most_saw_newsList = $this->newsCategoryRepository->getActive();

        return view('front.news.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'newsCategories' => $newsCategories
                ,'newsList' => $newsList,
                'currentNewsCategory' => $currentNewsCategory,
                'most_saw_newsList'=>$most_saw_newsList]);
    }
    
    public function getItem(Request $request, $newsItem)
    {       
        parent::GetPageData();  
        preg_match('/(.*)-i(?P<digit>\d+)$/', $newsItem, $matches);
        $itemId = $matches['digit'];   
        $newsCategories = $this->newsCategoryRepository->getActive(3);           
        $news = $this->newsRepository->getById($itemId);
        return view('front.news.itemIndex',  ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'newsCategories' => $newsCategories
                ,'news' => $news
                ,'title'=>languageTransform($news, 'title')] );
    }
    
}
