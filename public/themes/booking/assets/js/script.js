$(document).ready(() => {
    checkScroll();
    $(document).scroll(checkScroll);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select').niceSelect();

    $('#sort-offers').on('change', (e) => {
        let value = $('#sort-offers').val();
        if (value) {
            window.location.href = value;
        }
    });
    $('.owl-carousel').owlCarousel({
        stagePadding: 50,
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 2
            }
        }
    });

    $('#offerComment').on('submit', (e) => {
        e.preventDefault();
        let serializedData = $('#offerComment').serialize();
        $.ajax({
            url: $('#offerComment').attr('action'),
            type: "POST",
            data: serializedData,
            success: function (response) {
                console.log(respone);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});

function checkScroll()
{
    let scroll = $(document).scrollTop();
    const $nav = $('.navbar.fixed-top');
    $nav.toggleClass('navbar-scrolled', scroll > $nav.height());

}
