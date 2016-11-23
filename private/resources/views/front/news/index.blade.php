@extends('front.frontTemplate', compact('serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('main')
    @include('front.news.partials.news', compact('currentMenu', 'newsCategories', 'newsList'))
@endsection
@push('scripts')
<script>    
    /*==================== PAGINATION =========================*/
    $(document).on('click','#news-category-content .pagination a', function(e){
        e.preventDefault();               
        var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
        var values = valuesPart[0].split('?page=');
        var id = values[0];
        var page = values[1];
         getNews(id, page);
    });

    function getNews(id, page){
        $.ajax({
            url: '{{ url('/ajax/news') }}' + '?pId=' + id + '&page=' + page,
            type: 'GET'
        }).done(function(data){
                $('#news-category-content').html(data);
        })
        .fail(function() {                            
        });
    }

    $(document).on('click','#news-category .list-inline a', function(e){
        e.preventDefault();                
        $('#news-category .list-inline a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0];  
        getNewsCategory(id);
    });

    function getNewsCategory(id){
        $.ajax({
            url: '{{ url('/ajax/news') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#news-category-content').html(data);
        })
        .fail(function() {                            
        });
    }
    
    $(function() {
        //News Page scroll fixed head top menu
        if($('.news-page').length){
            $(window).bind('scroll', function() {
            var navHeight = 244;

            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.news-page #header-bottom').addClass('fixed');
                        $('.news-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.news-page #logo').css({
                            'bottom'  : '-5px'                            
                        });
                }
                else {
                        $('.news-page #header-bottom').removeClass('fixed');
                        $('.news-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.news-page #logo').css({
                            'bottom'  : '-25px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 244 && !$('.news-page #header-bottom').is(":hover"))
                            $('.news-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.news-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.news-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.news-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 244){
                                    $('.news-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush