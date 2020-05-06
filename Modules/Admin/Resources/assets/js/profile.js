const btnProfileOperation = $('.buttonsProfileInfo>a:not(:last-child)');
let search = window.location.hash;

let displayProfileInfo = ()=> {
    $('.profileDetails>div').hide('fast');
    $('.loadInfoProfile').delay(500).show().delay(1000).fadeOut();
    $(search).delay(1500).show(1000);
}

if(search !== ''){
    displayProfileInfo();
    $(search+'Btn').addClass('activeProfileInfo');
    if($('#infoProfileBtn').hasClass('activeProfileInfo-firstChild')){
        $('#infoProfileBtn').removeClass('activeProfileInfo-firstChild')
    }
}

btnProfileOperation.on('click',function(){
    search = $(this).attr('href');
    if(search == '#infoProfile'){
        if(!$(this).hasClass('activeProfileInfo-firstChild')){
            btnProfileOperation.removeClass('activeProfileInfo-firstChild activeProfileInfo');
            $(this).addClass('activeProfileInfo-firstChild');
            displayProfileInfo();
        }
    }else {
        if(!$(this).hasClass('activeProfileInfo')){
            btnProfileOperation.removeClass('activeProfileInfo-firstChild activeProfileInfo');
            $(this).addClass('activeProfileInfo');
            displayProfileInfo();
        }
    }
});
