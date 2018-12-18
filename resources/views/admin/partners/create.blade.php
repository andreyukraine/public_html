@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <h3>Add partner</h3>
        {!! Form::open(['route' => ['partners.store'], 'enctype'=>'multipart/form-data']) !!}
        <hr>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-11">
                    <label for="exampleFormControlInput1">Имя</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="col-lg-1">
                    <label for="exampleFormControlInput1">Тип</label>
                    <select name="type" class="form-control" id="exampleFormControlInput1">
                        <option value="I" id="">I</option>
                        <option value="T" id="">T</option>
                    </select>
                </div>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="6-tab" data-toggle="tab" href="#info" role="tab" aria-controls="nav-info" aria-selected="true">Информация</a>
            </div>
            <div class="tab-content" id="myTabContent">
                {{--вкладка информация--}}
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="6-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Адрес</label>
                                <input name="addres" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">URL</label>
                                <input name="url" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Картинка</label>
                                <input name="file" id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <div class="col-lg-12"> {{Form::submit('Submit',['class'=>'btn btn-success'])}}</div>
        {!! Form::close() !!}

    </div>

@endsection

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dow_file').click(function () {
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