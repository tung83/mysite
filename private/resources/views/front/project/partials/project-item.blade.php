 <div class="project row">  
    <div class="col-md-8">
           <figure>
               <div class="image-container">
                {{ HTML::image('img/dyn-contens/'. $project->img, languageTransform($project, 'title'), array('class' => 'img-responsive center-block')) }}                   
               </div>
               <figcaption class="text-center">
                   <h4>
                       {{languageTransform($project, 'title')}}  
                   </h4>
                   <p>
                       {!!languageTransform($project, 'content')!!}  
                   </p>
               </figcaption>
           </figure>
    </div>
 </div>                                                                                                                                                                                                                                                                                                                                                                                                                                       