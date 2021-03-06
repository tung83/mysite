 <div id="news-items-rightside" > 
    @foreach($newsList as $news) 
        <div class="col-md-4">
           <a href="{{ url(getItemSlugLink($currentMenu, $news)) }}">
               <figure>
                   <div class="image-container">
                    {{ HTML::image('file/upload/'. $news->img, languageTransform($news, 'title'), array('class' => 'img-responsive center-block')) }}                   
                   </div>
                   <figcaption >
                       <h4>
                           {{languageTransform($news, 'title')}}  
                       </h4>
                        <p>
                            {{$news->getPostedDate()->format('d/m/Y')}}
                        </p>
                        <p>                                              
                            {!!languageTransform($news, 'sum')!!} 
                        </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>                                                                                                                                                                                                                                                                                                                                                                                                                          