@extends('site.content.home')
@section('title', 'Блог CHICOPEE')
@section('description', 'CHICOPEE - марка кормов супер-премиум класса для собак и кошек, которая принадлежит канадской корпорации «strong> Harrison Pet Products Inc')
@section('meta', 'CHICOPEE - марка кормов супер-премиум класса для собак и кошек, которая принадлежит канадской корпорации «strong> Harrison Pet Products Inc')
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
                                        <section data-id="3796d0e6" class="elementor-element elementor-element-title_post elementor-section-content-bottom elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_bottom:waves}" data-element_type="section">
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
                                                    <div data-id="75f8b4ef" class="elementor-element elementor-element-75f8b4ef elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div data-id="38905c3d" class="elementor-element elementor-element-38905c3d elementor-widget elementor-widget-heading" data-element_type="heading.default">
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
                <p></p>
            </div>
        </div>
        <br>
        <div class="title_page heading">Генерация файла для партнеров</div>

    </div>
    <br><br>
    <div class="container">


        <?php
        $name = 'name_'.App::getLocale();
        ?>
        <div class="row">
            <div class="col-lg-7">
                <div class="fast__group">
                    <div class="jq-selectbox jqselect form-select fast__select-control">
                        <select name="cat" id="cat" class="form-select" data-placeholder="{{trans('index.filter_category')}}">
                            <option style="display: none"></option>
                            <option value="">{{trans('index.filter_all')}}</option>
                            @foreach($categorys as $category)
                                <option value="{{$category->id}}">{!! $category->{$name}!!}</option>
                            @endforeach
                        </select>
                        <div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="fast__group">
                    <div class="jq-selectbox jqselect form-select fast__select-control">
                        <select name="loc" id="loc"  class="form-select" data-placeholder="{{trans('index.filter_category')}}">
                             @foreach($locales as $local)
                                <option value="{{$local}}">{{$local}}</option>
                             @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
            <br>
            <br>
        <div class="row">
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-5">
                <div class="pull_file">{{trans('index.export')}} <a href="/efile.xlsx" download>{{trans('index.file_link')}}</a></div>
                <div id="proces"></div>
            </div>
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-4">
                <div id="send" class="btn btn-success" role="button">{{trans('index.question_submit')}}</div>
            </div>
            <div class="col-lg-1">&nbsp;</div>
        </div>
            <br>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        //стилизация селекта
        $('.form-select').styler({
            selectPlaceholder: 'Select...',
        });

        $(document).on('click', "#send", function () {

            var s_e = document.getElementById("cat");
            var cat = s_e.options[s_e.selectedIndex].value;

            var l_e = document.getElementById("loc");
            var loc = l_e.options[l_e.selectedIndex].text;

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            //alert(cat);
            //alert(loc);


            $.ajax({
                /* the route pointing to the post function */
                url: 'file',
                type: 'POST',
                beforeSend: function() {
                    $('#proces').show();
                    $('#proces').addClass('modal-loading');
                },
                complete: function() {
                    $('#proces').hide();
                    $('.pull_file').show();
                },
                data: {
                    _token: CSRF_TOKEN,
                    loc: loc,
                    id: cat
                },
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    console.log(data);
                }
            });
        });


    });

</script>