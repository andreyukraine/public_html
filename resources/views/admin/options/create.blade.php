@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>Add options</h3>

        <hr>

        {{--{{$validator->title}}--}}

        {!! Form::open(['route' => ['options.store'], 'enctype'=>'multipart/form-data']) !!}
        <div class="col-lg-8">
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Стравочник</label>
                    <input name="type" class="type" type="checkbox" id="exampleFormControlInput1">
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