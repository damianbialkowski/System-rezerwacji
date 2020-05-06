const toggleSettingsBtn = $('.toggleSettings');
const formSettings = $('.formSettings');

toggleSettingsBtn.on('click',function(){
    let type = $(this).parent().parent().data('id');
    if(type){
        $(this).parent().parent().find('.formSettings').slideToggle();
        $(this).parent().parent().find(' hr').slideToggle();
    }
});