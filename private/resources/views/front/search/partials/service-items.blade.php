 <div id="service-items-rightside clearfix" > 
    <div class="text-center">        
        <h2 class="title title-main">{{languageTransform($serviceMenu, 'title')}}</h2>
    </div>
    @foreach($services as $service) 
        <div class="col-md-12">
            <a href="{{ url(getItemSlugLink($serviceMenu, $service)) }}">
                <h4>
                    {{languageTransform($service, 'title')}}  
                </h4>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url(getItemSlugLink($currentMenu, $service)) }}">
                <div class="image-container">
                 {{ HTML::image('file/upload/'. $service->img, languageTransform($service, 'title'), array('class' => 'img-responsive center-block')) }}                   
                </div>

            </a>
        </div>         
        <div class="col-md-8"> 
            <p>
                {{languageTransform($service, 'sum')}}  
            </p>
        </div>
    @endforeach   
    
 </div>
<div class="clearfix"></div>
<div class="row text-center">
    {{$services->links()}}
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                             