 <div id="news-items-most-saw" class="clearfix right-side-gray" >     
     <div class="col-md-12">
        <h3 class="title title-sub">{{trans('front/site.news-mostsaw')}}</h3>
     </div>
    @foreach($most_saw_newsList as $news) 
        <div class="col-md-12">
           <a href="{{ url(getItemSlugLink($currentMenu, $news)) }}">
               <figure>
                   <div class="image-container">
                    {{ HTML::image('img/dyn-contens/'. $news->img, languageTransform($news, 'title'), array('class' => 'img-responsive center-block')) }}                   
                   </div>
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($news, 'title')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>                                                                                                                                                                                                                                                                                                                                                                                                                                           