@extends('admin.layouts.app')
@section('content')
    <div class="container">


        {!! Form::open(['route' => ['gallery.update', $gallery->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

            <div class="row">
                <div class="text-left col-lg-9">
                    <h3>Редактирование гелереи - {!! $gallery->name !!}</h3>
                </div>
                <div class="text-right col-lg-3">
                    <p class="activ_p">Активность галереи: <input name="active" value="1" type="checkbox" @if($gallery->active)checked="checked"@endif></p>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-lg-10">
                    <label for="exampleFormControlInput1">Название галереи</label>
                    <input name="name" type="text" value="{{$gallery->name}}" class="form-control" id="exampleFormControlInput1">

                </div>
                <div class="col-lg-2"><br>{{Form::submit('Обновить',['class'=>'btn btn-success'])}}</div>
            </div>
        <hr>
            <div class="row">
                <div class="form-group col-lg-9">
                    <label for="exampleFormControlInput1">Картинки</label>
                    <div id="files">
                        @if(count($files) > 0)
                                @foreach($files as $file)
                                        <div style="width: 200px;position: relative;text-align: center; float: left;">
                                            <i id="{{$file->id}}" class="del_file" data-id="{!! $gallery->id !!}">x</i>
                                            <a href="{{$file->url}}" download>
                                                <img width="200px" src="{{$file->url}}">
                                            </a>
                                        </div>
                                @endforeach
                        @else
                            <p>нет файлов</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <input name="file_more" type="file" multiple="multiple" accept=".txt,image/*" data-preview-file-type="any" id="dow_file" data-id="{!! $gallery->id !!}">
                </div>
            </div>
        {!! Form::close() !!}

    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

    $(document).on('click', ".del_file", function () {
        var image = this.id;
        var prod = $(this).attr('data-id');
        console.log(image);
        console.log(prod);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'edit/del_img',
            type: 'POST',
            data: {_token: CSRF_TOKEN, id_image: image, prod_id: prod},
            success: function (data) {
                console.log(data);
                $('#files').html(data);
            }
        });
        return false;
    });

    $(document).on('change', "#dow_file", function () {
        //допилить ajax загрузку

        // var id_gallery = $(this).attr('data-id');
        //
        //
        //
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //
        // $.ajax({
        //     url: 'edit/add_img',
        //     type: 'POST',
        //     data: {_token: CSRF_TOKEN, data: $(this), id: id_gallery},
        //     success: function (data) {
        //         console.log(data);
        //         $('#files').html(data);
        //     }
        // });
    });

</script>