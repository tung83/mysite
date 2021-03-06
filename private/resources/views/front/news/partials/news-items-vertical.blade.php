 <div id="news-items-horizontal" > 
    @foreach($newsList as $news) 
    <div class='row'>
        <a href="{{ url(getItemSlugLink($currentMenu, $news)) }}">               
            <div class="col-md-3">
               <div class="image-container">
                {{ HTML::image('file/upload/'. $news->img, languageTransform($news, 'title'), array('class' => 'img-responsive center-block')) }}                   
               </div>
            </div>
            <div class="col-md-9">
                <h4>
                    {{languageTransform($news, 'title')}}  
                </h4>
                <p>
                    {{$news->getPostedDate()->format('d/m/Y')}}
                </p>
                <p>                    
                    {!!languageTransform($news, 'sum')!!} 
                </p>
            </div>
        </a>
    </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$newsList->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             