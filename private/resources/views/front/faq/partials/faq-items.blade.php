 <div id="faq-items-rightside" > 
    @foreach($faqs as $faq) 
        <div class="col-md-2 md-5th">
           <a href="{{ url(getItemSlugLink($currentMenu, $faq)) }}">
               <figure>
                   <div class="image-container">
                    {{ HTML::image('img/dyn-contens/'. $faq->img, languageTransform($faq, 'title'), array('class' => 'img-responsive center-block')) }}                   
                   </div>
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($faq, 'title')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$faqs->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             