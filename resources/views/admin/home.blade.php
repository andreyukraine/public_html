@extends('admin.layouts.app')

@section('content')
    <div class="container">


            <h3>Admin panel</h3>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>

    </div>
@endsection
