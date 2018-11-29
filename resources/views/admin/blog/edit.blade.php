@extends('layouts.app')
@section('content')
    <div class="container">


        <h3>Edit post - {!! $post->id !!}</h3>

        <hr>

        {!! Form::open(['route' => ['blog.update', $post->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
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
                                <label for="exampleFormControlInput1">Имя</label>
                                <input name="name" type="text" value="{!! $post->name !!}" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="2-tab" data-toggle="tab" href="#b" role="tab" aria-controls="nav-profile" aria-selected="false">Краткое описание</a>
                                    <a class="nav-item nav-link" id="3-tab" data-toggle="tab" href="#c" role="tab" aria-controls="nav-contact" aria-selected="false">Полное описание</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active" id="b" role="tabpanel" aria-labelledby="2-tab">
                                    <textarea name="prev_desc" class="form-control" id="exampleFormControlTextarea2" rows="10">{!! $post->prev_desc !!}</textarea>
                                </div>
                                <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="3-tab">
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea3" rows="10">{!! $post->desc !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="file_block col-lg-4">
                            @if($post->images)
                                <p><span class="del_img" data-id="{!! $post->id !!}" data-url="{!! $post->images !!}">x</span></p>
                                <img class="img-responsive center" src="{!! $post->images !!}">
                            @else
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Картинка</label>
                                    <input name="file" id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{--вкладка seo--}}
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-selected="false" aria-labelledby="7-tab">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ссылка</label>
                        <input name="url" type="text" value="{!! $post->url !!}" class="form-control" id="exampleFormControlInput6">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input name="title" type="text" value="{!! $post->title !!}" class="form-control" id="exampleFormControlInput7">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Метатеги</label>
                        <input name="meta" type="text" value="{!! $post->meta !!}" class="form-control" id="exampleFormControlInput6">
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
        $('.del_img').click(function () {
            var url_img = $(this).attr('data-url');
            var post_id = $(this).attr('data-id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'edit/del_img',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id:post_id,
                    url:url_img
                },
                success: function (data) {
                    console.log(data);
                    $('.file_block').html(data);
                }
            });
        })
    })

</script>