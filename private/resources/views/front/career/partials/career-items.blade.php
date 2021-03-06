 <div id="career-items-rightside" > 
    @foreach($careers as $career) 
        <div class="col-md-12">
               <figure>
                   <div class='col-md-3'>
                        <a href="{{ url(getItemSlugLink($currentMenu, $career)) }}">
                                <div class="image-container">
                                 {{ HTML::image('file/upload/'. $career->img, languageTransform($career, 'title'), array('class' => 'img-responsive center-block')) }}                   
                                </div>
                        </a>               
                   </div>
                   <div class='col-md-9'>
                        <figcaption>
                            <a href="{{ url(getItemSlugLink($currentMenu, $career)) }}">                          
                               <h4>
                                {!! languageTransform($career, 'title') !!}
                               </h4>
                            </a>
                            <p>
                                {!! languageTransform($career, 'sum') !!}
                            </p>
                        </figcaption>
                   </div>
               </figure>
        </div>
    @endforeach   
 </div>                                                                                                                                                                                                                                                                                                                                                                                                               