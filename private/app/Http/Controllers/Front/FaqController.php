<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontControllerBase;
use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\FaqCategoryRepository;
use App\Repositories\FaqRepository;
use App\Repositories\QtextRepository;
use App\Repositories\BasicConfigRepository;

class FaqController extends FrontControllerBase
{    
    protected $faqCategoryRepository;
    protected $faqRepository;
    
    public function __construct(MenuRepository $menuRepository
            , ServiceCategoryRepository $serviceCategoryRepository
            , FaqCategoryRepository $faqCategoryRepository
            , FaqRepository $faqRepository
            , QtextRepository $qtextRepository
            , BasicConfigRepository $basicConfigRepository)
    {
        parent::__construct("faqs", $menuRepository, $serviceCategoryRepository, $qtextRepository,$basicConfigRepository);        
        $this->faqCategoryRepository = $faqCategoryRepository;
        $this->faqRepository = $faqRepository;
    }
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        parent::GetPageData();      
        return $this->showIndex();
    }
    
    public function getCategory(Request $request, $faqItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-p(?P<digit>\d+)$/', $faqItem, $matches);
        $categoryId = $matches['digit'];           
        $currentFaqCategory = $this->faqCategoryRepository->getById($categoryId);       
        return $this->showIndex($currentFaqCategory);
    }
    
    private function showIndex($currentFaqCategory = null){
        $faqCategories = $this->faqCategoryRepository->getActive(3); 
        if(!$currentFaqCategory){
            $currentFaqCategory = $faqCategories[0];
        }
        $faqs = getPaginateByPidData($this->currentMenu,$currentFaqCategory, $this->faqRepository, 6);             
        return view('front.faq.index', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'faqCategories' => $faqCategories
                ,'faqs' => $faqs,
                'currentFaqCategory' => $currentFaqCategory]);
    }
    
    public function getItem(Request $request, $faqItem)
    {        
        parent::GetPageData();  
        preg_match('/(.*)-i(?P<digit>\d+)$/', $faqItem, $matches);
        $itemId = $matches['digit'];    
        $faqCategories = $this->faqCategoryRepository->getActive(3);           
        $faq = $this->faqRepository->getById($itemId);       
	
        return view('front.faq.itemIndex', ['currentMenu' => $this->currentMenu, 'serviceMenu' =>$this->serviceMenu
                ,'menus' => $this->menus
                ,'serviceCategories' => $this->serviceCategories 
                ,'qtextRecruit' => $this->qtextRecruit
                ,'qtextFooterContact' => $this->qtextFooterContact
                ,'qtextIntroduction' => $this->qtextIntroduction
                ,'basicConfigs' => $this->basicConfigs
                ,'faqCategories' => $faqCategories
                ,'faq' => $faq] );
    }
    
    
}
