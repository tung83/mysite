<div class="career-home row">
    
    <div id="career-sum" class="col-md-6">
        <div class="left"> </div>
        <div class="right"> </div>
        <p> {{languageTransform($qtextRecruit, 'content')}} </p>
          
    </div>
    <ol>
        @foreach($careers as $index => $career) 
            <li class="career-item item{{$index+1}}">
                <a href="{{ url(getItemSlugLink($careerMenu, $career)) }}">
                   {{languageTransform($career, 'title')}}  
                </a>
            </li>
        @endforeach        
    </ol>
</div>