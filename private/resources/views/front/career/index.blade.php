@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('main')
    @include('front.career.partials.careers', compact('currentMenu', 'careers'))
@endsection
@push('scripts')
<script>    
    /*==================== PAGINATION =========================*/
    $(document).on('click','#career-category-content .pagination a', function(e){
        e.preventDefault();               
        var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
        var values = valuesPart[0].split('?page=');
        var id = values[0];
        var page = values[1];
         getCareers(id, page);
    });

    function getCareers(id, page){
        $.ajax({
            url: '{{ url('/ajax/careers') }}' + '?pId=' + id + '&page=' + page,
            type: 'GET'
        }).done(function(data){
                $('#career-category-content').html(data);
        })
        .fail(function() {                            
        });
    }

    $(document).on('click','#career-category .list-inline a', function(e){
        e.preventDefault();                
        $('#career-category .list-inline a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0];  
        getCareerCategory(id);
    });

    function getCareerCategory(id){
        $.ajax({
            url: '{{ url('/ajax/careers') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#career-category-content').html(data);
        })
        .fail(function() {                            
        });
    }
    
    $(function() {
        //Career Page scroll fixed head top menu
        if($('.careers-page').length)
        {
            $(window).bind('scroll', function() {

            var navHeight = 248;

            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.careers-page #header-bottom').addClass('fixed');
                        $('.careers-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.careers-page #logo').css({
                            'bottom'  : '0px',
                            'left' : '30px'

                        });
                }
                else {
                        $('.careers-page #header-bottom').removeClass('fixed');
                        $('.careers-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.careers-page #logo').css({
                            'bottom'  : '-25px', 
                            'left' : '5px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 248 && !$('.careers-page #header-bottom').is(":hover"))
                            $('.careers-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.careers-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.careers-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.careers-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 248){
                                    $('.careers-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush
