$(document).ready(function () {
    $('.alert').on('click', function () {
        $('.alert').hide();
    });

    $(document).on('click', '.prevent', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('.delete_article').attr('href', url);
        $('.shadow_bg').show();
        $('.alert').show().addClass('active-alert');
    });

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
    })

    $('.generate_password').on('click', function () {
        var randomPassword = randomString();
        $('.generated_password').text(randomPassword);
    });
    $('.generated_password').text(randomString());

});
var password_length = 6;

function randomString() {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < password_length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
