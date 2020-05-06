const selectTypeTicket = $('.selectTypeTicket');
const rowInTable = $('.ticketList').children();
let typeTicket = window.location.hash.replace('#','');
let contains;

let displayTickets = (type) => {
    let arr = { 'active':'active', 'closed':'unActive' }
    switch(type){
        case 'active': case 'closed':
            rowInTable.each(function(){
                ($(this).children().find('span').hasClass(arr[type]+'Circle')) ? $(this).fadeIn() : $(this).fadeOut();
            });
            break;
        case 'all':
            rowInTable.each(function(){
                ($(this).css('display') == 'none') ? $(this).fadeIn() : null;
            });
            break;
        case 'taken':
            rowInTable.each(function(){
                contains = false;
                $.each(this.cells,function(){
                    if($(this).data('id') == '1') contains = true;
                });
                (contains) ? $(this).fadeIn() : $(this).fadeOut();
            });
            break;
    }
    $('.ticketSpanList').html(type);
};


if(typeTicket){
    $('.selectTypeTicket option').each(function(){
        ($(this).text() == typeTicket) ? $(this).attr('selected','selected') : null;
    });
    displayTickets(typeTicket);
}

selectTypeTicket.on('change',function(){
    let type = $(this).val();
    if(type) displayTickets(type);
    window.location.hash=type;
});


