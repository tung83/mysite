<div class="project row">
    <div class="container">
        <div id="project-list" class="row text-center">        
            <h2 class="title">{{trans('front/site.projects')}}</h2>
        </div>
        <div id="project-category" class="row text-center ">
            <ul class="list-inline list-inline-sm">
                @foreach($projectCategories as $index => $projectCategory) 
                <li>
                    <a href="{{ url(getCategorySlugLink($currentMenu, $projectCategory)) }}"
                       class="{{ $projectCategory->id ==  $currentProjectCategory->id ? 'active' : ''  }}">
                       {{languageTransform($projectCategory, 'title')}}  
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>
        <div id="project-category-content">
            <div class="row"> 
                @include('front.project.partials.project-items',compact('currentMenu','projects'))   
            </div>
        </div>
    </div>
</div>