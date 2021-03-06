 <div class="row">
    <div id='news-leftside'class="col-md-4">
        <a href="{{ url(getCategorySlugLink($newsMenu, $newsCategory)) }}">                   
            <figure>
                <figcaption class="text-center sum">
                    <p>
                        {{languageTransform($newsCategory, 'sum')}}  
                    </p>
                </figcaption>
                {{ HTML::image('file/upload/'. $newsCategory->img, languageTransform($newsCategory, 'title'), array('class' => 'img-responsive center-block')) }}

            </figure>
        </a>
    </div>
    <div id='news-rightside' class="col-md-8">
        @include('front.home.partials.news-items',['news' => $news])
    </div>
</div>