@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Настройки сайта</h4>
            </div>
        </div>
        <hr>
        {!! Form::open(['route' => ['admin.settings.store'],'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
        @foreach($settings as $key => $value)
            <div class="form-group">
            <label for="exampleFormControlInput1">{{$value->name}}</label>
                <input name="{{$value->name}}" type="text" value="{{$value->value}}" class="form-control" id="exampleFormControlInput3">
            </div>
            @endforeach
        {{--<div class="form-group">--}}
                {{--<label for="exampleFormControlInput1">Имя</label>--}}
                {{--<input name="site_name" type="text" value="{{$settings->title}}" class="form-control" id="exampleFormControlInput1">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
                {{--<label for="exampleFormControlInput1">Метатеги</label>--}}
                {{--<input name="meta" type="text" value="{{$settings->meta}}" class="form-control" id="exampleFormControlInput3">--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
                {{--<label for="exampleFormControlInput1">Ключевые слова</label>--}}
                {{--<input name="keywords" type="text" value="{{$settings->keywords}}" class="form-control" id="exampleFormControlInput3">--}}
        {{--</div>--}}

        {{Form::submit('Submit',['class'=>'btn btn-success'])}}

        {!! Form::close() !!}

    </div>
@endsection
