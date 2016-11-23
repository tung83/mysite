@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('head')
    {!! HTML::style('css/slick.css') !!}
@stop
@section('main')
    <div class="about row">
    <div id="about-header" class="row text-center">
        <h2 class="title">{{trans('front/about.title')}}</h2>
    </div>
    <div class="row data-long-content">
        {!!languageTransform($about, 'content')!!}  
    </div>
    </div>
@endsection
@push('scripts')
<script>
// scrolling top head menu
    $(function() {
        if($('.about-page').length)
        {
            $(window).bind('scroll', function() {

            var navHeight = 241;
            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.about-page #header-bottom').addClass('fixed');
                        $('.about-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.about-page #logo').css({
                            'bottom'  : '-5px',
                            'left' : '30px'

                        });
                }
                else {
                        $('.about-page #header-bottom').removeClass('fixed');
                        $('.about-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.about-page #logo').css({
                            'bottom'  : '-25px', 
                            'left' : '5px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 241 && !$('.about-page #header-bottom').is(":hover"))
                            $('.about-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.about-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.about-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.about-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 241){
                                    $('.about-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush