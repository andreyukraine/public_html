@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h4>Блог</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('blog.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
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
            <div class="col-lg-12">
                @foreach($posts as $post)
                    <div class="col-lg-1">
                        {{ $post->id }}
                    </div>
                    <div class="col-lg-2">
                        <img width="100px" src="{!! $post->images !!}">
                    </div>
                    <div class="col-lg-8">
                        <label class="tree-toggler nav-header">
                            <span id="{{ $post->id }}">{{ $post->name }}</span>
                        </label>
                    </div>
                    <div class="col-lg-1">
                        <a href="{{ route('blog.edit',$post->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                        {{--<a href="{{ route('delete.category',$post->id) }}"><span class="glyphicon glyphicon-remove"></span></a>--}}
                    </div>
                @endforeach
            </div>
            <div class="col-lg-9"></div>
        </div>
    </div>
@endsection