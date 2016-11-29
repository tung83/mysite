@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('main')
    @include('front.about.partials.abouts', compact('currentAboutCategory','currentMenu', 'aboutCategories', 'abouts'))
@endsection
@push('scripts')
<script>    
    /*==================== PAGINATION =========================*/
    $(document).on('click','#about-category-content .pagination a', function(e){
        e.preventDefault();               
        var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
        var values = valuesPart[0].split('?page=');
        var id = values[0];
        var page = values[1];
         getAbouts(id, page);
    });

    function getAbouts(id, page){
        $.ajax({
            url: '{{ url('/ajax/abouts') }}' + '?pId=' + id + '&page=' + page,
            type: 'GET'
        }).done(function(data){
                $('#about-category-content').html(data);
        })
        .fail(function() {                            
        });
    }

    $(document).on('click','#about-category .list-inline a', function(e){
        e.preventDefault();                
        $('#about-category .list-inline a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0];  
        getAboutCategory(id);
    });

    function getAboutCategory(id){
        $.ajax({
            url: '{{ url('/ajax/abouts') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#about-category-content').html(data);
        })
        .fail(function() {                            
        });
    }
    
    $(function() {
        //About Page scroll fixed head top menu
        if($('.about-us-page').length)
        {
            $(window).bind('scroll', function() {

            var navHeight = 248;

            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.about-us-page #header-bottom').addClass('fixed');
                        $('.about-us-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.about-us-page #logo').css({
                            'bottom'  : '0px',
                            'left' : '30px'

                        });
                }
                else {
                        $('.about-us-page #header-bottom').removeClass('fixed');
                        $('.about-us-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.about-us-page #logo').css({
                            'bottom'  : '-25px', 
                            'left' : '5px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 248 && !$('.about-us-page #header-bottom').is(":hover"))
                            $('.about-us-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.about-us-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.about-us-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.about-us-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 248){
                                    $('.about-us-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush
