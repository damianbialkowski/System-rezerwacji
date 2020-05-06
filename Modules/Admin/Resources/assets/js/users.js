const dataSearch = $('.searchUser .searchDataInput');
const findUserBtn = $('.findUserByName');

findUserBtn.click(function(){
    let userInfo = dataSearch.val();
    let fullName = dataSearch.val().trim().split(" ");
    console.log(userInfo);

    $('.tableOfUsers>div:nth-child(odd)').css('background-color','#eee');
    $('.tableOfUsers>div:nth-child(even)').css('background-color','rgba(94, 93, 82, 0.1)');

    if($('.userInfo .fullname:contains("'+userInfo+'")').length){
        if(fullName.length === 2){
            $('html,body').animate({
                scrollTop: $('.userInfo .fullname:contains("'+userInfo+'")').offset().top-100
            },900);
            $('.userInfo .fullname:contains("'+userInfo+'")').parent().parent().parent().css('background-color','rgba(94, 93, 82, 0.4)');
        }
    }else {
        $('.userListNotExist').show();
        $('.usernameSearch').text(userInfo);
    }
    
});
