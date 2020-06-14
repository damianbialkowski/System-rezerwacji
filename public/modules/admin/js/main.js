$(document).ready(function () {

    $('.menu-item').click(function () {
        if ($('.menu-item').not(this).hasClass('active') &&
            $('.menu-item').not(this).find('.menu-item-collapse').is(':visible')) {
            $('.menu-item').removeClass('active');
            $('.menu-item').find('.menu-item-collapse').slideUp('fast');
        }
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('.menu-item').find('.menu-item-collapse').slideUp('fast');
        } else {
            $(this).addClass('active');
        }
        if ($(this).find('.menu-item-collapse').length && !$(this).find('.menu-item-collapse').is(':visible')) {
            $(this).find('.menu-item-collapse').slideDown('fast');
        }
    });
});
