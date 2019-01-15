<!DOCTYPE html>
<html>
@section('meta', e(trans('index.mete_home')))
@section('title', e(trans('index.title_home')))
@section('description', e(trans('index.desc_home')))
@section('keywords', e(trans('index.keywords_home')))
@section('url', route('home'))
@include('site.header.index')

<body class="home page-template-default page wp-custom-logo ast-page-builder-template ast-single-post ast-mobile-inherit-site-logo ast-sticky-main-shrink ast-sticky-custom-logo ast-primary-sticky-enabled ast-inherit-site-logo-transparent ast-theme-transparent-header elementor-default elementor-page elementor-page-5ast-primary-sticky-header-active">
<div id="loader"></div>
<div id="page" class="hfeed site">

{{--include menu--}}
@include('site.menu.index')
@yield('header')
<!-- #astra-fixed-header -->
@yield('content')
    <? $url = '/'.\App\Http\Middleware\Locale::getLocale()?>
@if (Request::url() == url($url))
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
                                            <section id="slide" class="elementor-element elementor-element-3796d0e6 elementor-section-content-bottom elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_bottom:waves}" data-element_type="section">
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
                                                                    <div class="elementor-element elementor-element-9c9b708 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-text-editor elementor-clearfix">
                                                                                <h1><span class="title_home">{{ trans('slider.prev_desc')}}</span></h1>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-38905c3d elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                                                        <div class="elementor-widget-container">
                                                                            <h4 class="h4_home">{{ trans('slider.desc')}}</h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-dd06342 elementor-align-center elementor-widget elementor-widget-button" data-element_type="button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-button-wrapper">
                                                                                <a href="/<?= App::getLocale()?>/catalog" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                                                                    <span class="elementor-button-content-wrapper">
                                                                                    <span class="elementor-button-text">{{ trans('index.go_catalog')}} </span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="visible-xs"><img width="35" src="{{asset('images/down.gif')}}"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-element elementor-element-d4f3dd3 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic}" data-element_type="section">
                                                <div class="elementor-background-overlay"></div>
                                                <div class="elementor-container elementor-column-gap-no">
                                                    <div class="elementor-row">
                                                        <div class="container">
                                                                <div class="fast">
                                                                    <form action="{!! route('product_filter') !!}" id="catalog_form" method="GET">
                                                                        <div class="heading fast__head">
                                                                            {{ trans('index.filter1')}} <span class="fast__head-dist">{{ trans('index.filter2')}}</span> {{ trans('index.filter3')}}
                                                                        </div>
                                                                        <div class="heading_line"></div>
                                                                        <div class="fast__main">
                                                                            <div class="elementor-row">
                                                                                <div class="col-md-4">
                                                                                    <div class="fast__group">
                                                                                        <div class="jq-selectbox jqselect">
                                                                                            <select name="cat" class="category form-select" data-placeholder="{{trans('index.filter_category')}}">
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
                                                                                            <select name="size" class="form-select" data-placeholder="{{trans('index.filter_size')}}">
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
                                            <section class="elementor-element elementor-element-153200c6 elementor-section-content-middle elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_top:waves,shape_divider_bottom:waves,shape_divider_bottom_negative:yes}" data-element_type="section">
                                                <div class="elementor-background-overlay"></div>
                                                <div class="elementor-shape elementor-shape-top" data-negative="false">
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
                                                <div class="elementor-container elementor-column-gap-no">
                                                    <div class="elementor-row">

                                                        <div class="container">
                                                                <div class="heading condition__head">
                                                                    <span class="condition__head-dist">{{ trans('index.kennel_title')}}</span>
                                                                </div>
                                                                <div class="heading_line_w"></div>
                                                                <div class="condition__desc">
                                                                    {{ trans('index.kennel_desc')}}
                                                                </div>
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
                                                                                    <input id="tel" name="form_text_7" required="" class="modal-form__control form-valid__control" data-valid="{{trans('index.modal-form_control')}}" value="" placeholder="{{trans('index.modal-form_tel')}}" type="text">
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
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-element elementor-element-34c1c606 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-no">
                                                    <div class="elementor-row">
                                                        <div class="formula__inner">
                                                            <div class="heading">{{trans('index.skils_header')}}</div>
                                                            <div class="heading_line"></div>
                                                            <div class="formula__subhead">{{trans('index.desc_header_skils')}}</div>
                                                            <div class="formula__desc">
                                                                {{trans('index.desc_skils')}}
                                                            </div>
                                                            <div class="formula__main">
                                                                <div class="formula-advant">
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_teeth">
                                                                                <div class="formula-advant__head">{{trans('index.item_teeth')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.teeth_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_leather">
                                                                                <div class="formula-advant__head">{{trans('index.item_leather')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.leather_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_bone">
                                                                                <div class="formula-advant__head">{{trans('index.item_bone')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.bone_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_digestion">
                                                                                <div class="formula-advant__head">{{trans('index.item_digestion')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.digestion_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_immunity">
                                                                                <div class="formula-advant__head">{{trans('index.item_immunity')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.immunity_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_muscle">
                                                                                <div class="formula-advant__head">{{trans('index.item_muscle')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.muscle_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_ingredient">
                                                                                <div class="formula-advant__head">{{trans('index.item_ingredient')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.ingredient_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                        <div class="col-md-3 col-sm-6">
                                                                            <div class="formula-advant__item formula-advant__item_germany">
                                                                                <div class="formula-advant__head">{{trans('index.item_germany')}}</div>
                                                                                <div class="formula-advant__desc">{{trans('index.germany_desc')}}</div>
                                                                            </div>
                                                                            <!-- /.formula-advant__item -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.formula-advant -->
                                                            </div>
                                                        </div>
                                                        <!-- /.formula__inner -->
                                                    </div>
                                                </div>
                                            </section>
                                            <section class="elementor-element elementor-element-dc4b6a7 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_top:waves,shape_divider_bottom:waves}" data-element_type="section">
                                                <div class="elementor-background-overlay"></div>
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
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <div class="container">
                                                                <div class="heading form-ask__heading">{{trans('index.question_header')}}</div>
                                                                <div class="heading_line_w"></div>
                                                            <form name="SIMPLE_FORM_1" action="" id="comment_form"
                                                                  method="POST" enctype="multipart/form-data">

                                                                <div class="elementor-row">
                                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                                        <div class="form-ask__group">
                                                                            <input id="name_q" name="form_text_1"
                                                                                   value="" type="text"
                                                                                   class="form-ask__control" required
                                                                                   placeholder="{{trans('index.question_name')}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                                        <div class="form-ask__group">
                                                                            <input id="tel_q" name="form_text_2"
                                                                                   value="" type="text"
                                                                                   class="form-ask__control"
                                                                                   placeholder="{{trans('index.question_tel')}}{{trans('index.question_zvezda')}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-sm-12">
                                                                        <div class="form-ask__group">
                                                                            <div class="or_form">{{trans('index.question_or')}}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                                                        <div class="form-ask__group">
                                                                            <input id="email_q" name="form_text_2"
                                                                                   value="" type="text"
                                                                                   class="form-ask__control"
                                                                                   placeholder="{{trans('index.question_email')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-ask__group">
                                                                            <textarea id="comment"
                                                                                      class="form-ask__control form-ask__control_textarea"
                                                                                      name="form_text_3" required=""
                                                                                      placeholder="{{trans('index.question_text')}}"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div><p class="info_form col-md-12"><strong>*
                                                                        - {{trans('index.question_info_form')}}</strong>
                                                                </p>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                                        <div class="form-ask__group form-ask__group_btn">
                                                                            <button type="submit"
                                                                                    name="_web_form_submit"
                                                                                    class="btn form-ask__btn">{{trans('index.question_submit')}}</button>
                                                                        </div>
                                                                    </div>

                                                            </form>

                                                        </div>
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
                                            </section>
                                            <section class="elementor-element elementor-element-news elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <div class="container">
                                                            <div class="col-lg-12">
                                                                <div class="elementor-row">
                                                                    <div class="col-lg-6" data-element_type="column">
                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-widget-heading">
                                                                                    <div class="elementor-widget-container">
                                                                                        <h2 class="heading">{{$post->name}}</h2>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-widget-text-editor">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="elementor-text-editor elementor-clearfix">
                                                                                            <p>{{$post->prev_desc}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-align-left elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                                                     data-element_type="button.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="elementor-button-wrapper text-center">
                                                                                            <a href="{{ route('post',$post->url) }}"
                                                                                               class="elementor-button-link btn_a"
                                                                                               role="button">
                                                                                                {{trans('products.more')}}
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-widget elementor-widget-image">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="elementor-image">
                                                                                            <img width="370"
                                                                                                 height="370"
                                                                                                 title="{{$post->name}}"
                                                                                                 alt="{{$post->name}}"
                                                                                                 class="img-fluid center attachment-full size-full"
                                                                                                 src="{{ $post->images }}">
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
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                    </main>
                    <!-- #main -->
                </div>

            </div>
            <!-- ast-container -->
        </div>
        <!-- #content -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
            <script>
                $(document).ready(function () {
                    var ind_rotator = 0;
                    var imgArr = <?php echo $slider;?>;
                    var preloadArr = [];
                    //слайдер на главной
                    for (key in imgArr) {
                        for(f in imgArr[key]){
                            preloadArr[imgArr[key][f].index] = new Image();
                            preloadArr[imgArr[key][f].index].src = imgArr[key][f].img;
                            preloadArr[imgArr[key][f].index].prev_text = imgArr[key][f].prev_text;
                            preloadArr[imgArr[key][f].index].text = imgArr[key][f].text;
                        }
                    }

                    preloadArr.reverse();
                    var intID = setInterval(changeImg, 8000);
                    /* image rotator */
                    //console.log(ind_rotator);
                    function changeImg(){
                        if (ind_rotator == preloadArr.length){
                            ind_rotator = 0;
                        }
                        if (ind_rotator > preloadArr.length){
                            ind_rotator = preloadArr.length;
                        }
                        //console.log(ind_rotator);
                        $('#slide').animate({opacity: 0.6}, 700, function(){
                            $('#slide').css('background','url(' + preloadArr[ind_rotator].src +') center center no-repeat');
                            $('#slide').css('background-size','cover');
                            $('.title_home').html(preloadArr[ind_rotator].prev_text);
                            $('.title_home').css('color','#ffff');
                            $('.h4_home').html(preloadArr[ind_rotator].text);
                            ind_rotator++;
                        }).animate({opacity: 1}, 700);
                    }

                    var device = navigator.userAgent.toLowerCase();
                    var mob = device.match(/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/);
                    if (mob) {
                        $("#slide").removeClass("bg-fixed");
                    }

                    //стрелка вверх
                    $("#back-top").hide();
                    $(function () {
                        $(window).scroll(function () {
                            if ($(this).scrollTop() > 300) {
                                $('#back-top').fadeIn();
                            } else {
                                $('#back-top').fadeOut();
                            }
                        });
                        $('#back-top a').click(function () {
                            $('body,html').animate({
                                scrollTop: 0
                            }, 900);
                            return false;
                        });
                    });

                    //стилизация селекта
                    $('.form-select').styler({
                        selectPlaceholder: 'Select...',
                    });
                });

                function ShowAlert($text){
                    $(".modal").modal("hide");
                    $("#alert .modal-body").html($text);
                    $("#alert").modal("show");
                }

                $('.modal').on('show.bs.modal', function(e) {
                    e.preventDefault();
                    $("#pitomnik").submit(function(e) {
                        e.preventDefault();
                        var name = $("#name").val();
                        var tel = $("#tel").val();

                        $.ajax({
                            type: "POST",
                            url: 'send',
                            data: {
                                "name": name,
                                "tel": tel,
                                "type_form": 1,
                                "_token": $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                console.log(response);
                                ShowAlert(response);
                            }
                        });
                    });
                });

                $("#comment_form").submit(function(e){
                    var inputs = document.querySelectorAll('.form-ask__control'), result, i;
                    for(i = 0; i < inputs.length; i++) {
                        if(inputs[i].id == "tel_q" || inputs[i].id == "email_q"){
                            if(inputs[i].value) {
                                result = true;
                                break;
                            }
                        }
                    }
                    if(!result) {
                        e.preventDefault();
                        ShowAlert($('<div>{{trans('index.question_msg')}}</div>').text());
                    }else{
                        e.preventDefault();
                        var name = $("#name_q").val();
                        var tel = $("#tel_q").val();
                        var email = $("#email_q").val();
                        var comment = $("#comment").val();
                        $.ajax({
                            type: 'POST',
                            url: 'send',
                            data: {
                                "name": name,
                                "tel": tel,
                                "email": email,
                                "type_form": 2,
                                "comment": comment,
                                "_token": $('meta[name="csrf-token"]').attr('content')},
                            success: function(response){
                                console.log(response);
                                ShowAlert(response);
                            }
                        });
                    }
                });
            </script>

@endif
</div>
<!-- #page -->
    <footer itemtype="https://schema.org/WPFooter" itemscope="itemscope" id="colophon" class="site-footer" role="contentinfo">
        <div class="astra-advanced-hook-65">
            <div class="elementor elementor-65">
                <div class="elementor-inner">
                    <div class="elementor-section-wrap">
                        <section data-id="126e140" class="elementor-element elementor-element-126e140 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_top:waves}" data-element_type="section">
                            <div class="elementor-background-overlay"></div>
                            <div class="elementor-shape elementor-shape-top" data-negative="false">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                                    <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                              c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                              c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                                </svg>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="ast-small-footer footer-sml-layout-2">
            <div class="ast-footer-overlay">
                <div class="ast-container">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="col-lg-2 col-md-3 col-xs-4 col-sm-12"><img width="150" src="{{asset('/images/logo_w.svg')}}"></div>
                            <div class="col-lg-2 col-md-3 col-xs-4 col-sm-12 tel_footer">
                                <span>+38 067 6 907 177</span>
                                <span>+38 050 1 907 177</span>
                            </div>
                            <div class="col-lg-5 col-md-3 col-xs-4 col-sm-12 block_footer"><p>{{trans('index.all_rights')}}</p></div>
                            <div class="col-lg-2 col-md-3 col-xs-4 col-sm-12 block_footer">
                                <a target="_blank" href="https://www.facebook.com/chicopee.ua" class="sticky-custom-logo foot-social__btn" itemprop="url">
                                    <img src="{{ asset('/images/fb.svg') }}" class="img-fluid center" alt="">
                                </a>
                                <a target="_blank" href="https://www.instagram.com/chicopee.ua/" class="sticky-custom-logo foot-social__btn" itemprop="url">
                                    <img src="{{ asset('/images/insta.svg') }}" class="img-fluid center" alt="">
                                </a></div>
                        </div>
                        <!-- .ast-row.ast-flex -->
                    </div>
                    <!-- .ast-small-footer-wrap -->
                </div>
                <!-- .ast-container -->
            </div>
            <!-- .ast-footer-overlay -->
        </div>
        <!-- .ast-small-footer-->
    </footer>
    <!-- #colophon -->

<p id="back-top"><a href="#top"><span></span></a></p>

@if(request()->is('/') != '/')
    <script>
        $(document).ready(function () {
            //стрелка вверх
            $("#back-top").hide();
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 300) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });
                $('#back-top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 700);
                    return false;
                });
            });
                    //TODO:test todo
            //меню
            $(function () {
                $(window).scroll(function(){
                    if($(this).scrollTop()>85){
                        $('#top_menu').css("position", "fixed");
                        $('.main-header-bar').addClass('fix_menu');
                        $('#top_menu svg').show();
                    }
                    else if ($(this).scrollTop()<85){
                        $('#top_menu').css("position", "relative");
                        $('.main-header-bar').removeClass('fix_menu');
                        $('#top_menu svg').hide();
                    }
                });
            });
        });
    </script>
@endif
</body>
</html>