@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>Add task</h3>

        <hr>

        {{--{{$validator->title}}--}}

        {!! Form::open(array('route' => 'tasks.store')) !!}

        <div class="form-group">
            <label for="exampleFormControlInput1">Task Title</label>
            <input name="title" type="text" value="" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Task Status</label>
            <input name="status" type="text" value="open"  class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Task Manager</label>
            <input name="task_manager" type="text" class="form-control" id="exampleFormControlInput2">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Task Categoryr</label>
            <select name="cat_id[]" multiple="multiple" class="form-control">
                <option value="" selected="selected">-</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Task Description</label>
            <textarea name="task_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        {{Form::submit('Submit',['class'=>'btn btn-success'])}}

        {!! Form::close() !!}


    </div>
@endsection