<div class="news row">
    <div class="container">
         <div id="news-list" class="row text-center">        
            <h2 class="title title-main">{{languageTransform($currentMenu, 'title')}}</h2>
        </div>
        <div id="news-category" class="row text-center ">
            <ul class="list-inline list-inline-sm">
                @foreach($newsCategories as $index => $newsCategory) 
                <li>
                    <a href="{{ url(getCategorySlugLink($currentMenu, $newsCategory)) }}"
                       class="{{ $newsCategory->id ==  $currentNewsCategory->id ? 'active' : ''  }}">
                       {{languageTransform($newsCategory, 'title')}}  
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>
        <div id="news-category-content">
            @include('front.news.partials.news-category',compact('currentMenu','currentNewsCategory','newsList','most_saw_newsList'))                  
        </div>        
    </div>
</div>