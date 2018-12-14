@extends('layouts.app')
@section('content')
    <div class="container">


        {!! Form::open(['route' => ['slider.update', $slider->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

            <div class="row">
                <div class="text-left col-lg-10">
                    <h3>Edit slide - {!! $slider->id !!}</h3>
                </div>
                <div class="text-right col-lg-2">
                    <p class="activ_p">Активность слайда: <input name="active" value="1" type="checkbox" @if($slider->active)checked="checked"@endif></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-lg-10">
                    <label for="exampleFormControlInput1">Name</label>
                    <input name="name" type="text" value="{{$slider->name}}" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group col-lg-2">
                    <label for="exampleFormControlInput1">Sort</label>
                    <input name="sort" type="text" value="{{$slider->sort}}" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <hr>

            <div class="col-lg-8">

                <div class="form-group">
                    <label for="exampleFormControlInput1">Prev desc</label>
                    <textarea name="prev_desc" class="form-control" id="exampleFormControlTextarea3" rows="3">{{$slider->prev_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Desc</label>
                    <textarea name="desc" class="form-control" id="exampleFormControlTextarea3" rows="5">{{$slider->desc}}</textarea>
                </div>
                {{Form::submit('Submit',['class'=>'btn btn-success'])}}
            </div>
            <div class="col-lg-4">
                <label for="exampleFormControlInput2">Картинка</label>
                @if($slider->images)
                    <img class="img-responsive center" src="{!! $slider->images !!}">
                @else
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Images</label>
                        <input name="file" id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
                    </div>
                @endif
            </div>
        {!! Form::close() !!}
    </div>
@endsection
{{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}

            {{--$('.add_opt').click(function () {--}}

            {{--var option_id = $(this).attr("id");--}}
            {{--var div = $(this).parents().parents();--}}
            {{--var value_input = div.find(".value_name").val();--}}
            {{--//console.log(option_id);--}}

            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
            {{--$.ajax({--}}
                {{--url: 'http://localhost/admin/add_value',--}}
                {{--type: 'POST',--}}
                {{--data: {--}}
                    {{--_token: CSRF_TOKEN,--}}
                    {{--id:option_id,--}}
                    {{--name:value_input--}}
                {{--},--}}
                {{--success: function (data) {--}}
                    {{--//console.log(data);--}}
                    {{--$('.options_list').html(data);--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}

        {{--$('.del_opt').click(function () {--}}

            {{--var option_id = $(this).attr("data-opt");--}}
            {{--var value_id = $(this).attr("id");--}}
            {{--//console.log(option_id);--}}

            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
            {{--$.ajax({--}}
                {{--url: 'http://localhost/admin/del_value',--}}
                {{--type: 'POST',--}}
                {{--data: {--}}
                    {{--_token: CSRF_TOKEN,--}}
                    {{--id:option_id,--}}
                    {{--value:value_id--}}
                {{--},--}}
                {{--success: function (data) {--}}
                    {{--//console.log(data);--}}
                    {{--$('.options_list').html(data);--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
    {{--})--}}

{{--</script>--}}