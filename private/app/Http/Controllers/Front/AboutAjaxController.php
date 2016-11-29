<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\AboutRepository;
use App\Repositories\AboutCategoryRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AboutAjaxController extends Controller
{
    /**
     * The AboutRepository instance.
     *
     * @var \App\Repositories\AboutRepository
     */
    private $menuEView;
    protected $menuRepository;
    protected $aboutCategoryRepository;
    protected $aboutRepository;

    /**
     * Create a new AboutAjaxController instance.
     *
     * @param  \App\Repositories\AboutRepository $aboutCategoryRepository
     * @return void
     */
    public function __construct(MenuRepository $menuRepository
            ,AboutRepository $aboutRepository
            , AboutCategoryRepository $aboutCategoryRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->aboutRepository = $aboutRepository;
        $this->aboutCategoryRepository = $aboutCategoryRepository;
        $this->middleware('ajax');
        $this->menuEView = 'about-us';
    }
    
    public function partialHomeData(Request $request)
    {     
        $aboutMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $aboutCategory = $this->aboutCategoryRepository->getById($pid);
        $abouts = getPaginateHomeByPidData($aboutMenu,$aboutCategory, $this->aboutRepository, 6);
        if(!$request->input('page'))
        {
            return view('front.home.partials.about-category', ['aboutMenu' => $aboutMenu, 'abouts' => $abouts, 'aboutCategory' => $aboutCategory])->render();        
        }
        else {     
            return view('front.home.partials.about-items', compact('aboutMenu','abouts'))->render();
        }
    }
    
    public function partialAboutData(Request $request)
    {       
        $currentMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $aboutCategory = $this->aboutCategoryRepository->getById($pid);
        $abouts = getPaginateByPidData($currentMenu,$aboutCategory, $this->aboutRepository, 6);
        return view('front.about.partials.about-items', compact('currentMenu','abouts'))->render();  
    }
}
