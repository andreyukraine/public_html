@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h4>Страницы сайта</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('pages.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
            </div>
        </div>

        <div class="row">
            @foreach($pages as $page)
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-1">
                        {{ $page->id }}
                    </div>
                    <div class="col-lg-10">
                        <p>{{ $page->name }}</p>
                    </div>
                    <div class="panel_my col-lg-1">
                        <a href="{{ route('pages.edit',$page->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="{{ route('delete.pages',$page->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection