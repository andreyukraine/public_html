@extends('admin.layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Инструменты</h4>
            </div>
        </div>
        <hr>
        <div class="container">
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                @endif

            {!! Session::forget('success') !!}{!! Session::forget('error') !!}
            <br />
            <form action="{{ URL::to('admin/import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input class="col-lg-4" type="file" name="import_file" />
                <button class="btn btn-primary">Import File</button>
            </form>
        </div>
    </div>
@endsection
