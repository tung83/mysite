 <div id="project-items-rightside" > 
    @foreach($projects as $project) 
        <div class="col-md-2 md-5th">
           <a href="{{ url(getItemSlugLink($currentMenu, $project)) }}">
               <figure>
                   <div class="image-container">
                    {{ HTML::image('file/upload/'. $project->img, languageTransform($project, 'title'), array('class' => 'img-responsive center-block')) }}                   
                   </div>
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