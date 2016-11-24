 <div class="row">
    <div class="col-md-4"> 
        <a href="{{ url(getCategorySlugLink($currentMenu, $currentNewsCategory)) }}">                   
            <figure>
                <figcaption class="text-center sum">
                    <p>
                        {{languageTransform($currentNewsCategory, 'sum')}}  
                    </p>
                </figcaption>
                {{ HTML::image('img/dyn-contens/'. $currentNewsCategory->img, languageTransform($currentNewsCategory, 'title'), array('class' => 'img-responsive center-block')) }}

            </figure>
        </a>
    </div>
    <div class="col-md-8">
        @include('front.news.partials.news-items-horizontal',compact('currentMenu','newsList')) 
    </div>            
</div>
<div class="row">
    <div class="col-md-9">
        @include('front.news.partials.news-items-vertical',compact('currentMenu','newsList')) 
    </div>
    <div class="col-md-3">
        @include('front.news.partials.news-items-most-saw',compact('currentMenu', 'most_saw_newsList'))                     
    </div>
</div>
