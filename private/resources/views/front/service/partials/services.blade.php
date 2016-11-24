<div class="service row">
    <div class="container">
        <div id="service-list" class="row text-center">        
            <h2 class="title">{{languageTransform($currentMenu, 'title')}}</h2>
        </div>
        <div id="service-category" class="row text-center ">
            <ul class="list-inline list-inline-sm">
                @foreach($serviceCategories as $index => $serviceCategory) 
                <li>
                    <a href="{{ url(getCategorySlugLink($currentMenu, $serviceCategory)) }}"
                       class="{{ $serviceCategory->id ==  $currentServiceCategory->id ? 'active' : ''  }}">
                       {{languageTransform($serviceCategory, 'title')}}  
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>
        <div id="service-category-content">
            <div class="row"> 
                @include('front.service.partials.service-items',compact('currentMenu','services'))   
            </div>
        </div>
    </div>
</div>