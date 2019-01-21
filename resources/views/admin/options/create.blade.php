@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>Add options</h3>
        <hr>
        {!! Form::open(['route' => ['options.store'], 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-lg-8">
                <label class="radio-inline">
                    <input name="type" value="dir" type="radio">
                    Справочник
                </label>
                <label class="radio-inline">
                    <input name="type" value="dir_img"
                           type="radio">
                    Справочник с картинками
                </label>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-6 text-right">Sort</div>
                    <div class="col-lg-6"><input name="sort" type="text" class="form-control"></div>
                </div>
            </div>
        </div>
        <hr>

        {{--{{$validator->title}}--}}


        <div class="col-lg-8">
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>

            <div class="col-lg-12">{{Form::submit('Submit',['class'=>'btn btn-success'])}}</div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleFormControlInput2">Task Category</label>
                <select name="cat_id[]" multiple="multiple" class="form-control">
                    <option value="" selected="selected">-</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection