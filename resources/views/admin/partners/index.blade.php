@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Партнеры</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('partners.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="cat col-lg-2">
                {{--@foreach($categories as $category)--}}
                    {{--<div>--}}
                        {{--<label class="tree-toggler nav-header">--}}
                            {{--<span id="{{ $category->id }}">{{ $category->name }}</span>--}}
                        {{--</label>--}}
                        {{--@if(count($category->childs))--}}
                            {{--@include('admin.category.subcat_task',['childs' => $category->childs])--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
            <div class="product_list col-lg-10">
                @foreach($partners as $partner)
                    <div class="row">
                        <div class="col-lg-2">
                            @if($partner->image)
                                <img width="100px" src="{!! $partner->images !!}">
                            @else
                                <img width="100px" src="{{asset('/admin/images/no_image.svg')}}">
                            @endif
                        </div>
                        <div class="col-lg-7">
                            <a href="{{ route('products.edit',$partner->id) }}"><p class="product_name">{!! $partner->name !!}</p></a>
                        </div>
                        <div class="col-lg-1">
                            <p class="product_sort">{!! $partner->sort !!}</p>
                        </div>
                        <div class="col-lg-1">
                            <a href="{{ route('products.edit',$partner->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('delete.products',$partner->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
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