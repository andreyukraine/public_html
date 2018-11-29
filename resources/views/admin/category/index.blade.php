@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-11"><h4>Категории</h4></div>
            <div class="col-lg-1">
                <a href="{{ route('category.create') }}" class="btn btn-success" id="create_category" role="button">Create</a>
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
                <!-- will be used to show any messages -->
                <ul class="nav nav-list">

                    @foreach($categories as $category)
                        <div class="col-lg-11">
                            <label class="tree-toggler nav-header">
                                <span id="{{ $category->id }}">{{ $category->name }}</span>
                            </label>
                        </div>
                        <div class="col-lg-1">
                            <a href="{{ route('category.edit',$category->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('delete.category',$category->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>

                        @if(count($category->childs))
                            <li class="child">
                                @include('admin.category.subcat',['childs' => $category->childs])
                            </li>
                        @endif

                    @endforeach

                </ul>

            </div>
            <div class="col-lg-9"></div>
        </div>
    </div>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('label.tree-toggler').click(function () {
            $(this).parent().children('ul.tree').toggle(300);
        });
    });
</script>