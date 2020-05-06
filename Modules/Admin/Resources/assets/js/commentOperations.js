const addCommentButton = $('.addCommentIcon');

addCommentButton.click(function(){
    if($('.addNewComment form textarea').prop('disabled') === true){
        $(this).css({
            'opacity':'0',
            'display':'none'
        });
        $('.addNewComment form textarea').attr('disabled',false);
        $('.addCommentButton').slideToggle();
    }
});