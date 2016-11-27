<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\FaqRepository;
use App\Repositories\FaqCategoryRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class FaqAjaxController extends Controller
{
    /**
     * The FaqRepository instance.
     *
     * @var \App\Repositories\FaqRepository
     */
    private $menuEView;
    protected $menuRepository;
    protected $faqCategoryRepository;
    protected $faqRepository;

    /**
     * Create a new FaqAjaxController instance.
     *
     * @param  \App\Repositories\FaqRepository $faqCategoryRepository
     * @return void
     */
    public function __construct(MenuRepository $menuRepository
            ,FaqRepository $faqRepository
            , FaqCategoryRepository $faqCategoryRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->faqRepository = $faqRepository;
        $this->faqCategoryRepository = $faqCategoryRepository;
        $this->middleware('ajax');
        $this->menuEView = 'faqs';
    }
    
    public function partialHomeData(Request $request)
    {     
        $faqMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $faqCategory = $this->faqCategoryRepository->getById($pid);
        $faqs = getPaginateByPidData($faqMenu,$faqCategory, $this->faqRepository, 6);
        if(!$request->input('page'))
        {
            return view('front.home.partials.faq-category', ['faqMenu' => $faqMenu, 'faqs' => $faqs, 'faqCategory' => $faqCategory])->render();        
        }
        else {     
               return view('front.home.partials.faq-items', compact('faqMenu','faqs'))->render();
        }
    }
    
    public function partialFaqData(Request $request)
    {       
        $currentMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $faqCategory = $this->faqCategoryRepository->getById($pid);
        $faqs = getPaginateByPidData($currentMenu,$faqCategory, $this->faqRepository, 6);
        return view('front.faq.partials.faq-items', compact('currentMenu','faqs'))->render();  
    }
}
