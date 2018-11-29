@extends('layouts.app')
@section('content')
    <div class="container">

        <h3>Add category</h3>
        <hr>
        {!! Form::open(array('route' => 'category.store')) !!}

        <div class="form-group">
            <label for="exampleFormControlInput1">Имя</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
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
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ссылка</label>
                        <input name="url" type="text" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Принадлежность к категориям</label>
                        <select name="parent_id" multiple class="form-control">
                            <option value="" selected="selected">-</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--вкладка seo--}}
                <div class="tab-pane fade" id="seo" role="tabpane4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Метатеги</label>
                        <input name="meta" type="text" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ключевые слова</label>
                        <input name="keywords" type="text" class="form-control" id="exampleFormControlInput3">
                    </div>
                </div>
            </div>
        </nav>

        {{Form::submit('Submit',['class'=>'btn btn-success'])}}

        {!! Form::close() !!}


    </div>
@endsection