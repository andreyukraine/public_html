@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>View task # - {{$task->id}}</h3>

        <hr>

        {!! Form::open(['route' => ['user.panel'], 'method'=>'GET']) !!}
        <div class="form-group">
            <label for="exampleFormControlInput2">Task Title</label>
            <input name="title" type="text" class="form-control" id="task_title" value="{{$task->task_manager}}" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Task Manager</label>
            <input name="task_manager" type="text" class="form-control" id="task_manager" value="{{$task->task_manager}}" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Task Description</label>
            <textarea name="task_description" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{$task->descriptions}}</textarea>
        </div>
        {{Form::submit('OK',['class'=>'btn btn-success'])}}
        {!! Form::close() !!}


    </div>
@endsection