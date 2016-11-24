@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('main')
    @include('front.service.partials.services', compact('currentServiceCategory','currentMenu', 'serviceCategories', 'services'))
@endsection
@push('scripts')
<script>    
    /*==================== PAGINATION =========================*/
    $(document).on('click','#service-category-content .pagination a', function(e){
        e.preventDefault();               
        var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
        var values = valuesPart[0].split('?page=');
        var id = values[0];
        var page = values[1];
         getServices(id, page);
    });

    function getServices(id, page){
        $.ajax({
            url: '{{ url('/ajax/services') }}' + '?pId=' + id + '&page=' + page,
            type: 'GET'
        }).done(function(data){
                $('#service-category-content').html(data);
        })
        .fail(function() {                            
        });
    }

    $(document).on('click','#service-category .list-inline a', function(e){
        e.preventDefault();                
        $('#service-category .list-inline a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0];  
        getServiceCategory(id);
    });

    function getServiceCategory(id){
        $.ajax({
            url: '{{ url('/ajax/services') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#service-category-content').html(data);
        })
        .fail(function() {                            
        });
    }
    
    $(function() {
        //Service Page scroll fixed head top menu
        if($('.services-page').length)
        {
            $(window).bind('scroll', function() {

            var navHeight = 248;

            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.services-page #header-bottom').addClass('fixed');
                        $('.services-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.services-page #logo').css({
                            'bottom'  : '0px',
                            'left' : '30px'

                        });
                }
                else {
                        $('.services-page #header-bottom').removeClass('fixed');
                        $('.services-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.services-page #logo').css({
                            'bottom'  : '-25px', 
                            'left' : '5px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 248 && !$('.services-page #header-bottom').is(":hover"))
                            $('.services-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.services-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.services-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.services-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 248){
                                    $('.services-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush
