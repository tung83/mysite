 <div id="about-items-rightside" > 
    @foreach($abouts as $index=>$about) 
        @if ($index === 1)
            {{ HTML::image('img/about-bar.png', 'about-bar', array('class' => 'img-responsive center-block')) }}       
        @endif
        <div class="col-md-12">
            <a href="{{ url(getItemSlugLink($currentMenu, $about)) }}">
                <h4>
                    {{languageTransform($about, 'title')}}  
                </h4>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url(getItemSlugLink($currentMenu, $about)) }}">
                <div class="image-container">
                 {{ HTML::image('file/upload/'. $about->img, languageTransform($about, 'title'), array('class' => 'img-responsive center-block')) }}                   
                </div>
               
            </a>
        </div>         
        <div class="col-md-8"> 
            <p>
                {{languageTransform($about, 'sum')}}  
            </p>
        </div>
    @endforeach   
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$abouts->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             