 <div class="news row">  
    <div class="col-md-8">
           <figure>
               <div class="image-container">
                {{ HTML::image('file/upload/'. $news->img, languageTransform($news, 'title'), array('class' => 'img-responsive center-block')) }}                   
               </div>
               <figcaption class="text-center">
                   <h4>
                       {{languageTransform($news, 'title')}}  
                   </h4>
                   <p>
                       {!!languageTransform($news, 'content')!!}  
                   </p>
               </figcaption>
           </figure>
    </div>
 </div>                                                                                                                                                                                                                                                                                                                                                                                                                                       