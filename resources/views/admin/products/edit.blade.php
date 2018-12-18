@extends('admin.layouts.app')
@section('content')



    <div class="container">

        {!! Form::open(['route' => ['products.update', $product->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="text-left col-lg-10">
                <h3>Edit product - {!! $product->id !!}</h3>
            </div>
            <div class="text-right col-lg-2">
                <p class="activ_p">Активность товара: <input name="active" value="1" type="checkbox" @if($product->active)checked="checked"@endif></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="text-left col-lg-12">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Имя</label>
                            <input name="name" type="text" class="form-control" value="{!! $product->name !!}" id="exampleFormControlInput1">
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Сортировка</label>
                            <input name="sort" type="text" value="{!! $product->sort !!}" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>

        {{--{{$validator->title}}--}}

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="tab1" data-toggle="tab" href="#info" role="tab" aria-controls="nav-info" aria-selected="true">Информация</a>
                <a class="nav-item nav-link" id="tab2" data-toggle="tab" href="#options" role="tab" aria-controls="nav-options">Свойства</a>
                <a class="nav-item nav-link" id="tab3" data-toggle="tab" href="#price" role="tab" aria-controls="nav-options">Цены</a>
                <a class="nav-item nav-link" id="tab4" data-toggle="tab" href="#seo" role="tab" aria-controls="nav-seo">SEO</a>

            </div>
            <div class="tab-content" id="myTabContent">
                {{--вкладка информация--}}
                <div class="tab-pane fade show active" id="info" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Категория</label>
                                <select name="cat_id[]" multiple class="form-control">
                                    @if(!isset($select_category))
                                        <option selected="selected" value="1">-</option>
                                    @else
                                        <option value="1">-</option>
                                    @endif
                                    @foreach($categories as $category)
                                        @if(isset($select_category))
                                            <?php $select = 0;?>
                                            @foreach($select_category as $sc)
                                                @if($category->id == $sc->id)
                                                    <?php $select = $sc->id ?>
                                                @endif
                                            @endforeach
                                            @if($select != 0)
                                                <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#a" role="tab" aria-controls="nav-home" aria-selected="true">Выдержка</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#b" role="tab" aria-controls="nav-profile" aria-selected="false">Краткое описание</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#c" role="tab" aria-controls="nav-contact" aria-selected="false">Полное описание</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#d" role="tab" aria-controls="nav-contact" aria-selected="false">Состав</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#f" role="tab" aria-controls="nav-contact" aria-selected="false">Норми кормления</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="2-tab">
                                    <textarea name="excerpt" class="form-control" id="mytextarea" rows="10">{!! $product->excerpt !!}</textarea>
                                </div>
                                <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="3-tab">
                                    <textarea name="prev_desc" class="form-control" id="mytextarea" rows="10">{!! $product->prev_desc !!}</textarea>
                                </div>
                                <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="1-tab">
                                    <textarea name="description" class="form-control" id="mytextarea" rows="10">{!! $product->desc !!}</textarea>
                                </div>
                                <div class="tab-pane fade" id="d" role="tabpanel" aria-labelledby="1-tab">
                                    <textarea name="composition" class="form-control" id="mytextarea" rows="10">{!! $product->composition !!}</textarea>
                                </div>
                                <div class="tab-pane fade" id="f" role="tabpanel" aria-labelledby="1-tab">
                                    <textarea name="dose" class="form-control" id="mytextarea" rows="10">{!! $product->dose !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="exampleFormControlInput2">Главная картинка</label>
                            @if($product->images)
                                <img class="img-responsive center" src="{!! $product->images !!}">
                            @else
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Картинка</label>
                                    <input name="file" id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
                                </div>
                            @endif
                            <hr>
                            <label for="exampleFormControlInput2">Дополнительные картинки</label>
                            <br/>
                            <hr>
                            @if(count($files) > 0)

                                <div id="row files">
                                    @foreach($files as $file)
                                        <div class="col-lg-12">
                                            <i id="{{$file->id}}" class="del_file" data-id="{!! $product->id !!}">x</i>
                                            <a href="{{$file->url}}" download>
                                                <img width="75px" src="{{$file->url}}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                            @else
                                <p>нет файлов</p>
                            @endif
                            <br/>
                            <br/>

                            <br/>
                            <br/>
                            <br/>
                            <div class="form-group">
                                <input name="file_more" type="file" data-preview-file-type="any" data-upload-url="#">
                            </div>
                        </div>
                    </div>
                </div>
                {{--вкладка свойства--}}
                <div class="tab-pane fade" id="options" role="tabpane2">
                    @foreach($options as $option)
                        @foreach($option as $val)
                            @if($val['type_opt'] == "dir" | $val['type_opt'] == "dir_img")
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><?=$val['name_opt'];?></label>
                                    <select multiple name="opt_id[<?=$val["id_opt"];?>][]" class="form-control" id="exampleFormControlSelect1">
                                        @foreach($val['value_opt'] as $item)
                                            <?php $name = 'name_'.App::getLocale();?>
                                            <option value="{{ $item->id }}" data-title="<?=$val["id_opt"];?>"
                                                    @if ($item->select_id > 0 )
                                                    selected="selected"
                                                    @endif
                                            >{{ $item->{$name} }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><?=$val['name_opt'];?></label>
                                    <input name="opt_id[<?=$val["id_opt"];?>]" type="text" class="form-control" value="<?=$val['value_opt'];?>" id="exampleFormControlInput1">
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                {{--вкладка цены--}}
                <div class="tab-pane fade" id="price" role="tabpane3">
                    <br>
                    @foreach($options as $option)
                        @foreach($option as $val)
                            @if($val['id_opt'] == "7")
                                <div class="form-group">
                                    <?php $name = 'name_'.App::getLocale();?>
                                    @foreach($val['value_opt'] as $key => $item)
                                        @if ($item->select_id > 0 )
                                            <div class="row ">
                                                <div class="col-lg-8 offset-lg-2">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Sku</label>
                                                            <input name="sku[{{$item->id}}][]" type="text" class="form-control" value="{!! $item->sku !!}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Barcode</label>
                                                            <input name="barcode[{{$item->id}}][]" type="text" class="form-control" value="{!! $item->barcode !!}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">&nbsp;</label>
                                                            <p>{{ $item->$name }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Price</label>
                                                            <input name="price[{{$item->id}}][]" type="text" class="form-control" value="{!! $item->price !!}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                {{--вкладка seo--}}
                <div class="tab-pane fade" id="seo" role="tabpane4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ссылка</label>
                        <input name="url" type="text" value="{!! $product->url !!}" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input name="title" type="text" value="{!! $product->title !!}" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Метатеги</label>
                        <input name="meta" type="text" value="{!! $product->meta !!}" class="form-control" id="exampleFormControlInput6">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ключевые слова</label>
                        <input name="keywords" type="text" value="{!! $product->keywords !!}" class="form-control" id="exampleFormControlInput6">
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-2">{{Form::submit('Обновить',['class'=>'btn btn-success'])}}</div>
                <div class="col-lg-2"><a href="{{ route('products.admin') }}"><div class="btn btn-success"> Закрыть</div></a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

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
            data: {_token: CSRF_TOKEN, id_image:image, prod_id:prod},
            success: function (data) {
                console.log(data);
                $('#files').html(data);
            }
        });
        return false;
    });
    $(document).ready(function () {
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.replace( 'composition',{
                customConfig: '/ckeditor/custom_config.js',
                toolbar: 'simple'
            });
        CKEDITOR.replace( 'dose',{
                customConfig: '/ckeditor/custom_config.js',
                toolbar: 'simple'
            });
        CKEDITOR.replace( 'prev_desc',{
                customConfig: '/ckeditor/custom_config.js',
                toolbar: 'simple'
            });
        CKEDITOR.replace( 'description',{
                customConfig: '/ckeditor/custom_config.js',
                toolbar: 'simple'
            });
        CKEDITOR.replace( 'excerpt',{
                customConfig: '/ckeditor/custom_config.js',
                toolbar: 'simple'
            });
    })

</script>