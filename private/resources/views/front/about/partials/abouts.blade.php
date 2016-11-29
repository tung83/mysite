<div class="about row">
    <div class="container">
        <div id="about-category" class="row text-center ">
            <ul class="list-inline list-inline-sm">
                @foreach($aboutCategories as $index => $aboutCategory) 
                <li>
                    <a href="{{ url(getCategorySlugLink($currentMenu, $aboutCategory)) }}"
                       class="{{ $aboutCategory->id ==  $currentAboutCategory->id ? 'active' : ''  }}">
                       {{languageTransform($aboutCategory, 'title')}}  
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>
        <div id="about-category-content">
            <div class="row"> 
                @include('front.about.partials.about-items',compact('currentMenu','abouts'))   
            </div>
        </div>
    </div>
</div>