<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class ServiceAjaxController extends Controller
{
    /**
     * The ServiceRepository instance.
     *
     * @var \App\Repositories\ServiceRepository
     */
    private $menuEView;
    protected $menuRepository;
    protected $serviceRepository;
    protected $serviceCategoryRepository;

    /**
     * Create a new ServiceAjaxController instance.
     *
     * @param  \App\Repositories\ServiceRepository $serviceCategoryRepository
     * @return void
     */
    public function __construct(MenuRepository $menuRepository
            ,ServiceRepository $serviceRepository
            , ServiceCategoryRepository $serviceCategoryRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->serviceRepository = $serviceRepository;
        $this->serviceCategoryRepository = $serviceCategoryRepository;
        $this->middleware('ajax');
        $this->menuEView = 'services';
    }
    
    public function partialHomeData(Request $request)
    {     
        $serviceMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $serviceCategory = $this->serviceCategoryRepository->getById($pid);
        $services = getPaginateHomeByPidData($serviceMenu,$serviceCategory, $this->serviceRepository, 6);
        if(!$request->input('page'))
        {
            return view('front.home.partials.service-category', ['serviceMenu' => $serviceMenu, 'services' => $services, 'serviceCategory' => $serviceCategory])->render();        
        }
        else {     
               return view('front.home.partials.service-items', compact('serviceMenu','services'))->render();
        }
    }
    
    public function partialServiceData(Request $request)
    {       
        $currentMenu = $this->menuRepository->getByEView($this->menuEView);
        $pid = $request->input('pId');
        $serviceCategory = $this->serviceCategoryRepository->getById($pid);
        $services = getPaginateByPidData($currentMenu,$serviceCategory, $this->serviceRepository, 6);
        return view('front.service.partials.service-items', compact('currentMenu','services'))->render();  
    }
}
