<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class NewsAjaxController extends Controller
{
    /**
     * The NewsRepository instance.
     *
     * @var \App\Repositories\NewsRepository
     */
    private $menuEView;
    protected $menuRepository;
    protected $newsCategoryRepository;
    protected $newsRepository;

    /**
     * Create a new NewsAjaxController instance.
     *
     * @param  \App\Repositories\NewsRepository $newsCategoryRepository
     * @return void
     */
    public function __construct(MenuRepository $menuRepository
            ,NewsRepository $newsRepository
            , NewsCategoryRepository $newsCategoryRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->newsRepository = $newsRepository;
        $this->newsCategoryRepository = $newsCategoryRepository;
        $this->middleware('ajax');
        $this->menuEView = 'news';
    }
    
    public function partialHomeData(Request $request)
    {     
        $newsMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $newsCategory = $this->newsCategoryRepository->getById($pid);
        $news = getPaginateByPidData($newsMenu,$newsCategory, $this->newsRepository, 6);
        if(!$request->input('page'))
        {
            return view('front.home.partials.news-category', ['newsMenu' => $newsMenu, 'news' => $news, 'newsCategory' => $newsCategory])->render();        
        }
        else {     
               return view('front.home.partials.news-items', compact('newsMenu','newsList'))->render();
        }
    }
    
    public function partialNewsData(Request $request)
    {       
        $currentMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $newsCategory = $this->newsCategoryRepository->getById($pid);
        $newsList = getPaginateByPidData($currentMenu,$newsCategory, $this->newsRepository, 6);
        return view('front.news.partials.news-category', compact('currentMenu','newsList'))->render();  
    }
}
