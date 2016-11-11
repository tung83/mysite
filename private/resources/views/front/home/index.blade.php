@extends('front.frontTemplate', compact('serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('head')
    {!! HTML::style('css/slick.css') !!}
@endsection

@section('main')
    @include('front.home.partials.services', compact('serviceMenu', 'services'))
    @include('front.home.partials.projects', compact('projectMenu', 'projectCategories', 'projects'))
    @include('front.home.partials.news', compact('newsMenu', 'newsCategories', 'news'))
    @include('front.home.partials.faqs', compact('faqMenu', 'faqs'))
    @include('front.home.partials.careers', compact('careerMenu', 'careers', 'qtextRecruit'))
    @include('front.home.partials.customers', compact('customers'))
@endsection
@push('scripts')
{!! HTML::script('js/slick.js') !!}

<script>    
    /*==================== PAGINATION =========================*/
    $(document).on('click','#project-category-content .pagination a', function(e){
        e.preventDefault();               
        var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
        var values = valuesPart[0].split('?page=');
        var id = values[0];
        var page = values[1];
         getProjects(id, page);
    });

    function getProjects(id, page){
        $.ajax({
            url: '{{ url('/ajax/projects') }}' + '?pId=' + id + '&page=' + page,
            type: 'GET'
        }).done(function(data){
                $('#project-category-content').html(data);
        })
        .fail(function() {                            
        });
    }

    $(document).on('click','#project-category .list-inline a', function(e){
        e.preventDefault();                
        $('#project-category .list-inline a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0];  
        getProjectCategory(id);
    });

    function getProjectCategory(id){
        $.ajax({
            url: '{{ url('/ajax/projects') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#project-category-content').html(data);
        })
        .fail(function() {                            
        });
    }
    
    $(function() {
        // slick
        $('.slick').slick({
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
        });
        var divh=$('.service-sum').height();
          $('.service-sum p').each( function( index, element ){
              while ($(this).outerHeight()>divh) {
                  $(this).text(function (index, text) {
                  return text.replace(/\W*\s(\S)*$/, '...');
              });
          }
          });
          $( ".slick-slide" ).hover(
              function() {
                $( this ).find( "h5, p" ).css( "color", "#ffca9d" );
              },function() {
                $( this ).find( "h5, p" ).css( "color", "" );
              }
          );
  /*==================== PAGINATION =========================*/
        $(document).on('click','#project-rightside .pagination a', function(e){
                e.preventDefault();               
                var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
                var values = valuesPart[0].split('?page=');
                var id = values[0];
                var page = values[1];
                 getProjects(id, page);
        });

        function getProjects(id, page){
                $.ajax({
                    url: '{{ url('/ajax/homeProject') }}' + '?pId=' + id + '&page=' + page,
                    type: 'GET'
                }).done(function(data){
                        $('#project-rightside').html(data);
                })
                .fail(function() {                            
                });
        }
        
        $(document).on('click','#project-category .list-inline a', function(e){
                e.preventDefault();                
                $('#project-category .list-inline a').removeClass('active');
                $(this).addClass('active');
                var id = $(this).attr('href').match(/([0-9]+)$/g)[0];  
                getProjectCategory(id);
        });

        function getProjectCategory(id){
                $.ajax({
                    url: '{{ url('/ajax/homeProject') }}' + '?pId=' + id,
                    type: 'GET'
                }).done(function(data){
                        $('#project-category-content').html(data);
                })
                .fail(function() {                            
                });
        }
        
        
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
                    url: '{{ url('/ajax/homeNews') }}' + '?pId=' + id + '&page=' + page,
                    type: 'GET'
                }).done(function(data){
                        $('#news-rightside').html(data);
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
                    url: '{{ url('/ajax/homeNews') }}' + '?pId=' + id,
                    type: 'GET'
                }).done(function(data){
                        $('#news-category-content').html(data);
                })
                .fail(function() {                            
                });
        }
          
        //Home Page scroll fixed head top menu
        if($('.home-page').length)    
        {
            $(window).bind('scroll', function() {
            var navHeight = 725;
            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.home-page #header-bottom').addClass('fixed');
                        $('.home-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.home-page #logo').css({
                            'bottom'  : '-87px',                    
                            'right'  : '163px'
                        });
                }
                else {
                        $('.home-page #header-bottom').removeClass('fixed');
                        $('.home-page #logo a').css({
                            'background-size'  : '180px 180px'
                        });
                        $('.home-page #logo').css({
                            'bottom'  : '0',                    
                            'right'  : '232px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 725 && !$('.home-page #header-bottom').is(":hover"))
                            $('.home-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.home-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.home-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.home-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 725){
                                    $('.home-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush
