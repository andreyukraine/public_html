@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>Update task # - {{$task->id}}</h3>

        <hr>

        {!! Form::open(['route' => ['tasks.update', $task->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
       <div class="row">
         <div class="col-lg-8">
            <div class="form-group">
                {!! Form::label('title', 'Task Title') !!}
                {!! Form::text('title',$task->title, ['class'=>"form-control"]) !!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Task Manager</label>
                <input name="task_manager" type="text" class="form-control" id="task_manager" value="{{$task->task_manager}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Task status</label>
                <select name="status" class="form-control">
                    @foreach($status as $s)
                        <option>{{$s->name}}</option>
                        @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Task Category</label>

                <select name="cat_id[]" multiple class="form-control">
                    @if(!isset($select_category))
                        <option selected="selected" value="1">-</option>
                    @else
                        <option value="1">-</option>
                    @endif
                    @foreach($categories as $category)
                            @if(isset($select_category))
                                <?php $select = 0;?>
                                @foreach($select_category as $sc)
                                    @if($category->id == $sc->id)
                                        <?php $select = $sc->id ?>
                                    @endif
                                @endforeach
                                @if($select != 0)
                                    <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Task Description</label>
                <textarea name="task_description" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$task->descriptions}}</textarea>
            </div>
            </div>
            <div class="col-lg-4">

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Task Files</label>
                    <input name="file" id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
                </div>
                <hr>
                @if(count($files) > 0)
                    @foreach($files as $file)
                        <div id="files">
                            <p><a href="{{$file->url}}" download>{{$file->name}}</a> <i id="dow_file" data-title="{{$file->id}}">x</i></p>
                        </div>
                    @endforeach
                @else
                    <p>нет файлов</p>
                @endif
            </div>
           <div class="col-lg-8">
               {{Form::submit('Submit',['class'=>'btn btn-success'])}}
           </div>
           <div class="col-lg-4"></div>
       </div>
        {!! Form::close() !!}


    </div>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('i#dow_file').click(function () {
            var i = $(this).attr('data-title');
            console.log(i);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'ajax_file',
                type: 'POST',
                data: {_token: CSRF_TOKEN, id:i},
                success: function (data) {
                    console.log(data);
                    $('#files p').html(data);
                }
            });
        })
    })

</script>