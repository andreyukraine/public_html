@extends('layouts.app')
@section('content')
    <div class="container">


        <h3>Add slider</h3>

        <hr>

        {{--{{$validator->title}}--}}

        {!! Form::open(['route' => ['slider.store'], 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="text-right col-lg-2 col-lg-offset-10">
                <p class="activ_p ">Активность слайда: <input name="active" value="1" type="checkbox"></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col-lg-10">
                <label for="exampleFormControlInput1">Name</label>
                <input name="name" type="text" value="" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group col-lg-2">
                <label for="exampleFormControlInput1">Sort</label>
                <input name="sort" type="text" value="" class="form-control" id="exampleFormControlInput1">
            </div>
        </div>
        <hr>



        <div class="col-lg-8">

            <div class="form-group">
                <label for="exampleFormControlInput1">Prev desc</label>
                <textarea name="prev_desc" class="form-control" id="exampleFormControlTextarea3" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Desc</label>
                <textarea name="desc" class="form-control" id="exampleFormControlTextarea3" rows="5"></textarea>
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-success'])}}
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Images</label>
                <input name="file" id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection
