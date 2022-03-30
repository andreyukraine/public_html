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

    //маска для телефона
    $("#tel_callback").inputmask({"mask": "(999) 999-9999"},{ repeat: 14 });

    $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).addClass("active");
    });

    // $(document).on('click', "span", function () {
        // сначала удаляешь все
    //    $('span').each(function(index) {
    //        $(this).removeClass('active');
    //    });

        // на нужную вешаешь
    //    $(this).addClass('active');

    //    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //    $.ajax({
            /* the route pointing to the post function */
    //        url: 'ajax',
    //        type: 'POST',
            /* send the csrf-token and the input to the controller */
    //        data: {
    //            _token: CSRF_TOKEN,
    //            //opt: "1",
    //           id:this.id
    //        },
            /* remind that 'data' is the response of the AjaxController */
    //        success: function (data) {
                //console.log(data);
     //           for(var i=0;i<data.length;i++){
    //                $('.product_list').html(data[i]['products']);
    //            }
    //        }
    //    });
    // });


    var modal = document.getElementById('modal-bid');




    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("modal-close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }







    $("#callback_form").submit(function(e) {
        e.preventDefault();
        var tel = $("#tel_callback").val();
        console.log(tel);
        $.ajax({
            type: "POST",
            url:  "send",
            data: {
                "tel": tel,
                "type_form": 3,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                ShowAlert(response);
            }
        });

        var text_send = "== Обратный звонок == " + '%0A' + "Телефон: " + tel + '%0A';
        var urlSend = "https://api.telegram.org/bot2022299265:AAENYSg0d3YbYV2dnIlpv4EV4m5tKJkhhGI/sendMessage?chat_id=815466094&text=" + text_send;
        $.ajax({
            type: "POST",
            url: urlSend
        });

        var settings2 = {
            "url": "https://api.telegram.org/bot2022299265:AAENYSg0d3YbYV2dnIlpv4EV4m5tKJkhhGI/sendMessage?chat_id=142163875&text=" + text_send,
            "method": "POST"
        };
        $.ajax(settings2);
                        
        var settings3 = {
            "url": "https://api.telegram.org/bot2022299265:AAENYSg0d3YbYV2dnIlpv4EV4m5tKJkhhGI/sendMessage?chat_id=217801181&text=" + text_send,
            "method": "POST"
        };
        $.ajax(settings3);
    });
    function ShowAlert($text){
        $(".modal").modal("hide");
        $("#alert .modal-body").html($text);
        $("#alert").modal("show");
    }



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




