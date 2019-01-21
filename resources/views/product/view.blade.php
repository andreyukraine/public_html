@extends('site.content.home')
@section('url', route('products_show', ['category'=>'sobaki','url'=>$product->url] ))
@section('title', e($product->title))
@section('description', e($product->desc))
@section('meta', e($product->meta))
@section('keywords', e($product->keywords))
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
                <p>{{ Breadcrumbs::render('product', $product) }}</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="product_title elementor-heading-title elementor-size-default"><h1>{!! $product->name !!}</h1></div>
        </div>
        <div class="row item_block">


            <div class="imgs @if(!$product->active) active_item_{!! App::getLocale() !!} @endif col-lg-5 col-md-5">
                <img class="img-fluid center" src="{!! $product->images !!}" title="{{$product->name}}" alt="{{$product->name}}">

                @foreach($files as $file)
                    @if($file)
                        <img id="myImg" src="{!! $file->url !!}" title="{{$product->name}}" alt="{{$product->name}}">
                    @endif
                @endforeach

                <!-- The Modal Image-->
                <div class="modal modal_bid" id="modal-bid">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button class="modal-close" data-dismiss="modal"></button>
                            <div class="modal-body">
                                <div class="modal-form">
                                    <img class="modal-content_view" id="img01">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
            <div class="item_opt col-lg-6 col-md-6">
                {{--<img src="{{asset('images/divider.png')}}" class="divider attachment-full size-full">--}}

                @foreach($options as $opt)
                    <div class="opt_row_view">
                        @if($opt[0]['view_opt'])
                            <?php $array_opt = array();?>
                            @if($opt[0]['type_opt'] == "dir_img")
                                <div class="block_opt_img">
                                    <span class="opt_name_view_img">{!! $opt[0]['name_opt'] !!}:</span>
                                    @foreach($opt[0]['value_opt'] as $key => $value)
                                        @if($value->select_id > 0)
                                        <?php
                                        $value_lang = "name_".App::getLocale();
                                        ?>
                                            <div class="opt_bl">
                                                <img class="img-fluid center" width="50px" src="{{$value->images}}">
                                                <span>{!! $value->$value_lang !!}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                    <p>{!! $product->prev_desc !!}</p>
                                    <div class="product_line"></div>
                            @else
                                @if($opt[0]['id_opt'] == 7)
                                    <span class="opt_name_view">{!! $opt[0]['name_opt'] !!}:</span>
                                    @foreach($opt[0]['value_opt'] as $key => $value)
                                        @if($value->select_id > 0)
                                            <?php
                                                $value_lang = "name_".App::getLocale();
                                                $array_opt[] = array(
                                                    'value' => $value->$value_lang,
                                                    'price' => $value->price,
                                                    'sku' => $value->sku,
                                                    'barcode' => $value->barcode
                                                );
                                            ?>
                                        @endif
                                    @endforeach
                                    <div class="options">
                                        <div class="options-grid grid-cols-3">
                                            @foreach($array_opt as $i)
                                                <div class="option-column">
                                                    <label class="option" for="ProductOptionID0">
                                                        <span class="product-pack type-bag tag-full">
                                                            <span class="pack-inner">
                                                                <span>{!! $i['value'] !!}</span>
                                                            </span>
                                                        </span>
                                                        <span class="custom-radio check-lg">
                                                            <input type="radio" id="ProductOptionID0" name="ProductOptionID" value="177" data-stockstatus="2" data-stocklevel="310" data-sizename="2.5kg">
                                                            <span class="check">арт. {!! $i['sku'] !!}</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                    {{--<div class="col-lg-3"> {!! $i['price'] !!} </div>--}}
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <span class="opt_name_view">{!! $opt[0]['name_opt'] !!}:</span>
                                    @foreach($opt[0]['value_opt'] as $key => $value)
                                        @if($value->select_id > 0)
                                        <?php
                                        $value_lang = "name_".App::getLocale();
                                        $array_opt[] = array(
                                            'value' => $value->$value_lang,
                                            'price' => $value->price,
                                            'sku' => $value->sku,
                                            'barcode' => $value->barcode
                                        );
                                        ?>
                                        @endif
                                    @endforeach

                                    @foreach($array_opt as $i)
                                        @if ($loop->last)
                                            {!! $i['value'] !!}
                                        @else
                                            {!! $i['value'] !!};
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        @endif
                    </div>
                @endforeach
                <div class="product_line"></div>
                <div class="text-center">
                <a href="{{ url(App\Http\Middleware\Locale::getLocale() .'/shops') }}" class="elementor-button-link btn_a" role="button">
                    {{trans('menu.buy')}}
                </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-o" role="tab" aria-controls="nav-home" aria-selected="true">{{trans('products.description')}}</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-s" role="tab" aria-controls="nav-profile" aria-selected="false">{{trans('products.compound')}}</a>
                    <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-r" role="tab" aria-controls="nav-contact" aria-selected="false">{{trans('products.shops')}}</a> -->
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-k" role="tab" aria-controls="nav-contact" aria-selected="false">{{trans('products.norms')}}</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-o" role="tabpanel" aria-labelledby="nav-home-tab">{!! $product->desc !!}</div>
                <div class="tab-pane fade" id="nav-s" role="tabpanel" aria-labelledby="nav-profile-tab">{!! $product->composition !!}</div>
                <!-- <div class="tab-pane fade" id="nav-r" role="tabpanel" aria-labelledby="nav-profile-tab">@include('partners.product')</div> -->
                <div class="tab-pane fade" id="nav-k" role="tabpanel" aria-labelledby="nav-contact-tab"><div class="block_tabl">{!! $product->dose !!}</div></div>
            </div>
        </div>
    </div>
    </div>
@endsection


