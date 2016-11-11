@extends('front.frontTemplate', compact('currentMenu', 'serviceMenu', 'menus', 'services','qtextFooterContact','qtextIntroduction','basicConfigs'))
@section('main')
    @include('front.project.partials.projects', compact('currentMenu', 'projectCategories', 'projects'))
@endsection
@push('scripts')
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
        //Project Page scroll fixed head top menu
        if($('.projects-page').length)
        {
            $(window).bind('scroll', function() {

            var navHeight = 248;

            if($(window).width() >= 992)
            {
                if ( $(window).scrollTop() > navHeight) {
                        $('.projects-page #header-bottom').addClass('fixed');
                        $('.projects-page #logo a').css({
                            'background-size'  : '80px 80px'
                        });
                        $('.projects-page #logo').css({
                            'bottom'  : '0px',
                            'left' : '30px'

                        });
                }
                else {
                        $('.projects-page #header-bottom').removeClass('fixed');
                        $('.projects-page #logo a').css({
                            'background-size'  : '149px 149px'
                        });
                        $('.projects-page #logo').css({
                            'bottom'  : '-25px', 
                            'left' : '5px'
                        });
                }
            }
            });

            $(window).scroll(function(){
                    var scrollTop = $(window).scrollTop();
                    if(scrollTop > 248 && !$('.projects-page #header-bottom').is(":hover"))
                            $('.projects-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                    else	
                            $('.projects-page #header-bottom').stop().animate({'opacity':'1'},725);
            });

            $('.projects-page #header-bottom').hover(
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            $('.projects-page #header-bottom').stop().animate({'opacity':'1'},725);
                    },
                    function (e) {
                            var scrollTop = $(window).scrollTop();
                            if(scrollTop > 248){
                                    $('.projects-page #header-bottom').stop().animate({'opacity':'0.9'},725);
                            }
                    }
            );
        };
    });
</script>
@endpush
