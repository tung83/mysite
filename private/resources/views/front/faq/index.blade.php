@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'serviceCategories','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('main')
    @include('front.faq.partials.faqs', compact('currentFaqCategory','currentMenu', 'faqCategories', 'faqs'))
@endsection
@push('scripts')
<script>    
    /*==================== PAGINATION =========================*/
    $(document).on('click','#faq-category-content .pagination a', function(e){
        e.preventDefault();               
        var valuesPart = $(this).attr('href').match(/([0-9]+)\?page=([0-9]+)$/g);  
        var values = valuesPart[0].split('?page=');
        var id = values[0];
        var page = values[1];
         getFaqs(id, page);
    });

    function getFaqs(id, page){
        $.ajax({
            url: '{{ url('/ajax/faqs') }}' + '?pId=' + id + '&page=' + page,
            type: 'GET'
        }).done(function(data){
                $('#faq-category-content').html(data);
        })
        .fail(function() {                            
        });
    }

    $(document).on('click','#faq-category .list-inline a', function(e){
        e.preventDefault();                
        $('#faq-category .list-inline a').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('href').match(/([0-9]+)$/g)[0];  
        getFaqCategory(id);
    });

    function getFaqCategory(id){
        $.ajax({
            url: '{{ url('/ajax/faqs') }}' + '?pId=' + id,
            type: 'GET'
        }).done(function(data){
                $('#faq-category-content').html(data);
        })
        .fail(function() {                            
        });
    }
    
    $(function() {
        //Faq Page scroll fixed head top menu
        if($('.faqs-page').length)
        {
            $(window).bind('scroll', function() {

            var navHeight = 248;

            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.faqs-page #header-bottom').addClass('fixed');
                        $('.faqs-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.faqs-page #logo').css({
                            'bottom'  : '0px',
                            'left' : '30px'

                        });
                }
                else {
                        $('.faqs-page #header-bottom').removeClass('fixed');
                        $('.faqs-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.faqs-page #logo').css({
                            'bottom'  : '-25px', 
                            'left' : '5px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 248 && !$('.faqs-page #header-bottom').is(":hover"))
                            $('.faqs-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.faqs-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.faqs-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.faqs-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 248){
                                    $('.faqs-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush
