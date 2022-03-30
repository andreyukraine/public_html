@extends('site.content.home')
@section('title', trans('index.breeder_title'))
@section('header')
    <div id="content" class="site-content">
        <div class="ast-container">
            <div id="primary" class="content-area primary">
                <main id="main" class="site-main" role="main">
                    <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope"
                             class="post-5 page type-page status-publish ast-article-single">
                        <!-- .entry-header -->
                        <div class="entry-content clear" itemprop="text">
                            <div class="elementor elementor-5">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <section
                                                class="elementor-element elementor-element-title_post elementor-section-content-bottom elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section"
                                                data-settings="{background_background:classic,shape_divider_bottom:waves}"
                                                data-element_type="section">
                                            <div class="elementor-background-overlay"></div>
                                            <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"
                                                     preserveAspectRatio="none">
                                                    <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                                             c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                                             c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                                                </svg>
                                            </div>
                                            <div class="elementor-container elementor-column-gap-wider">
                                                <div class="elementor-row">
                                                    <div class="elementor-element elementor-element-75f8b4ef elementor-column elementor-col-100 elementor-top-column"
                                                         data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-38905c3d elementor-widget elementor-widget-heading"
                                                                     data-element_type="heading.default">
                                                                    <div class="elementor-widget-container">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row item_crumbs">
                <p>{{ Breadcrumbs::render('breeders', "") }}</p>
            </div>
        </div>
        <br>
        <br>
        <div class="title_page heading">{{trans('index.breeder_title2')}}</div>
        <div class="heading_line"></div>
        <div class="condition__action">
            <button data-toggle="modal" data-target="#modal-bid" class="btn condition__btn">{{ trans('index.submit_kennel')}}</button>
        </div>
        {{--окно для заявки питомника--}}
                    <div class="modal modal_bid" id="modal-bid">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" id="request-modal">
                                <button class="modal-close" data-dismiss="modal"></button>
                                <div class="modal-body">
                                    <div class="modal-heading">{{trans('index.modal-heading')}}</div>
                                    <div class="modal-form">
                                        <form name="SIMPLE_FORM_3" id="pitomnik" action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-form__group form-valid">
                                                <input id="name" name="form_text_6" required="" class="modal-form__control form-valid__control" data-valid="{{trans('index.modal-form_control')}}" value="" placeholder="{{trans('index.modal-form_name_breeder')}}" type="text">
                                            </div>
                                            <div class="modal-form__group form-valid">
                                                <input id="poroda" name="form_text_6" required="" class="modal-form__control form-valid__control" data-valid="{{trans('index.modal-form_control')}}" value="" placeholder="{{trans('index.modal-form_poroda_breeder')}}" type="text">
                                            </div>
                                            <div class="modal-form__group form-valid">
                                                <input id="name_user" name="form_text_6" required="" class="modal-form__control form-valid__control" data-valid="{{trans('index.modal-form_control')}}" value="" placeholder="{{trans('index.modal-form_name_user')}}" type="text">
                                            </div>
                                            <div class="modal-form__group form-valid">
                                                <input id="tel_p" name="form_text_7" required="" class="modal-form__control form-valid__control" data-valid="{{trans('index.modal-form_control')}}" value="" placeholder="{{trans('index.modal-form_tel_breeder')}}" type="text">
                                            </div>
                                            <div class="modal-form__group modal-form__group_btn">
                                                <input value="{{trans('index.modal-form_submit')}}" class="btn modal-form__btn" type="submit">
                                            </div>
                                        </form> 
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="modal alert" id="alert">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" id="request-modal">
                                <button class="modal-close" data-dismiss="modal"></button>
                                    <div class="modal-body">
                                         <div class="modal-heading"></div>
                                         <div class="modal-form" id="res_block">
                                            <img class="_img_ok" src="{{asset('images/ok.png')}}">
                                            <div class="msg_block"></div>
                                         </div>
                                    </div>
                                </div>
                        </div>
                    </div>
        <br>
        <br>
    </div>
    <div class="elementor elementor-5">
        <div class="container">
            <br>
            <div class="heading condition__head">
                <span class="condition__head-dist">
                {{ trans('index.breeder_title1')}}
                </span>
            </div>
            
            <div class="heading_line"></div>
            
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">{{ trans('index.prog1') }}</div>
                    <div class="content_accordion">
                        <?if(App::getLocale() == 'ua'){?>
                            <p>По лініям PNL (20 кг мішки), CNL (15 кг мішки) та HNL (12 кг мішки) ви будете отримувати кожен 10-й мішок у подарунок, як бонус за постійне годування!</p>
                            <p>Програма накопичувальна, тому вам немає потреби замовляти відразу 9 мішків, щоб отримати бонусний мішок.</p>
                            <p>ВАЖЛИВО! Мінімальний об’єм замовлень має складати 1 або більше мішків на місяць щоб отримувати бонусні мішки за програмою.</p>
                        <?}?>
                        <?if(App::getLocale() == 'ru'){?>
                            <p>По линии PNL (20 кг мешки), CNL (15 кг мешки) или HNL (12 кг мешки) вы будете получать каждый 10-й мешок в подарок, в качестве бонуса за постоянное кормления!</p>
                            <p>Программа накопительная, поэтому вам не нужно заказывать сразу 9 мешков, чтобы получить бонусный мешок.</p>
                            <p>ВАЖНО! Минимальный объем заказов должен составлять 1 или более мешков в месяц чтобы получать бонусные мешки по программе.</p>
                        <?}?>
                        
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">{{ trans('index.prog2')}}</div>
                    <div class="content_accordion">
                        <?if(App::getLocale() == 'ua'){?>
                            <!-- <img class="img_accordion" src="{{asset('images/box.png')}}"> -->
                            <p>Це програма підтримки розплідників для нового посліду – на цю програму можуть бути кваліфіковані тільки розплідники, які мають програму «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ» не менше 6 місяців поспіль, причому мінімальний об’єм замовлень має складати 2 або більше мішків на місяць (у середньому за весь час програми «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ»</p>
                            <p>По цій програмі ви отримуєте спеціальні бокси для майбутніх власників цуценят.</p>
                            <p>В бокс входять: 2 кг корму суперпреміум класу для цуценят, миска для корму, мірний стакан, лист-привітання від нас для майбутнього власника і каталог з нашими кормами. При цьому, майбутній власник вашого цуценяти отримає від нас ціну на корм Чікопі, як для розплідника, а мішок корму буде зарахований в ВАШУ програму «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ».</p>
                            
                            <p>ВАЖЛИВО! Для отримання цих наборів вам необхідно надати оформлену карту реєстрації посліду, не пізніше 2-х місяців від народження цуценят.Подарункові набори надаються тільки на послід, який з’явився після 6 місяців від початку співпраці.</p>
                        <?}?>
                            <?if(App::getLocale() == 'ru'){?>
                            <!-- <img class="img_accordion" src="{{asset('images/box.png')}}"> -->
                            <p>Это программа поддержки питомников для нового помета - на эту программу могут быть квалифицированы только питомники, которые имеют активную программу
                            <p>«ПОСТОЯННОЕ Кормление с Чикопи» не менее 6 месяцев подряд, причем минимальный объем заказов должен составлять 2 или более мешков в месяц (в среднем за все время программы «ПОСТОЯННОЕ Кормление с Чикопи»</p>
                            <p>По этой программе вы получаете специальные боксы для будущих владельцев щенков.</p>
                            <p>В бокс входят: 2 кг корма суперпремиум класса для щенков, миска для корма, мерный стакан, письмо-поздравление от нас для будущего владельца и каталог с нашими кормами. При этом, будущий владелец вашего щенка получает от нас цену на корм Чикопи, как для питомника, а купленные им мешки корма будут учитываться в ВАШЕЙ программе «ПОСТОЯННОЕ Кормление с Чикопи»</p>

                            <p>ВАЖНО! Для получения этих наборов вам необходимо предоставить оформленную карту регистрации помета, не позднее 2-х месяцев от рождения щенков. Подарочные наборы предоставляются только на помет, который появился после 6 месяцев после начала сотрудничества.</p>
                        <?}?>
                        
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">{{ trans('index.prog3')}}</div>
                    <div class="content_accordion">
                        <?if(App::getLocale() == 'ua'){?>
                            <p>Разом з першим бонусним мішком, розплідник отримує в ПОДАРУНОК фірмовий контейнер для зберігання корму (виробництва Швейцарія, з харчового пластика, з ущільнювачем кришки, що забезпечує чудове зберігання і свіжість корму).</p>

                            <p>Можливість залучення роздрібних клієнтів чи власників ваших цуценят до годування ними їх улюбленців кормом ТМ ЧІКОПІ.
                            Якщо ви рекомендуєте наш корм і клієнт робить замовлення на великий мішок 15кг або 12кг (то за умови, що клієнт називає ваш розплідник як джерело інформації, звідки дізнався про наш корм), клієнт отримує також, як бонус, ціну розплідника, а усі замовлення такого клієнта будуть враховані в ВАШУ накопичувальну програму «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ» і ви швидше отримаєте свій бонусний мішок корму, а клієнт залишається закріплений за вашим розплідником допоки ви співпрацюєте з ЧІКОПІ.</p>
                            <p>Якщо у вас невеликий розплідник і ви не маєте середньомісячного об’єму 2 мішки на місяць, то ви можете скористатися програмою рекомендацій і досягти необхідного кваліфікаційного об’єму для отримання подарункових наборів по програмі «НОВЕ ЖИТТЯ З ЧІКОПІ».
                            ВАЖЛИВО! Бонусний мішок доставляється виключно на адресу розплідника.
                            Доставка бонусного мішка безкоштовна тільки разом з основним замовленням на суму від 1000 грн, в іншому випадку доставка за рахунок отримувача.</p>
                        <?}?>

                        <?if(App::getLocale() == 'ru'){?>
                            <p>Вместе с первым бонусным мешком, питомник получает в ПОДАРОК фирменный контейнер для хранения корма (производства Швейцария, из пищевого пластика, с уплотнителем крышки, что гарантирует прекрасное хранение и свежесть корма).</p>

                            <p>Возможность привлечения розничных клиентов или владельцев ваших щенков до кормления ими их любимцев кормом ТМ Чикопи.
                            Если вы рекомендуете наш корм и клиент делает заказ на большой мешок 15кг или 12кг (то при условии, что клиент называет ваш питомник в качестве источника информации, откуда узнал о нашем корме), клиент получает также, как бонус, цену питомника, а все заказы такого клиента будут учтены в ВАШУ накопительную программу «ПОСТОЯННОЕ Кормление с Чикопи» и вы быстрее получите свой бонусный мешок корма, а клиент остается закреплен за вашим питомником пока вы сотрудничаете с Чикопи.
                            </p>
                            <p>Если у вас небольшой питомник и вы не имеете среднемесячного объема 2 мешка в месяц, то вы можете воспользоваться программой рекомендаций и достичь необходимого квалификационного объема для получения подарочных наборов по программе «НОВАЯ ЖИЗНЬ С Чикопи».
                            ВАЖНО! Бонусный мешок доставляется исключительно в адрес питомника.
                            Доставка бонусного мешка бесплатная только вместе с основным заказом на сумму от 1000 грн, в противном случае доставка за счет получателя.</p>
                        <?}?>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="condition__action">
                <button data-toggle="modal" data-target="#modal-bid" class="btn condition__btn">{{ trans('index.submit_kennel')}}</button>
            </div>
            <br>
            <br>
            <p style="text-align: center;">{{ trans('index.button_desc') }}</p>
            <br>
            <br>
        </div>

        <section class="elementor-element elementor-element-dc4b6a7 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_top:waves,shape_divider_bottom:waves}" data-element_type="section">
            <div class="elementor-shape elementor-shape-top" data-negative="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                                             c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                                             c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                </svg>
            </div>
            <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                                             c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                                             c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                </svg>
            </div>
            <div class="elementor-background-overlay"></div>
            <div class="elementor-container elementor-column-gap-default elementor-widget">
                <div class="elementor-row ">
                    <div class="container">
                        <div class="heading condition__head">
                            <span class="condition__head-dist">{{trans('index.why_breeder')}}</span>
                        </div>
                        <div class="formula__main">
                            <div class="formula-advant">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_teeth">
                                            <div class="formula-advant__head_b">{{trans('index.item_teeth')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.teeth_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_leather">
                                            <div class="formula-advant__head_b">{{trans('index.item_leather')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.leather_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_bone">
                                            <div class="formula-advant__head_b">{{trans('index.item_bone')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.bone_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_digestion">
                                            <div class="formula-advant__head_b">{{trans('index.item_digestion')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.digestion_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_immunity">
                                            <div class="formula-advant__head_b">{{trans('index.item_immunity')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.immunity_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_muscle">
                                            <div class="formula-advant__head_b">{{trans('index.item_muscle')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.muscle_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_ingredient">
                                            <div class="formula-advant__head_b">{{trans('index.item_ingredient')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.ingredient_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="formula-advant__item formula-advant__item_germany">
                                            <div class="formula-advant__head_b">{{trans('index.item_germany')}}</div>
                                            <div class="formula-advant__desc_b">{{trans('index.germany_desc')}}</div>
                                        </div>
                                        <!-- /.formula-advant__item -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.formula-advant -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            
        </div>

        <section class="elementor-element elementor-element-d4f3dd3 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic}" data-element_type="section">

            <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-row">
                    <div class="container">
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            @if(count($files) > 0)
                <div class="heading condition__head">
                <span class="condition__head-dist">
                    {{ trans('index.gallery_title')}}
                </span>
                </div>
                <div class="img_block_breeder">
                @foreach($files as $file)
                    <a href="{{$file->url}}" data-fancybox="gallery">
                        <div class="img_gall" style="background-image: url('{{$file->url}}')"></div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <?php
        date_default_timezone_set('Europe/Kiev');
        $time_now = date("H:i:s");
        $day_now = getdate()['wday'];
    ?>

    <script>
        $('.accordion').accordion({
            active: 0,
            heightStyle: 'content',
            header: '> .accordion-item > .accordion-header'
        });

        $('[data-fancybox="gallery"]').fancybox({
          buttons: [
            "slideShow",
            "thumbs",
            "zoom",
            "fullScreen",
            "share",
            "close"
          ],
          loop: false,
          protect: true
        });

        $("#pitomnik").submit(function(e) {
                    e.preventDefault();
                    var name = $("#name").val();
                    var name_user = $("#name_user").val();
                    var tel = $("#tel_p").val();
                    var poroda = $("#poroda").val();
                    var text_send = "== Заявка страница бридеров == " + '%0A' + "Название питомника: " + name + '%0A' + "Порода воспитаников: " + poroda + '%0A' + "Имя: " + name_user + '%0A' + "Телефон: " + tel + '%0A';
                    var urlSend = "https://api.telegram.org/bot2022299265:AAENYSg0d3YbYV2dnIlpv4EV4m5tKJkhhGI/sendMessage?chat_id=815466094&text=" + text_send;
                    var timeformatPhp = "<?php echo $time_now ?>";
                    var dayNowPhp = "<?php echo $day_now ?>";
                    
                    //console.log(timeformatPhp);
                    //console.log(dayNowPhp);

                    $.ajax({
                            type: "POST",
                            url: urlSend,
                            success: function (response) {
                                
                                if (timeformatPhp >= "10:00:00" && timeformatPhp <= "17:00:00" && dayNowPhp != 0 && dayNowPhp != 6){
                                    var text_responce = 'Спасибо, мы получили ваш запрос и свяжемся с вами в течение 15 минут!';
                                }else{
                                    var text_responce = 'Спасибо, мы получили ваш запрос и свяжемся с вами в ближайшее время!';
                                }

                                $(".modal").modal("hide");
                                $("#alert").modal("show");
                                $("#alert .msg_block").html(text_responce);
                                //ShowAlert(text_responce);
                            }
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

                    var crm_url = {
                      "url": "https://crm.chicopee.in.ua/rest/1/p80rr4hw10jtp4q0/crm.lead.add.json?FIELDS[TITLE]=" + name + "&FIELDS[NAME]=" + name_user + "&FIELDS[LAST_NAME]=" + poroda + "&FIELDS[PHONE][0][VALUE]=" + tel + "&FIELDS[PHONE][0][VALUE_TYPE]=WORK",
                      "method": "POST",
                      "timeout": 0
                    };
                    //console.log(crm_url);
                    
                    $.ajax(crm_url);
        });

        function ShowAlert($text){
            $(".modal").modal("hide");
            $("#alert").modal("show");
            $("#alert .modal-body").html($text);    
        }
        $(document).ready(function () {

            //маска для телефона
            $("#tel_p").inputmask({"mask": "+38 (999) 999-9999"},{ repeat: 14 });
            
        });

    </script>

    </body>
    </html>

@endsection