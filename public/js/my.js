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


    var modal = document.getElementById('modal-bid');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    };

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




