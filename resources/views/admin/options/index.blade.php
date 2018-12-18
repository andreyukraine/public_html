@extends('admin.layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Свойства</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('options.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
            </div>
        </div>
        <hr>

        @foreach($options as $option)
            <div class="row">
                <div class="col-lg-1">
                    {!! $option->id !!}
                </div>
                <div class="col-lg-10">
                    <p class="product_name">{!! $option->name !!}</p>
                </div>
                <div class="panel_my col-lg-1">
                    <a href="{{ route('options.edit',$option->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ route('delete.option',$option->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>
        @endforeach

    </div>
@endsection