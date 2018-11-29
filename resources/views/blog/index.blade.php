
@extends('site.content.home')
@section('title', '')
@section('description', '')
@section('meta', '')
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
                <p>{{ Breadcrumbs::render('blog') }}</p>
            </div>
        </div>
        <div class="post_list row">
            @foreach($posts as $post)
                    <div class="col-lg-4">
                        <div class="img_block">
                            <img class="img-fluid center" src="{!! $post->images !!}">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <a href="{{ route('post',$post['url']) }}"><h1>{!! $post->name !!}</h1></a>
                        <br>
                        <p>{!! $post->prev_desc !!}</p>
                        <br>
                        <div class="elementor-element elementor-align-left elementor-mobile-align-center elementor-widget elementor-widget-button" data-element_type="button.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a href="{{ route('post',$post['url']) }}" class="elementor-button-link btn_a" role="button">
                                        {{trans('products.more')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection