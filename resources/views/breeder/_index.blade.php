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
        <div class="title_page heading">{{trans('index.breeder_title')}}</div>
        <br>
    </div>
    <div class="elementor elementor-5">

        <section class="elementor-element elementor-element-153200c6 elementor-section-content-middle elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_top:waves,shape_divider_bottom:waves,shape_divider_bottom_negative:yes}" data-element_type="section">
            <div class="elementor-shape elementor-shape-top " data-negative="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                                             c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                                             c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                </svg>
            </div>
            <div class="elementor-shape elementor-shape-bottom" data-negative="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3
                                             c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3
                                             c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
                </svg>
            </div>
            <div class="elementor-background-overlay"></div>
            <div class="elementor-container elementor-column-gap-no elementor-widget">
                <div class="elementor-row">

                    <div class="container">
                        <div class="heading condition__head">
                            <span class="condition__head-dist">{{ trans('index.breeder_title1')}}</span>
                        </div>
                        <div class="heading_line_w"></div>
                        <div class="condition__action">
                            <button data-toggle="modal" data-target="#modal-bid" class="btn condition__btn">{{ trans('index.submit_kennel')}}</button>
                        </div>
                    </div>

                    {{--окно для заявки питомника--}}
                    <div class="modal modal_bid" id="modal-bid">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <button class="modal-close" data-dismiss="modal"></button>
                                <div class="modal-body">
                                    <div class="modal-heading">{{trans('index.modal-heading')}}</div>
                                    <div class="modal-desc">{{trans('index.modal-desc')}}</div>
                                    <div class="modal-form">
                                        <form name="SIMPLE_FORM_3" id="pitomnik" action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-form__group form-valid">
                                                <input id="name" name="form_text_6" required="" class="modal-form__control form-valid__control" data-valid="{{trans('index.modal-form_control')}}" value="" placeholder="{{trans('index.modal-form_name')}}" type="text">
                                            </div>
                                            <div class="modal-form__group form-valid">
                                                <input id="tel_p" name="form_text_7" required="" class="modal-form__control form-valid__control" data-valid="{{trans('index.modal-form_control')}}" value="" placeholder="{{trans('index.modal-form_tel')}}" type="text">
                                            </div>
                                            <div class="modal-form__group modal-form__group_btn">
                                                <input value="{{trans('index.modal-form_submit')}}" class="btn modal-form__btn" type="submit">
                                            </div>
                                        </form>
                                        <div class="modal alert" id="alert">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <button class="modal-close" data-dismiss="modal"></button>
                                                        <div class="modal-body"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="container">
            <br>
            <div class="heading condition__head">
                <span class="condition__head-dist">
                {{ trans('index.breeder_title2')}}
                </span>
            </div>
            <div class="heading_line"></div>
            <br>
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">{{ trans('index.prog1')}}</div>
                    <div class="content_accordion">
                        <?if(App::getLocale() == 'ua'){?>
                            <p>ЗАЛИШИТИ ЗАЯВКУ</p>
                            <p>1. Зареєстрована назва вашого розплідника</p>
                            <p>2. Порода вашіх вихованців</p>
                            <p>3. Ваш контактний телефон</p>

                            <p>*при першому замовленні ви отримаєте у подарунок від нас 2 банки консерви 800 грам з асортименту на вибір.</p>
                        <?}?>

                        <?if(App::getLocale() == 'ru'){?>
                            <p>ОСТАВИТЬ ЗАЯВКУ</p>
                            <p>1. Зарегистрированное название вашего питомника</p>
                            <p>2. Порода ваших воспитанников</p>
                            <p>3. Ваш контактный телефон</p>

                            <p>* при первом заказе вы получаете от нас в подарок 2 банки консервы 800 грамм из нашего ассортимента на выбор</p>
                        <?}?>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">{{ trans('index.prog2')}}</div>
                    <div class="content_accordion">
                        <?if(App::getLocale() == 'ua'){?>
                            <p>Накопичувальна програма «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ»</p>
                            <p>По лініям PNL (20 кг мішки), CNL (15 кг мішки) та HNL (12 кг мішки) ви будете отримувати кожен 10-й мішок у подарунок, як бонус за постійне годування!</p>
                            <p>Програма накопичувальна, тому вам немає потреби замовляти відразу 9 мішків, щоб отримати бонусний мішок.</p>
                            <p>ВАЖЛИВО! Мінімальний об’єм замовлень має складати 1 або більше мішків на місяць щоб отримувати бонусні мішки за програмою.</p>
                        <?}?>
                        <?if(App::getLocale() == 'ru'){?>
                            <p>Накопительная программа «Постоянное кормление с CHICOPEE»</p>
                            <p>По линии PNL (20 кг мешки), CNL (15 кг мешки) или HNL (12 кг мешки) вы будете получать каждый 10-й мешок в подарок, в качестве бонуса за постоянное кормления!</p>
                            <p>Программа накопительная, поэтому вам не нужно заказывать сразу 9 мешков, чтобы получить бонусный мешок.</p>
                            <p>ВАЖНО! Минимальный объем заказов должен составлять 1 или более мешков в месяц чтобы получать бонусные мешки по программе.</p>
                        <?}?>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">{{ trans('index.prog3')}}</div>
                    <div class="content_accordion">
                        <?if(App::getLocale() == 'ua'){?>
                            <!-- <img class="img_accordion" src="{{asset('images/box.png')}}"> -->
                            Це програма підтримки розплідників для нового посліду – на цю програму можуть бути кваліфіковані тільки розплідники, які мають програму «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ» не менше 6 місяців поспіль, причому мінімальний об’єм замовлень має складати 2 або більше мішків на місяць (у середньому за весь час програми «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ»
                            По цій програмі ви отримуєте спеціальні бокси для майбутніх власників цуценят.
                            В бокс входять: 2 кг корму суперпреміум класу для цуценят, миска для корму, мірний стакан, лист-привітання від нас для майбутнього власника і каталог з нашими кормами. При цьому, майбутній власник вашого цуценяти отримає від нас ціну на корм Чікопі, як для розплідника, а мішок корму буде зарахований в ВАШУ програму «ПОСТІЙНЕ ГОДУВАННЯ З ЧІКОПІ».
                            ВАЖЛИВО! Для отримання цих наборів вам необхідно надати оформлену карту реєстрації посліду, не пізніше 2-х місяців від народження цуценят.Подарункові набори надаються тільки на послід, який з’явився після 6 місяців від початку співпраці.
                        <?}?>
                            <?if(App::getLocale() == 'ru'){?>
                            <!-- <img class="img_accordion" src="{{asset('images/box.png')}}"> -->
                            Это программа поддержки питомников для нового помета - на эту программу могут быть квалифицированы только питомники, которые имеют активную программу «ПОСТОЯННОЕ Кормление с Чикопи» не менее 6 месяцев подряд, причем минимальный объем заказов должен составлять 2 или более мешков в месяц (в среднем за все время программы «ПОСТОЯННОЕ Кормление с Чикопи»
                            По этой программе вы получаете специальные боксы для будущих владельцев щенков.
                            В бокс входят: 2 кг корма суперпремиум класса для щенков, миска для корма, мерный стакан, письмо-поздравление от нас для будущего владельца и каталог с нашими кормами. При этом, будущий владелец вашего щенка получает от нас цену на корм Чикопи, как для питомника, а купленные им мешки корма будут учитываться в ВАШЕЙ программе «ПОСТОЯННОЕ Кормление с Чикопи»

                            ВАЖНО! Для получения этих наборов вам необходимо предоставить оформленную карту регистрации помета, не позднее 2-х месяцев от рождения щенков. Подарочные наборы предоставляются только на помет, который появился после 6 месяцев после начала сотрудничества.
                        <?}?>
                    </div>
                </div>
            </div>
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
            <br>
            <br>
            <div class="heading condition__head">
                <span class="condition__head-dist">
                    {{ trans('index.catalog_breeder')}}
                </span>
            </div>
            <div class="heading_line"></div>
            <div class="b_div_center">
                <a href="/<?= App::getLocale()?>/catalog" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                <span class="elementor-button-content-wrapper">
                    <span class="btn fast__btn">{{ trans('index.go_catalog')}}</span>
                </span>
                </a>
            </div>
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
                        <div class="heading fast__head">
                            {{ trans('index.send_query_breeder')}}
                        </div>
                        <div class="heading_line_w"></div>
                        <div class="condition__action">
                            <button data-toggle="modal" data-target="#modal-bid" class="btn condition__btn">{{ trans('index.submit_kennel')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="elementor-element elementor-element-d4f3dd3 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic}" data-element_type="section">

            <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-row">
                    <div class="container">
                        <div class="fast">
                            <form action="{!! route('product_filter') !!}" id="catalog_form" method="GET" name="filter_index">
                                <div class="heading fast__head">
                                    {{ trans('index.filter1')}} <span class="fast__head-dist">{{ trans('index.filter2')}}</span> {{ trans('index.filter3')}}
                                </div>
                                <div class="heading_line"></div>
                                <div class="fast__main">
                                    <div class="elementor-row">
                                        <div class="col-md-4">
                                            <div class="fast__group">
                                                <div class="jq-selectbox jqselect">
                                                    <select name="cat" id="cat_select" class="category form-select" onchange="OnSelectionChange (this)" data-placeholder="{{trans('index.filter_category')}}" >
                                                        <option style="display: none"></option>
                                                        <option value="">{{trans('index.filter_all')}}</option>
                                                        <?php $value = 'value_'.App::getLocale();
                                                        $name = 'name_'.App::getLocale();
                                                        ?>
                                                        @foreach($o as $o_v)
                                                            <option value="{!! $o_v->id!!}">{!! $o_v->{$name} !!}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="fast__group">
                                                <div class="po jq-selectbox jqselect form-select fast__select-control">

                                                    <select name="age" class="age form-select" data-placeholder="{{trans('index.filter_age')}}">
                                                        <option style="display: none"></option>
                                                        <option value="">{{trans('index.filter_all')}}</option>
                                                        @foreach($r as $r_v)
                                                            <option data-opt="{!! $r_v->value_id !!}" value="{!! $r_v->value_id !!}">{!! $r_v->{$value} !!}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="fast__group">
                                                <div class="jq-selectbox jqselect form-select fast__select-control">
                                                    <select name="size" class="size form-select" data-placeholder="{{trans('index.filter_size')}}">
                                                        <option style="display: none"></option>
                                                        <option value="">{{trans('index.filter_all')}}</option>
                                                        @foreach($s as $s_v)
                                                            <option value="{!! $s_v->value_id !!}">{!! $s_v->{$value}!!}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fast__pick">
                                    <button type="submit" class="btn fast__btn">{{ trans('index.submit_filter')}}</button>
                                </div>
                            </form>
                        </div>
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
                    var tel = $("#tel_p").val();

                    $.ajax({
                            type: "POST",
                            url: "send",
                            data: {
                                "name": name,
                                "tel": tel,
                                "type_form": 1,
                                "_token": $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                //console.log(response);
                                ShowAlert(response);
                            }
                    });
                });
        function ShowAlert($text){
                    $(".modal").modal("hide");
                    $("#alert .modal-body").html($text);
                    $("#alert").modal("show");
                }
        $(document).ready(function () {

            //маска для телефона
            $("#tel_p").inputmask({"mask": "(999) 999-9999"},{ repeat: 14 });

            $(".adres").on("click", function () {

            });

        });

    </script>

    </body>
    </html>

@endsection