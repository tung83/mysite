 <div id="career-items-rightside" > 
    @foreach($careers as $career) 
        <div class="col-md-2 md-5th">
           <a href="{{ url(getItemSlugLink($currentMenu, $career)) }}">
               <figure>
                   <div class="image-container">
                    {{ HTML::image('img/dyn-contens/'. $career->img, languageTransform($career, 'title'), array('class' => 'img-responsive center-block')) }}                   
                   </div>
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($career, 'title')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$careers->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             