if($('#will_be_subcategory').is(':checked')){
    $('select[name="subcategory"]').removeAttr('disabled');
}

$('#will_be_subcategory').on('click',function(){
    if($('select[name="subcategory"]').is(':disabled')){
        $('select[name="subcategory"]').removeAttr('disabled');
    }else {
        $('select[name="subcategory"]').attr('disabled','disabled');
    }
});