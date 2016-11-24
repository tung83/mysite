 <div id="service-items-rightside" > 
    @foreach($services as $service) 
        <div class="col-md-2 md-5th">
           <a href="{{ url(getItemSlugLink($currentMenu, $service)) }}">
               <figure>
                   <div class="image-container">
                    {{ HTML::image('img/dyn-contens/'. $service->img, languageTransform($service, 'title'), array('class' => 'img-responsive center-block')) }}                   
                   </div>
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($service, 'title')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$services->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             