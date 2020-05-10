const sideMenuElement = $('.sideMenuElements>li');
const sideMenuElements = $('.sideMenuElements>li');
const toggleSideMenu = $('.toggleSideMenu, .navigateSideMenu');
const sideMenu = $('.sideMenu'); 
const sideContent = $('.sideContent');
var menuExpanded = true;


toggleSideMenu.click(function(){
    changeToggleIcon($(this),menuExpanded);
    changeWidthMenu(menuExpanded);
    resetClickElement();
});

var changeToggleIcon = (element,expanded) => {
    if(expanded){
        menuExpanded = false;
        if(element.hasClass('toggleSideMenu')){
            element.removeClass('fa-toggle-on');
            element.addClass('fa-toggle-off');
        }else {
            $('.toggleSideMenu').removeClass('fa-toggle-on');
            $('.toggleSideMenu').addClass('fa-toggle-off');
        }
    }else {
        menuExpanded = true;
        if(element.hasClass('toggleSideMenu')){
            element.removeClass('fa-toggle-off');
            element.addClass('fa-toggle-on');
        }else {
            $('.toggleSideMenu').removeClass('fa-toggle-off');
            $('.toggleSideMenu').addClass('fa-toggle-on');
        }
    }
}

var changeWidthMenu = (expanded) => {
    resetClickElement();
    if(expanded){
        sideMenu.animate({'width': '250px',},300);
        sideContent.animate({'margin-left':'250px',},300);
        // $('.sideMenuHeader>a').html('<img src="../img/test.jpg" class="navbar-logo" alt="logo" style="width: 35px; height: 35px;">');
        $('.textElement').show();
        sideMenuElements.animate({'font-size':'16px'},300);
        $('.sideMenuElements>li>div>i:nth-child(1),.sideMenuElements>li>i').css({
            'width':'20px',
            'text-align':'center',
            'font-size': '16px',
            'margin':'15px 10px'
        });
    }else {
        if (window.matchMedia('(max-width: 575.98px)').matches) {
            sideMenu.animate({'width': '0px',},300);
            sideContent.animate({'margin-left':'0px'},300);
        }else {
            sideMenu.animate({'width': '100px',},300);
            sideContent.animate({'margin-left':'100px'},300);
        }
        // $('.sideMenuHeader>a').html('<img src="../img/test.jpg" class="navbar-logo" alt="logo" style="width: 30px; height: 30px;">');
        $('.textElement').hide();
        sideMenuElements.animate({'font-size':'0'});
        $('.sideMenuElements>li>div>i:nth-child(1),.sideMenuElements>li>i').css({
            'width':'100%',
            'text-align':'center',
            'font-size': '25px',
            'margin': '15px 0'
        });
    }
}

var resetClickElement = () => {
    $('.sideMenuElements>li>ul').slideUp();
    sideMenuElement.css({
        'background-color':'transparent',
        'box-shadow':'none'
    });
    sideMenuElement.find('.arrowRight').css({
        'transform': 'rotate(0)'
    });
}


sideMenuElement.click(function(){
    var info = $(this).children('ul').css('display');
    changeWidthMenu(true);
    changeToggleIcon($('.toggleSideMenu'),false);
    if(info == 'none'){ 
        $(this).children('ul').slideDown();
        $(this).css({
            'color':'#fff',
            'background-color':'#CF5300',
            'box-shadow':'inset 5px 0 0 0 #000'
            });
        $(this).find('.arrowRight').css({'transform': 'rotate(90deg)'});
    }else {
        $(this).children('ul').slideUp();
        $(this).css({
            'color':'#fff',
            'background-color': 'transparent',
            });
        $(this).find('.arrowRight').css({'transform': 'rotate(0)'});
    }
});

$(window).ready(function () {
    if($(window).width() < 810){
        changeWidthMenu(false);
        changeToggleIcon($('.toggleSideMenu'),true);
    }else {
        changeWidthMenu(true);
        changeToggleIcon($('.toggleSideMenu'),false);  
    }
});