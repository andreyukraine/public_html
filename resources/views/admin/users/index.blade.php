@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Users</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success" id="create_task" role="button">Create</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                 <div class="table-responsive">
                    <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Data create</th>
                </tr>
        @foreach($users as $user)
                    <tr>
                        <td>{!! $user->id !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->role !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->created_at !!}</td>
                        {{--<td>--}}
                            {{--<a href="{!! route('tasks.show',$task->id) !!}"><span class="glyphicon glyphicon-eye-open"></span></a>--}}
                            {{--<a href="{{ route('tasks.edit',$task->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>--}}
                            {{--<a href = 'delete/{{ $task->id }}'><span class="glyphicon glyphicon-remove"></span></a>--}}
                        {{--</td>--}}
                    </tr>
        @endforeach
            </table>
                 </div>
    </div>
            </div>
        </div>
@endsection