 <div id="project-items-rightside" > 
    @foreach($projects as $project) 
        <div class="col-md-4 wow bounceIn" data-wow-duration="4s">
           <a href="{{ url(getItemSlugLink($projectMenu, $project)) }}">
               <figure>
                   {{ HTML::image('file/upload'. $project->img, languageTransform($project, 'title'), array('class' => 'img-responsive center-block')) }}
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($project, 'title')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$projects->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             