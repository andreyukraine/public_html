@extends('site.content.home')
@section('title', "Контакти")
@section('meta', "Контакти")
@section('header')
    <div id="content" class="site-content">
        <div class="ast-container">
            <div id="primary" class="content-area primary">
                <main id="main" class="site-main" role="main">
                    <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" class="post-5 page type-page status-publish ast-article-single">
                        <!-- .entry-header -->
                        <div class="entry-content clear" itemprop="text">
                            <div class="elementor elementor-6">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <section class="elementor-element elementor-element-title_post elementor-section-content-bottom elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_bottom:waves}" data-element_type="section">
                                            <div class="elementor-background-overlay"></div>
                                            <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                                                    <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                                             c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                                             c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                                                </svg>
                                            </div>
                                            <div class="elementor-container elementor-column-gap-wider">
                                                <div class="elementor-row">
                                                    <div class="elementor-element elementor-element-75f8b4ef elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <h1 class="elementor-heading-title elementor-size-default"></h1>
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
                <p>{{ Breadcrumbs::render('about', "") }}</p>
            </div>
        </div>
        <div class="title_page heading">{{trans('menu.about')}}</div>
        <br>
        <div class="about">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text_my_style">
                        @if(App::getLocale() == "ua")
                        <p><strong>"ТОВ" ДОМС-ТРЕЙД</strong> є ексклюзивним дистриб'ютором продукції канадської корпорації <strong>Harrison Pet Products inc</strong>.</p>
                        <p>Наша компанія піклується про постачання в Ваш будинок високоякісного корму для Вашого вихованця за чесною ціною. Благополуччя і здоров'я вашого вихованця лежать в основі того, що ми робимо.
                        </p>
                        <p><strong>CHICOPEE</strong> - марка кормів супер-преміум класу для собак і кішок, яка належить канадській корпорації <strong>Harrison Pet Products Inc</strong>.</p>
                        <p>Асортиментна лінійка збалансованих кормів дозволяє підібрати корм для всіх стадій життя вашого вихованця.</p>
                        <p>Сухі та вологі корми, розроблені канадськими спеціалістами, збагачені якісними і корисними інгредієнтами, а також особлива увага приділяється розміру і формі гранул, так як вони впливають на смак корму. </p>
                        <p><strong>Виробництво кормів CHICOPEE </strong>  здійснюється в Німеччині на заводі Bosch Tiernahrung GmbH & Co. KG,
                            при повному контролі якості відповідно до Канадських стандартів, розроблених Канадською Ветеринарно-Медичною Асоціацією.
                            Bosch Tiernahrung GmbH & Co. KG це найбільший на сьогодні завод у Німеччині по виробництву кормів, який працює з 1960 року. З 1990 року завод почав виготовляти корми для собак, кішок і гризунів.
                        </p>
                        <p><strong>Корм CHICOPEE широко використовується в Європі, Азії та вже завоював довіру в 56 країнах світу.</strong></p>
                        @endif
                        @if(App::getLocale() == "ru")
                                <p><strong> "ООО" Домс-ТРЕЙД </strong> является эксклюзивным дистрибьютором продукции канадской корпорации <strong> Harrison Pet Products inc </strong>. </p>
                                <p> Наша компания заботится о поставках в Ваш дом высококачественного корма для Вашего питомца по честной цене. Благополучие и здоровье вашего питомца лежат в основе того, что мы делаем.</p>
                                <p><strong> CHICOPEE </strong> - марка кормов супер-премиум класса для собак и кошек, которая принадлежит канадской корпорации «strong> Harrison Pet Products Inc </strong>. </p>
                                <p> Ассортиментная линейка сбалансированных кормов позволяет подобрать корм для всех стадий жизни вашего питомца. </p>
                                <p> Сухие и влажные корма, разработанные канадскими специалистами, обогащенные качественными и полезными ингредиентами, а также особое внимание уделяется размеру и форме гранул, так как они влияют на вкус корма. </p>
                                <p><strong> Производство кормов CHICOPEE </strong> осуществляется в Германии на заводе Bosch Tiernahrung GmbH & Co. KG,
                                    при полном контроле качества в соответствии с Канадских стандартов, разработанных Канадской Ветеринарно-Медицинской Ассоциацией.
                                    Bosch Tiernahrung GmbH & Co. KG это крупнейший на сегодня завод в Германии по производству кормов, который работает с 1960 года. С 1990 года завод начал изготавливать корма для собак, кошек и грызунов.</p>
                                <p><strong> Корм ​​CHICOPEE широко используется в Европе, Азии и уже завоевал доверие в 56 странах мира. </strong></p>
                            @endif
                            @if(App::getLocale() == "en")
                                <p><strong> Doms-TRADE LLC </strong> is the exclusive distributor of Canadian <strong> Harrison Pet Products inc products </strong>. </p>
                                <p> Our company takes care of delivering high quality pet food to your home at a fair price. The well-being and health of your pet are at the core of what we do. </p>
                                <p><strong> CHICOPEE </strong> is a super premium class dog and cat feed brand that is owned by Canadian firm Harrison Pet Products Inc </strong>. </p>
                                <p> An assortment of balanced feed allows you to choose food for all stages of your pet's life. </p>
                                <p> Dry and wet foods developed by Canadian experts, enriched with quality and healthy ingredients, and special attention is paid to the size and shape of the granules, as they affect the taste of the feed. </p>
                                <p><strong> CHICOPEE feed production </strong> is carried out in Germany at Bosch Tiernahrung GmbH & Co. KG,with full quality control in accordance with Canadian standards developed by the Canadian Veterinary Medical Association.Bosch Tiernahrung GmbH & Co. KG is the largest feed production plant in Germany today, which has been operating since the 1960s. Since 1990, the plant began to manufacture food for dogs, cats and rodents. </p>
                                <p><strong> CHICOPEE feed is widely used in Europe, Asia and has already gained confidence in 56 countries of the world. </strong></p>
                                @endif
                    </div>
                </div>
                <div class="col-lg-6 ramka">
                    <img class="img-fluid center" src="{{ asset('/images/sertificat.jpg') }}" >
                </div>
            </div>

        </div>
    </div>
@endsection
