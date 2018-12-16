@extends('admin.layouts.app')
@section('content')
    <div class="container">


        {!! Form::open(['route' => ['pages.update', $page->id],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}

        <div class="row">
            <div class="text-left col-lg-10">
                <h3>Edit page - {!! $page->id !!}</h3>
            </div>
            <div class="text-right col-lg-2">
                <p class="activ_p">Активность страницы: <input name="active" value="1" @if($page->active)checked="checked"@endif type="checkbox"></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="text-left col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Имя</label>
                            <input name="name" type="text" value="{!! $page->name!!}" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="6-tab" data-toggle="tab" href="#info" role="tab" aria-controls="nav-info" aria-selected="true">Информация</a>
                <a class="nav-item nav-link" id="7-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="nav-seo" aria-selected="false">SEO</a>
            </div>
            <div class="tab-content" id="myTabContent">
                {{--вкладка информация--}}
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="6-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Полное описание</label>
                                <textarea name="desc" class="form-control" id="mytextarea" rows="10">{!! $page->desc !!}</textarea>
                            </div>
                        </div>

                    </div>
                </div>
                {{--вкладка seo--}}
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-selected="false" aria-labelledby="7-tab">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ссылка</label>
                        <input name="url" type="text" value="{!! $page->url !!}" class="form-control" id="exampleFormControlInput6">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input name="title" type="text" value="{!! $page->title !!}" class="form-control" id="exampleFormControlInput7">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Метатеги</label>
                        <input name="meta" type="text" value="{!! $page->meta !!}" class="form-control" id="exampleFormControlInput6">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.replace('desc',
            {
                customConfig: '/ckeditor/custom_config.js',
                toolbar: 'simple'
            });
    });
</script>