/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Home page
$(document).ready(function(){
    //Home page
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
    }
 });
 
        
$(function() {
        
});

