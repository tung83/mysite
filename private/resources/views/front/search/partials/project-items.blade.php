 <div id="project-items-rightside clearfix" > 
    <div class="text-center">        
        <h2 class="title title-main">{{languageTransform($projectMenu, 'title')}}</h2>
    </div>
    @foreach($projects as $project) 
        <div class="col-md-12">
            <a href="{{ url(getItemSlugLink($projectMenu, $project)) }}">
                <h4>
                    {{languageTransform($project, 'title')}}  
                </h4>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url(getItemSlugLink($currentMenu, $project)) }}">
                <div class="image-container">
                 {{ HTML::image('file/upload/'. $project->img, languageTransform($project, 'title'), array('class' => 'img-responsive center-block')) }}                   
                </div>

            </a>
        </div>         
        <div class="col-md-8"> 
            <p>
                {{languageTransform($project, 'sum')}}  
            </p>
        </div>
    @endforeach   
    
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$projects->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             