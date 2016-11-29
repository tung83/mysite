<div class="news row">
     <div class="container">
        <div id="news-list" class="row text-center">  
            <h2 class="title">{{languageTransform($newsMenu, 'title')}}</h2>
        </div>
        <div id="news-category" class="row text-center ">
            <ul class="list-inline list-inline-sm">
                @foreach($newsCategories as $index => $newsCategory) 
                <li>
                    <a href="{{ url(getCategorySlugLink($newsMenu, $newsCategory)) }}"
                       class="{{ $index ==  0 ? 'active' : ''  }}">
                       {{languageTransform($newsCategory, 'title')}}  
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>
        <div id="news-category-content" class="container">
            @include('front.home.partials.news-category',['newsMenu' => $newsMenu, 'newsCategory' => $newsCategories[0],'news' => $news])   
        </div>
    </div>
</div>
@push('scripts')
<script>    
    /*==================== PAGINATION =========================*/   
    $(document).on('click','#news-category .list-inline a', function(e){
        e.preventDefault();                
        $('#news-category .list-inline a').removeClass('active');
        $(this).addClass('active'); 
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0]; 
        getNewsCategory(id);
    });

    function getNewsCategory(id){
        $.ajax({
            url: '{{ url('/ajax/homeNews') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#news-category-content').html(data);
        })
        .fail(function() {                            
        });
    };
</script>
@endpush