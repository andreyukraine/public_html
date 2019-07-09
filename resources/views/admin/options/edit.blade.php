@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>Edit options - {!! $option->id !!}</h3>
        <hr>
        {!! Form::open(['route' => ['options.update', $option->id], 'method'=>'PUT', 'id'=>'sends', 'enctype'=>'multipart/form-data']) !!}
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8">
                    <label class="radio-inline">
                        <input name="type" @if($option->type == 'dir') checked="checked" @endif value="dir" type="radio">
                        Справочник
                    </label>
                    <label class="radio-inline">
                        <input name="type" @if($option->type == 'dir_img') checked="checked" @endif value="dir_img"
                               type="radio">
                        Справочник с картинками
                    </label>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-6 text-right">Sort</div>
                        <div class="col-lg-6"><input name="sort" type="text" value="{!! $option->sort !!}" class="form-control"></div>
                    </div>
                </div>
            </div>
            <hr>
        </div>


        {{--{{$validator->title}}--}}


        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input name="name" type="text" value="{!! $option->name !!}" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    <div id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Value</div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 dictionary" @if($option->type != "dir_img") style="display: none" @endif>
                    <div class="form-group">
                        <div class="options_list col-lg-12 justify-content-start">
                            @foreach($values as $value)
                                <div class="row">
                                    <div class="col-lg-1">{!! $value->id !!}</div>
                                    <div class="col-lg-1"><img width="25px" src="{!! $value->images !!}"></div>
                                    <div class="col-lg-6">{!! $value->name !!}</div>
                                    <div class="col-lg-2">{!! $value->sort !!}</div>
                                    <div class="col-lg-2">
                                        <span data-toggle="modal" data-target="#modal-bid" data-sort="{!! $value->sort !!}" data-name="{!! $value->name !!}" class="glyphicon glyphicon-pencil edit_opt" id="{!! $value->id !!}" data-opt="{!! $option->id !!}"></span>
                                        <span class="glyphicon glyphicon-remove del_opt" id="{!! $value->id !!}" data-opt="{!! $option->id !!}"></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 dictionary" @if($option->type != "dir") style="display: none" @endif>
                    <div class="form-group">
                        <div class="options_list col-lg-12 justify-content-start">
                            @foreach($values as $value)
                                <div class="row">
                                    <div class="col-lg-1">{!! $value->id !!}</div>
                                    <div class="col-lg-7">{!! $value->name !!}</div>
                                    <div class="col-lg-2">{!! $value->sort !!}</div>
                                    <div class="col-lg-2">
                                        <span data-toggle="modal" data-target="#modal-bid" data-sort="{!! $value->sort !!}" data-name="{!! $value->name !!}" class="glyphicon glyphicon-pencil edit_opt" id="{!! $value->id !!}" data-opt="{!! $option->id !!}"></span>
                                        <span class="glyphicon glyphicon-remove del_opt" id="{!! $value->id !!}" data-opt="{!! $option->id !!}" data-type-opt="{!! $option->type !!}"></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-2">{{Form::submit('Обновить',['class'=>'btn btn-success'])}}</div>
                <div class="col-lg-2"><a href="{{ route('options.index') }}"><div class="btn btn-success"> Закрыть</div></a>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleFormControlInput2">Category</label>
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
        </div>
        {!! Form::close() !!}



        {{--окно редактирования--}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" class="form-horizontal" novalidate="" enctype="multipart/form-data">
                            <input type="hidden" id="id_option" value="{!! $option->id !!}">
                            <input type="hidden" id="type_option" value="{!! $option->type !!}">
                            <input type="hidden" id="id_value" value="">
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDetail" class="col-sm-3 control-label">Sort</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="sort" name="sort" placeholder="sort" value="">
                                </div>
                            </div>
                            @if($option->type != "dir")
                                <div class="form-group">
                                    <label for="inputDetail" class="col-sm-3 control-label">Картинка</label>
                                    <div class="col-sm-9">
                                        <img id="file_img" src="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDetail" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <input  name="file_edit" id="file" class="file" type="file">
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save</button>
                        <input type="hidden" id="product_id" name="product_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {


        $('#btn_add').click(function(){
            $('#btn-save').val("add");
            $('#myModal').modal('show');
        });


        //create new product / update existing product ***************************
        $("#btn-save").click(function (e) {


            //e.preventDefault();
            var type_option = $('#type_option').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var state = $('#btn-save').val();
            //console.log(type_option);
            var type = "POST"; //for creating new resource

            var form = new FormData();
            form.append('_token', CSRF_TOKEN);
            form.append('id', $('#id_option').val());

            if (state == 'add') {
                var my_url = '/admin/add_value_img';
            }else{
                var my_url = '/admin/edit_value';
                form.append('value_id', $('#id_value').val());
            }

            form.append('name', $('#name').val());
            form.append('sort', $('#sort').val());
            form.append('type_option', type_option);

            if (type_option != "dir"){
                form.append('file', $('input[name="file_edit"]').get(0).files[0]);
            }

            console.log(state);






            $.ajax({
                type: type,
                url: my_url,
                data: form,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    document.location.href = data;
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        //edit options
        $('.edit_opt').click(function () {

            $('#btn-save').val("edit");
            var value_id = $(this).attr("id");
            $('#id_value').val(value_id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
                url: '/admin/show_value',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    value_id: value_id
                },
                success: function (data) {
                    console.log(data);
                    $('input[name="name"]').val(data['name']);
                    $('input[name="sort"]').val(data['sort']);
                    $("#file_img").attr("src",data['file']);
                }
            });


            $('#myModal').modal('show');



        });

        //del options
        $(document).on('click', '.del_opt', (function(e){

                e.preventDefault();

                var option_id = $(this).attr("data-opt");
                var value_id = $(this).attr("id");
                var type_option = $(this).attr("data-type-opt");

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/admin/del_value',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        id:option_id,
                        value:value_id,
                        type_option:type_option
                    },
                    success: function (data) {
                        //console.log(data);
                        $('.options_list').html(data);
                    }
                });
            })

        )
    })

</script>