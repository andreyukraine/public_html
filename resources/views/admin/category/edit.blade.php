@extends('layouts.app')
@section('content')
    <div class="container">

        <h3>Update category - {{$category->id}}</h3>
        <hr>
        {!! Form::open(array('route' => ['category.update', $category->id ],'method'=>'PUT')) !!}

        <div class="form-group">
            <label for="exampleFormControlInput1">Имя</label>
            <input name="name" type="text" value="{{$category->name}}" class="form-control" id="exampleFormControlInput1">
        </div>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="tab1" data-toggle="tab" href="#info" role="tab" aria-controls="nav-info" aria-selected="true">Информация</a>
                <a class="nav-item nav-link" id="tab4" data-toggle="tab" href="#seo" role="tab" aria-controls="nav-seo">SEO</a>
            </div>
            <div class="tab-content" id="myTabContent">
                {{--вкладка информация--}}
                <div class="tab-pane fade show active" id="info" role="tabpanel">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заглавие</label>
                        <input name="title" type="text" value="{{$category->title}}" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ссылка</label>
                        <input name="url" type="text" value="{{$category->url}}" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Принадлежность к категориям</label>
                        <select name="parent_id" multiple class="form-control">
                            <option value="">-</option>
                            @foreach($categories as $cat)
                                <?php $temp_cat = 0;?>
                                @if($cat->id == $category->parent_id)
                                    <option selected="selected" class="par" value="{{$cat->id}}">{{$cat->name}}</option>
                                @else
                                    <option class="par" value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                {{--вкладка seo--}}
                <div class="tab-pane fade" id="seo" role="tabpane4">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Метатеги</label>
                        <input name="meta" type="text" value="{{$cat->meta}}" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ключевые слова</label>
                        <input name="keywords" type="text" value="{{$cat->keywords}}" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Описание</label>
                        <input name="description" type="text" value="{{$cat->description}}" class="form-control" id="exampleFormControlInput3">
                    </div>
                </div>
            </div>
        </nav>
        <br>
        {{Form::submit('Submit',['class'=>'btn btn-success'])}}

        {!! Form::close() !!}


    </div>
@endsection

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>