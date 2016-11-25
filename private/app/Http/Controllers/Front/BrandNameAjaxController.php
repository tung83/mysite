<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class BrandNameAjaxController extends Controller
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
        $this->menuEView = 'brand-name';
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
