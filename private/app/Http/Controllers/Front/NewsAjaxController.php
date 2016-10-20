<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;

class NewsAjaxController extends Controller
{
    /**
     * The NewsRepository instance.
     *
     * @var \App\Repositories\NewsRepository
     */
    protected $newsRepository;

    /**
     * Create a new NewsAjaxController instance.
     *
     * @param  \App\Repositories\NewsRepository $newsCategoryRepository
     * @return void
     */
    public function __construct(NewsRepository $newsRepository
            , NewsCategoryRepository $newsCategoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->newsCategoryRepository = $newsCategoryRepository;
        $this->middleware('ajax');
    } 
    
    public function partialHomeData(Request $request)
    {       
        $pid = $request->input('pId');
        $newsCategory = $this->newsCategoryRepository->getById($pid);
        $newss = getPaginateByPidData('news',$newsCategory, $this->newsRepository, 6);
        if(!$request->input('page'))
        {
            return view('front.home.partials.news-category', ['newss' => $newss, 'newsCategory' => $newsCategory])->render();        
        }
        else {     
               return view('front.home.partials.news-items',['newss' => $newss])->render();
        }
    }
    
    public function partialProjectData(Request $request)
    {       
        $pid = $request->input('pId');
        $newsCategory = $this->newsCategoryRepository->getById($pid);
        $newsList = getPaginateByPidData('news',$newsCategory, $this->newsRepository, 6);
        return view('front.news.partials.news-category', ['newsList' => $newsList])->render();  
    }
}
