 <div id="news-items-most-saw" class="clearfix right-side-gray" >     
     <div class="col-md-12">
        <h3 class="title title-sub">{{trans('front/site.news-mostsaw')}}</h3>
     </div>
     <div class="col-md-12">
        @foreach($most_saw_newsList as $news) 
        <div class='row'>
            <a href="{{ url(getItemSlugLink($currentMenu, $news)) }}">                   
                 <div class='col-md-4'>
                  <div class="image-container">
                   {{ HTML::image('file/upload/'.$news->img, languageTransform($news, 'title'), array('class' => 'img-responsive center-block')) }}                   
                  </div>
                 </div>                   
                 <div class='col-md-6'>
                      <p>
                          {{languageTransform($news, 'title')}}  
                      </p>
                 </div>
            </a>
        </div>
        @endforeach  
    </div> 
 </div>                                                                                                                                                                                                                                                                                                                                                                                                                                           