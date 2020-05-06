const collapseGroupBtn = $('.collapseGroupinfo');

collapseGroupBtn.on('click',function(){
        $(this).parent().parent().children('.usersOfGroup').slideToggle('fast');
});