const buttonPanel = $('.rightPanel');
const rightMenu = $('.rightMenu');
const closeMenuButton = $('.closeRightMenu');

buttonPanel.click(function(){
    if(rightMenu.width()==0){
        rightMenu.animate({ width: '350px','opacity' : '1' }, 500).toggle();
        $('.rightMenu>*').delay(200).animate({'opacity':'1'},500);
    }
});

closeMenuButton.click(function(){
    $('.rightMenu>*').animate({'opacity':'0'},500);
    $('.rightMenu').delay(200).animate({ width: 0,opacity:0 }, 500).hide(0);

});