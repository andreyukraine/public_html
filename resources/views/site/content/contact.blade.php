@extends('site.content.home')
@section('title', "Контакти")
@section('header')
    <div id="content" class="site-content">
        <div class="ast-container">
            <div id="primary" class="content-area primary">
                <main id="main" class="site-main" role="main">
                    <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" class="post-5 page type-page status-publish ast-article-single">
                        <!-- .entry-header -->
                        <div class="entry-content clear" itemprop="text">
                            <div class="elementor elementor-5">
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
                                                                <div class="elementor-element elementor-element-38905c3d elementor-widget elementor-widget-heading" data-element_type="heading.default">
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
                <p>{{ Breadcrumbs::render('contact', "") }}</p>
            </div>
        </div>
        <div class="title_page heading">{{trans('index.contact_title')}}</div>
        <div class="container">
            <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="icon icon-primary">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">{{trans('index.contact_phone')}}</h4>
                            <p>+38 067 6 907 177</p>
                            <p>+38 050 1 907 177</p>
                        </div>
                        <div class="time_work">
                            <h4>{{trans('index.contact_work_time')}}</h4>
                            <p>Пн - Пт, 10:00-18:00</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="icon icon-primary">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">{{trans('index.contact_email')}}</h4>
                            <p><a href="mailto:chicopee.ua@gmail.com">chicopee.ua@gmail.com</a></p>
                        </div>
                    </div>

            </div>
        </div>
    </div>


@endsection