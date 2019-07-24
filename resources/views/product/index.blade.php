@extends('site.content.home')
@section('url', "/catalog")
@section('title', trans('catalog.header_title'))
@section('description', trans('catalog.header_desc'))
@section('meta', trans('catalog.header_title'))
@section('keywords','Чикопи, Чікопі, Chicopee, Корм Чикопи, корм Чікопі, корм для собак, корм для кошек, корм для котів, роял канін, Royal Canin, Пурина, Пуріна, Бріт, Брит, канадский корм, Питомники, корм для животных, корм премиум, корм суперпремиум, корм холистик, холістік, суперпреміум, супер преміум корм, преміум корм для собак, корм хилс, Hills, Pronature, 1st Choice, Josera, Acana, корм для щенков, сухой корм для собак, корм для собак оптом, корм для служебних собак, Купить корм Киев, купить корм Одесса, купить корм Харьков, Купить корм Днепр, купить корм Львов, корм 4 лапы, 4 лапи, Оптимил, Optimeal, ProPlan, Pro Plan, Зоотовари, Зоотовары, консервы для собак')
@section('header')
    <div id="content" class="site-content">
        <div class="ast-container">
            <div id="primary" class="content-area primary">
                <main id="main" class="site-main" role="main">
                    <article itemscope="itemscope" class="post-5 page type-page status-publish ast-article-single">
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
                <p>{{ Breadcrumbs::render('products', "") }}</p>
            </div>
        </div>
        <div class="h_content">
            <h1><div class="heading">{{ trans('catalog.header_catalog')}}</div></h1>
        </div>
        <div class="filter">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="filter-line filter-line_catalog clearfix">
                        @foreach($categories as $key => $category)
                            <span class="cat_style_{!! $category->id !!} @if($key == 0) active @endif" id="{!! $category->id !!}">{!! $category->name !!}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="product_list">
            @if(empty($products))
                <div class="col-lg-12"><div class="not_products">{{trans('index.not_products')}}</div></div>
            @else
                @foreach($products as $key => $line)
                    <div class="line_block col-lg-12 col-md-12 text-center">
                        @if($key == 'Holistic Nature Line')
                            <img class="line_key" alt="<?=$key?>" title="<?=$key;?>" src="{{asset('images/cb_select_hnl.png')}}">
                            <div class="l_d"></div>
                            @elseif($key == 'Classic Nature Line')
                            <img class="line_key" alt="<?=$key;?>" title="<?=$key;?>" src="{{asset('images/cb_select_cnl.png')}}">
                            <div class="l_d"></div>
                            @elseif($key == 'Pro Nature Line')
                            <img class="line_key" alt="<?=$key;?>" title="<?=$key;?>" src="{{asset('images/cb_select_pnl.png')}}">
                            <div class="l_d"></div>
                            @elseif($key == 'Titan Line')
                                <img class="line_key" alt="<?=$key;?>" title="<?=$key;?>" src="{{asset('images/cb_select_titan.png')}}">
                                <div class="l_d"></div>
                            @endif
                    </div>
                    @foreach($line as $product)
                        @if(!$product->view)
                            <div class="item_list @if(!$product->active) active_item_{!! App::getLocale() !!} @endif col-lg-3 col-md-4 col-sm-4">
                                <?php
                                $name = str_replace(' ', '_',$product->name);
                                //echo mb_strtolower($name);
                                ?>
                                <a href="{!! route('products_show', ['category'=>'sobaki','url'=>$product->url] ) !!}">
                                    <div class="product_item">
                                        <img class="img-fluid center" alt="{!! $product->name !!}" title="{!! $product->name !!}" src="{!! $product->images !!}">
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
