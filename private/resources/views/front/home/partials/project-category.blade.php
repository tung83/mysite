 <div class="row">
    <div id='project-leftside'class="col-md-5">
        <a href="{{ url(getCategorySlugLink($projectMenu, $projectCategory)) }}">                   
        <figure>
            <figcaption class="text-center">
                <p>
                    {{languageTransform($projectCategory, 'sum')}}  
                </p>
            </figcaption>
            {{ HTML::image('file/upload/'. $projectCategory->img, languageTransform($projectCategory, 'title'), array('class' => 'img-responsive center-block')) }}
            
        </figure>
        </a>
    </div>
    <div id='project-rightside' class="col-md-7">
        @include('front.home.partials.project-items',['projects' => $projects])
    </div>
</div>