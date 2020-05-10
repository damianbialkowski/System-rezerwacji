$(document).ready(function(){
    $('.alert').on('click',function(){
        $('.alert').hide();
    });

    $(document).on('click','.prevent',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $('.delete_article').attr('href',url);
        $('.shadow_bg').show();
        $('.alert').show().addClass('active-alert');
    });

    $('.cancel').on('click',function(){
        $('.alert').removeClass('active-alert');
        $('.shadow_bg').hide();
    });
});