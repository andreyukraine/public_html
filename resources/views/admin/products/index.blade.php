@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Товары</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('products.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="cat col-lg-2">
                @foreach($categories as $category)
                    <div>
                        <label class="tree-toggler nav-header">
                            <span id="{{ $category->id }}">{{ $category->name }}</span>
                        </label>
                        @if(count($category->childs))
                            @include('admin.category.subcat_task',['childs' => $category->childs])
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="product_list col-lg-10">
                @foreach($products as $product)
                    <div class="row">
                        <div class="col-lg-1">
                            @if($product->active)
                                <span class="glyphicon glyphicon-eye-open text-success"></span>
                            @else
                                <span class="glyphicon glyphicon-eye-open"></span>
                            @endif
                            <b>&nbsp;{!! $product->id !!}</b>
                        </div>
                        <div class="col-lg-2">
                            @if($product->images)
                                <img width="100px" src="{!! $product->images !!}">
                            @else
                                <img width="100px" src="{{asset('/admin/images/no_image.svg')}}">
                            @endif
                        </div>
                        <div class="col-lg-7">
                            <a href="{{ route('products.edit',$product->id) }}"><p class="product_name">{!! $product->name !!}</p></a>
                            <div class="product_desc">{!! $product->excerpt !!}</div>
                            <div class="options">
                                    <?php $name = 'name_'.App::getLocale(); ?>
                                    @foreach($product->options[2][0]['value_opt'] as $item)
                                        @if($item->select_id > 0)
                                            <p><?php print_r($item->sku); ?> &nbsp; - &nbsp; <?php print_r($item->$name) ?></p>
                                        @endif
                                    @endforeach
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <p class="product_sort">{!! $product->sort !!}</p>
                        </div>
                        <div class="col-lg-1">
                            <a href="{{ route('products.edit',$product->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('delete.products',$product->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('.cat span').click(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                /* the route pointing to the post function */
                url: 'ajax/products',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {
                    _token: CSRF_TOKEN,
                    id:this.id
                },
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    $('.product_list').html(data);
                }
            });
        });

    });
</script>