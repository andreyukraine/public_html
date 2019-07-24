@extends('site.content.home')
@section('url', route('category_url', ['category'=>$category->url] ))
@section('title', e($category->title))
@section('description', e($category->description))
@section('meta', e($category->meta))
@section('keywords', e($category->keywords))
@section('header')
    <div id="content" class="site-content">
        <div class="ast-container">
            <div id="primary" class="content-area primary">
                <main id="main" class="site-main" role="main">
                    <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" class="post-5 page type-page status-publish ast-article-single">
                        <div class="entry-content clear" itemprop="text">
                            <div class="elementor elementor-5">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <section class="elementor-element elementor-element-title_post elementor-section-content-bottom elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_bottom:waves}" data-element_type="section">
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
                <p>{{ Breadcrumbs::render('category', $category) }}</p>
            </div>
        </div>
        <div class="h_content">
            <div class="heading">{{ trans('catalog.header_catalog')}} {{$category->name}}</div>
        </div>
        <div class="product_list">
            @if(empty($products))
                <div class="col-lg-12"><div class="not_products">{{trans('index.not_products')}}</div></div>
            @else
                @foreach($products as $key => $line)
                    <div class="line_block col-lg-12 col-md-12 text-center">
                        @if($key == 'Holistic Nature Line')
                            <img class="line_key" alt="$key" title="$key" src="{{asset('images/cb_select_hnl.png')}}">
                            <div class="l_d"></div>
                        @elseif($key == 'Classic Nature Line')
                            <img class="line_key" alt="$key" title="$key" src="{{asset('images/cb_select_cnl.png')}}">
                            <div class="l_d"></div>
                        @elseif($key == 'Pro Nature Line')
                            <img class="line_key" alt="$key" title="$key" src="{{asset('images/cb_select_pnl.png')}}">
                            <div class="l_d"></div>
                        @elseif($key == 'Titan Line')
                            <img class="line_key" alt="$key" title="$key" src="{{asset('images/cb_select_titan.png')}}">
                            <div class="l_d"></div>
                        @endif
                    </div>
                    @foreach($line as $product)
                        @if(!$product->view)
                        <div class="item_list @if(!$product->active) active_item_{!! App::getLocale() !!} @endif col-lg-3 col-md-4">
                            <?php
                            $name = str_replace(' ', '_',$product->name);
                            //echo mb_strtolower($name);
                            ?>
                            <a href="{!! route('products_show', ['category'=>'sobaki','url'=>$product->url] ) !!}">
                                <div class="product_item">
                                    <img class="img-fluid center" alt="{!! $product->name !!}" src="{!! $product->images !!}">
                                    <p class="product_name">{!! $product->name !!}</p>
                                    <div class="product_desc">{!! $product->excerpt !!}</div>
                                    <div class="product-item__more">
                                        <a href="{!! route('products_show', ['category'=>'sobaki','url'=>$product->url] ) !!}" class="product-item__more-link">{{ trans('products.more')}}</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
@endsection