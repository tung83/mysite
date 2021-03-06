 <div id="news-items-rightside" > 
    @foreach($news as $newsItem) 
        <div class="col-md-4 wow bounceIn" data-wow-duration="4s">
           <a href="{{ url(getItemSlugLink($newsMenu, $newsItem)) }}">
               <figure>
                   {{ HTML::image('file/upload/'. $newsItem->img, languageTransform($newsItem, 'title'), array('class' => 'img-responsive center-block')) }}
                   <figcaption class="text-center">
                       <p>
                           {{languageTransform($newsItem, 'title')}}  
                       </p>
                       <p>
                           {{$newsItem->getPostedDate()->format('d/m/Y')}}
                       </p>
                       <p>
                           {{languageTransform($newsItem, 'sum')}}  
                       </p>
                   </figcaption>
               </figure>
           </a>
        </div>
    @endforeach   
 </div>