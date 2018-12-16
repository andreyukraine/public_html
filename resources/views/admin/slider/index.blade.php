@extends('admin.layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Слайдеры</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('slider.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
            </div>
        </div>
        <hr>
        @foreach($sliders as $slider)
            <div class="row">
               <div class="col-lg-1">
                    @if($slider->active)
                        <span class="glyphicon glyphicon-eye-open text-success"></span>
                    @else
                        <span class="glyphicon glyphicon-eye-open"></span>
                    @endif
                    <b>&nbsp;{!! $slider->id !!}</b>
                </div>
                <div class="col-lg-10">
                    <p class="product_name">{!! $slider->name !!}</p>
                </div>
                <div class="col-lg-1">
                    <a href="{{ route('slider.edit',$slider->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ route('delete.slider',$slider->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
