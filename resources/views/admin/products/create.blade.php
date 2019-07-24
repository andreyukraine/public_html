@extends('admin.layouts.app')
@section('content')
    <div class="container">

        {{--{{$validator->title}}--}}
        {!! Form::open(['route' => ['products.store'], 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="text-left col-lg-10">
                <h3>Add product</h3>
            </div>
            <div class="text-right col-lg-2">
                <p class="activ_p">Не отображать: <input name="view" value="1" type="checkbox"></p>
                <p class="activ_p">Активность товара: <input name="active" value="1" type="checkbox"></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="text-left col-lg-12">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Имя</label>
                            <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Сортировка</label>
                            <input name="sort" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        {{--вкладки--}}
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="6-tab" data-toggle="tab" href="#info" role="tab" aria-controls="nav-info" aria-selected="true">Информация</a>
                <a class="nav-item nav-link" id="7-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="nav-seo" aria-selected="false">SEO</a>
            </div>
            <div class="tab-content" id="myTabContent">
                {{--вкладка информация--}}
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="6-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Категория</label>
                                <select name="cat_id[]" multiple="multiple" class="form-control">
                                    <option value="" selected="selected">-</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="1-tab" data-toggle="tab" href="#a" role="tab" aria-controls="nav-home" aria-selected="true">Выдержка</a>
                                    <a class="nav-item nav-link" id="2-tab" data-toggle="tab" href="#b" role="tab" aria-controls="nav-profile" aria-selected="false">Краткое описание</a>
                                    <a class="nav-item nav-link" id="3-tab" data-toggle="tab" href="#c" role="tab" aria-controls="nav-contact" aria-selected="false">Полное описание</a>
                                    <a class="nav-item nav-link" id="4-tab" data-toggle="tab" href="#d" role="tab" aria-controls="nav-composition" aria-selected="false">Состав</a>
                                    <a class="nav-item nav-link" id="5-tab" data-toggle="tab" href="#f" role="tab" aria-controls="nav-dose" aria-selected="false">Норми кормления</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="1-tab">
                                    <textarea name="excerpt" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                                </div>
                                <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="2-tab">
                                    <textarea name="prev_desc" class="form-control" id="exampleFormControlTextarea2" rows="10"></textarea>
                                </div>
                                <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="3-tab">
                                    <textarea name="desc" class="form-control" id="exampleFormControlTextarea3" rows="10"></textarea>
                                </div>
                                <div class="tab-pane fade" id="d" role="tabpanel" aria-labelledby="4-tab">
                                    <textarea name="composition" class="form-control" id="exampleFormControlTextarea4" rows="10"></textarea>
                                </div>
                                <div class="tab-pane fade" id="f" role="tabpanel" aria-labelledby="5-tab">
                                    <textarea name="dose" class="form-control" id="exampleFormControlTextarea5" rows="10"></textarea>
                                </div>
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
                {{--вкладка seo--}}
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-selected="false" aria-labelledby="7-tab">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ссылка</label>
                        <input name="url" type="text" value="" class="form-control" id="exampleFormControlInput6">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input name="title" type="text" value="" class="form-control" id="exampleFormControlInput7">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Метатеги</label>
                        <input name="meta" type="text" value="" class="form-control" id="exampleFormControlInput6">
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <div class="col-lg-12"> {{Form::submit('Submit',['class'=>'btn btn-success'])}}</div>
        {!! Form::close() !!}

    </div>

@endsection
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        });
        CKEDITOR.replace( 'composition',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            });
        CKEDITOR.replace( 'dose',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            });
        CKEDITOR.replace( 'prev_desc',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            });
        CKEDITOR.replace( 'desc',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            });
        CKEDITOR.replace( 'excerpt',
            {
                customConfig : 'config.js',
                toolbar : 'simple'
            });
    })

</script>