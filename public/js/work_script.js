﻿$('.search_bot').on('submit',function() {
    //alert('btn');
    var search = $('.search').val();
    console.log(search);

    $.ajax({
        url: '/test/bot',
        data: {search: search},
        type: 'POST',
        dataType: 'html',
        success: function(data){
            console.log(data);
            $('.add_answer').html(data);
        }
    });
    return false;

});
$('.add_answer').on('click',function () {
    $('.add_answer').off('click');

    $('#mainTable').editableTableWidget({editor: $('<textarea>')});
    var input = $('textarea').val();
    console.log(input);

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
    //$('.del_btn').unbind('click');
    //$('.del_btn').bind('click');
    //$('.add_answer').unbind('click');
    //$('.add_answer').bind('click');
    //$('table td').unbind('click');
    //$('table td').bind('click');

    $('table td').on('change', function(evt, newValue) {

        var id = $(this).attr('id');
        var categorie = $(this).attr('name');
        console.log(id);
        console.log(categorie);
        console.log(newValue);
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
        });
    });
});




function active_modal(){
    var color = $(this).data('color');
    $('#defaultModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
    $('#defaultModal').modal('show');
}



$('.take_answer').click(function() {
    //var chat_id = $('.ches:checked').attr('chat_id');
    var data= $('.ches:checked').map(function()
    {
        return [[this.value,this.name]];
    }
    ).get();
    var answer= $('.ches:checked').map(function()
        {
            return this.title;
        }
    ).get().join();

    if(data.length == 0) { console.log('empty'); return false;}


    active_modal();

    $('.answer_modal').val(answer);
   if(answer != undefined){
       if( window.answer_check != answer)
    {
    $('.answer_empty ,.answer_details').val('');
        window.answer_check = answer;
    }
   }
    $('.save_answer').unbind('click');
    $('.save_answer').bind('click', function(){
        var result = confirm('Точно сохранить?');
        if (!result) {return false;}

        var base= $('textarea').map(function()
        {
            return this.value;
        }).get();

     $.ajax({
        url: '/teach/take_answer',
        data: {data: data,base:base},
        type: 'POST',
        dataType: 'html',
        success: function(data){
            console.log(data);
        }
    });
        $(".ches:checked").remove();

        data.forEach(function(item) {
            $('label[for='+ item[0] +']').remove();
        });
        return true; });

});


