// const $sideMenuElement = $('.menu-item');
// const $toggleSideMenu = $('.toggle-menu');
// const $sideMenu = $('.menu-items');
// const $sideContent = $('.sideContent');
// var menuExpanded = true;
//
// $toggleSideMenu.click(function () {
//     changeToggleIcon($(this), menuExpanded);
//     changeWidthMenu(menuExpanded);
//     resetClickElement();
// });
//
// var changeToggleIcon = (element, expanded) => {
//     if (expanded) {
//         menuExpanded = false;
//         if (element.hasClass('toggleSideMenu')) {
//             element.removeClass('fa-toggle-on');
//             element.addClass('fa-toggle-off');
//         } else {
//             $toggleSideMenu.removeClass('fa-toggle-on');
//             $toggleSideMenu.addClass('fa-toggle-off');
//         }
//     } else {
//         menuExpanded = true;
//         if (element.hasClass('toggleSideMenu')) {
//             element.removeClass('fa-toggle-off');
//             element.addClass('fa-toggle-on');
//         } else {
//             $toggleSideMenu.removeClass('fa-toggle-off');
//             $toggleSideMenu.addClass('fa-toggle-on');
//         }
//     }
// }
//
// var changeWidthMenu = (expanded) => {
//     resetClickElement();
//     if (expanded) {
//         $sideMenu.animate({'width': '250px',}, 300);
//         $('.textElement').show();
//
//     } else {
//         if (window.matchMedia('(max-width: 575.98px)').matches) {
//             $sideMenu.animate({'width': '0px',}, 300);
//             $sideContent.animate({'margin-left': '0px'}, 300);
//         } else {
//             $sideMenu.animate({'width': '100px',}, 300);
//             $sideContent.animate({'margin-left': '100px'}, 300);
//         }
//         $('.textElement').hide();
//         $sideMenuElement.animate({'font-size': '0'});
//     }
// }
//
// var resetClickElement = () => {
//     $('.sideMenuElements>li>ul').slideUp();
//     $sideMenuElement.find('.arrowRight').css({
//         'transform': 'rotate(0)'
//     });
// }
//
//
// $sideMenuElement.click(function () {
//     var info = $(this).children('ul').css('display');
//     changeWidthMenu(true);
//     changeToggleIcon($('.toggle-menu'), false);
//     if (info == 'none') {
//         $(this).children('ul').slideDown();
//         $(this).find('.arrowRight').css({'transform': 'rotate(90deg)'});
//     } else {
//         $(this).children('ul').slideUp();
//         $(this).find('.arrowRight').css({'transform': 'rotate(0)'});
//     }
// });
//
// $(window).ready(function () {
//     if ($(window).width() < 810) {
//         changeWidthMenu(false);
//         changeToggleIcon($('.toggleSideMenu'), true);
//     } else {
//         changeWidthMenu(true);
//         changeToggleIcon($('.toggleSideMenu'), false);
//     }
// });
