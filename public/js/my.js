


$(document).ready(function () {

    //селектор языка
    // $('span.select_lang').click(function () {
    //     var lang = this.id;
    //     //console.log(lang);
    //     $.ajax({
    //         type: 'POST',
    //         url: '/loc',
    //         beforeSend: function() {
    //             $('#loader').show();
    //             $('body').addClass('modal-loading');
    //         },
    //         complete: function() {
    //             $('#loader').hide();
    //         },
    //         data: {
    //             "lang": lang,
    //             "_token": $('meta[name="csrf-token"]').attr('content')},
    //         success: function(response){
    //             //console.log(response);
    //             location.reload();
    //         }
    //     });
    // });

    //стилизация селекта
    $('.form-select').styler({
        selectPlaceholder: 'Select...',
    });
    //маска для телефона
    $("#tel_q").inputmask({"mask": "(999) 999-9999"},{ repeat: 14 });
    //email mask
    $("#email_q").inputmask({
        mask: "*{1,64}[.*{1,64}][.*{1,64}][.*{1,63}]@-{1,63}.-{1,63}[.-{1,63}][.-{1,63}]",
        greedy: false,
        casing: "lower",
        definitions: {
            "*": {
                validator: "[0-9\uff11-\uff19A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5!#$%&'*+/=?^_`{|}~-]"
            },
            "-": {
                validator: "[0-9A-Za-z-]"
            }
        },
        onUnMask: function onUnMask(maskedValue, unmaskedValue, opts) {
            return maskedValue;
        },
        inputmode: "email"
    });
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
});



