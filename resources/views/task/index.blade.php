@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h4>Tasks panel</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('tasks.create') }}" class="btn btn-success" id="create_task" role="button">Create</a>
            </div>
        </div>
    <hr>
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-list">
                    @foreach($categories as $category)
                        <li>
                            <label class="tree-toggler nav-header"><span id="{{ $category->id }}"><h4>{{ $category->name }}</h4></span><div class="select"></div></label>
                            @if(count($category->childs))
                                @include('admin.category.subcat_task',['childs' => $category->childs])
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-9">
                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="ajax_data row">
                    <div class="col-lg-12">

                        <form method="get" action="">
                            <div class="row">
                                <div class="col-lg-5">
                                        <input name="search" type="text" value="{{$search}}" placeholder="search title" class="form-control">
                                </div>
                                <div class="col-lg-3">
                                        <select name="status" class="form-control">
                                            <option value="" selected="selected">select status</option>
                                            @if($status == "open")
                                                <option value="open" selected="selected">open</option>
                                                <option value="close">close</option>
                                            @elseif($status == "close")
                                                <option value="open">open</option>
                                                <option value="close" selected="selected">close</option>
                                            @else
                                                <option value="open">open</option>
                                                <option value="close">close</option>
                                            @endif
                                        </select>
                                </div>
                                @if(Auth::user()->role == 1)
                                <div class="col-lg-3">
                                    <select name="user" class="form-control">
                                        <option value="">-</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->name}}">{{$user->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="col-lg-1 text-right">
                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                <table id="tr" class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Task manager</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>User task</th>
                    <th>Data added</th>
                    <th>Actions</th>
                </tr>
                </table>
                    <div class="loader"></div>
                    <table id="task" class="table table-bordered">
                        @foreach($tasks as $task)
                            <tr class="task_row">
                                <td>{!! $task->id !!}</td>
                                <td>{!! $task->title !!}</td>
                                <td>{!! $task->task_manager !!}</td>
                                <td>{!! $task->descriptions !!}</td>
                                <td>{!! $task->status !!}</td>
                                <td>{!! $task->user_task !!}</td>
                                <td>{{ $task->created_at->format('d-m-Y H:i') }}</td>
                                <td>
                                    <a href="{!! route('tasks.show',$task->id) !!}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="{{ route('tasks.edit',$task->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('delete.task',$task->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('span').click(function () {
            $('#task').hide();
            $('.loader').show(); // show a spinner
            console.log(this.id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                /* the route pointing to the post function */
                url: 'ajax',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, id:this.id},

                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    console.log(data);
                    //$(".writeinfo").append(data.id);
                    $('#task').show();
                    $('#task tbody').html(data);
                    $('.loader').hide();

                }
            });
        });

        $('label.tree-toggler').dblclick(function () {
            $(this).parent().children('ul.child_ul').toggle(300);

        });
    });
</script>