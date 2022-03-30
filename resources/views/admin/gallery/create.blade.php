@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>Add gallery</h3>

        <hr>

        {{--{{$validator->title}}--}}

        {!! Form::open(['route' => ['gallery.store'], 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="form-group col-lg-10">
                <label for="exampleFormControlInput1">Наименование</label>
                <input name="name" type="text" value="" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group col-lg-2">
                <label for="exampleFormControlInput1">Активность</label>
                <input name="active" value="1" type="checkbox">
            </div>
        </div>
        <hr>



        <div class="col-lg-8">
            {{Form::submit('Submit',['class'=>'btn btn-success'])}}
        </div>

        {!! Form::close() !!}

    </div>

@endsection
