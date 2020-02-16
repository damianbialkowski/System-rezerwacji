var nav = $('.navbar');
var offsetY = nav.offset().top;

$(document).ready(function() {

    scroll();

    $('.navbar-toggler').on('click', function(){
        $('.navbar-toggler span:nth-child(1)').addClass('top-bar');
        $('.navbar-toggler span:nth-child(2)').addClass('middle-bar');
        $('.navbar-toggler span:nth-child(3)').addClass('bottom-bar');
    });

    $('.nav-item .dropdown').on('click',function(){
        if($(this).hasClass('show')){
            $(this).find('.dropdown-menu.show').fadeIn(1000);
        }else {
            $(this).find('.dropdown-menu.show').fadeIn(1000);
        }
    });

    $('#searchInput').on('click',function(){
        if($('.searchArea').css('display') == 'none'){
            $('.searchArea').toggle(300);
            $('.searchArea input[type=search]').focus();
        }
    });
    $('.close-nav').on('click',function(){
        $('.searchArea').toggle(300);
        $('.socialLinks').css('opacity',1); 
    });

    $('.alert').on('click',function(){
        $(this).hide();
    });

    // $('.smooth-scroll').on('click',function(){
    //     $('body,html').animate({
    //         scrollTop: $("")
    //     })
    // });

});

$(window).scroll(function(){
    scroll();

});

function scroll(){
    var scrollTop = $(window).scrollTop();
    if(scrollTop > offsetY){
        $(nav).addClass('sticky affix');
        $(nav).css('box-shadow','2px 2px 9px 4px rgba(0,0,0,.3)');
        $(nav).find('.navbar-logo').css({
            'width': '60px',
            'height': '60px'
        });
        $('.content').addClass('space-top');
    }else {
        $(nav).removeClass('sticky affix');
        $(nav).css('box-shadow','none');
        $(nav).find('.navbar-logo').css({
            'width': '70px',
            'height': '70px'
        });
        $('.content').removeClass('space-top');
    }

    if($(window).width() > 700){
        if(scrollTop > 300){
            $('.back_top').addClass('on');
        }else {
            $('.back_top').removeClass('on');
        }
    }
}