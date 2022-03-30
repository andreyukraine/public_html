@extends('admin.layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Галереи</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('gallery.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
            </div>
        </div>
        <hr>
        @foreach($gallery as $item)
            <div class="row">
               <div class="col-lg-1">
                    @if($item->active)
                        <span class="glyphicon glyphicon-eye-open text-success"></span>
                    @else
                        <span class="glyphicon glyphicon-eye-open"></span>
                    @endif
                    <b>&nbsp;{!! $item->id !!}</b>
                </div>
                <div class="col-lg-10">
                    <p class="product_name">{!! $item->name !!}</p>
                </div>
                <div class="panel_my col-lg-1">
                    <a href="{{ route('gallery.edit',$item->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ route('delete.gallery',$item->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
