<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\CareerRepository;
use App\Repositories\CareerCategoryRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class CareerAjaxController extends Controller
{
    /**
     * The CareerRepository instance.
     *
     * @var \App\Repositories\CareerRepository
     */
    private $menuEView;
    protected $menuRepository;
    protected $careerCategoryRepository;
    protected $careerRepository;

    /**
     * Create a new CareerAjaxController instance.
     *
     * @param  \App\Repositories\CareerRepository $careerCategoryRepository
     * @return void
     */
    public function __construct(MenuRepository $menuRepository
            ,CareerRepository $careerRepository
            , CareerCategoryRepository $careerCategoryRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->careerRepository = $careerRepository;
        $this->careerCategoryRepository = $careerCategoryRepository;
        $this->middleware('ajax');
        $this->menuEView = 'careers';
    }
    
    public function partialHomeData(Request $request)
    {     
        $careerMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $careerCategory = $this->careerCategoryRepository->getById($pid);
        $careers = getPaginateHomeByPidData($careerMenu,$careerCategory, $this->careerRepository, 6);
        if(!$request->input('page'))
        {
            return view('front.home.partials.career-category', ['careerMenu' => $careerMenu, 'careers' => $careers, 'careerCategory' => $careerCategory])->render();        
        }
        else {     
               return view('front.home.partials.career-items', compact('careerMenu','careers'))->render();
        }
    }
    
    public function partialCareerData(Request $request)
    {       
        $currentMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $careerCategory = $this->careerCategoryRepository->getById($pid);
        $careers = getPaginateByPidData($currentMenu,$careerCategory, $this->careerRepository, 6);
        return view('front.career.partials.career-items', compact('currentMenu','careers'))->render();  
    }
}
