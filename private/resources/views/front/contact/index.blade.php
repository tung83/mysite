@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('head')
    {!! HTML::style('css/slick.css') !!}
@stop
@section('main')
    <div class="contact">
    <div id="contact-header" class="row text-center">
        <h2 class="title">{{trans('front/contact.title')}}</h2>
        <p>{{ trans('front/contact.text') }}</p>
    </div>
    <div class="row">
        <div id="contact-leftside" class="col-md-6">
            <div id="contact-info">
               {!! languageTransform($qtextContact, 'content')!!}
            </div>
            <img src="{{asset('img/contact-items.png')}}" class="img-responsive" alt="" title="">
        </div>
        <div id="contact-rightside" class="col-md-6">
            @include('front.contact.partials.form')
        </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div id="contact-image-bar" class="row">
       <img src="{{asset('img/contact-banner.png')}}" class="img-responsive" alt="" title="">
    </div>
    <div id="contact-google-map" class="row">
    </div>    
@endsection
@push('scripts')
<script>
// scrolling top head menu
    $(function() {
        if($('.contact-page').length)
        {
            $(window).bind('scroll', function() {

            var navHeight = 241;
            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.contact-page #header-bottom').addClass('fixed');
                        $('.contact-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.contact-page #logo').css({
                            'bottom'  : '-5px',
                            'left' : '30px'

                        });
                }
                else {
                        $('.contact-page #header-bottom').removeClass('fixed');
                        $('.contact-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.contact-page #logo').css({
                            'bottom'  : '-25px', 
                            'left' : '5px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 241 && !$('.contact-page #header-bottom').is(":hover"))
                            $('.contact-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.contact-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.contact-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.contact-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 241){
                                    $('.contact-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });  

    /*==================== google maps =========================*/
    function initMap() {
        createGoogleMap('contact-google-map');
        createGoogleMap('google-map');
    }    
</script>
@endpush