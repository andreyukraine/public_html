


$(document).ready(function () {

    //селектор языка
    $('span.select_lang').click(function () {
        var lang = this.id;
        //console.log(lang);
        $.ajax({
            type: 'POST',
            url: '/admin/loc',
            beforeSend: function() {
                $('#loader').show();
                $('body').addClass('modal-loading');
            },
            complete: function() {
                $('#loader').hide();
            },
            data: {
                "lang": lang,
                "_token": $('meta[name="csrf-token"]').attr('content')},
            success: function(response){
                //console.log(response);
                location.reload();
            }
        });
    });

});



