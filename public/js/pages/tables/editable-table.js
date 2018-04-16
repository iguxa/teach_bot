$(function () {
    $('#mainTable').editableTableWidget({editor: $('<textarea>')});
    var input = $('textarea').val();
    console.log(input);
});
$('table td').on('change', function(evt, newValue) {
    var id = $(this).attr('id');
    var categorie = $(this).attr('name');
    console.log(id);
    console.log(categorie);
    console.log(newValue);
    if($(this).attr('id') === 'del_btn'){return false;}

    var result = confirm('Точно сохранить?');
    if (!result) {return false;}

    $.ajax({
        url: '/change/answer',
        data: {id: id,categorie: categorie,value: newValue},
        type: 'POST',
        dataType: 'html',
        success: function(data){
            console.log(data);
        }
    })
});

$('.del_btn').click(function() {
    //var chat_id = $('.ches:checked').attr('chat_id');
        var id = $(this).attr('id');


        var result = confirm('Точно удалить?');
        if (!result) {return false;}
        console.log(id);
        $.ajax({
            url: '/delete/del_id',
            data: {id: id},
            type: 'POST',
            dataType: 'html',
            success: function(data){
                console.log(data);
            }
        });
         $('tr[id='+ id +']').remove();

});