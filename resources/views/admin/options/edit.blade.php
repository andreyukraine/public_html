@extends('admin.layouts.app')
@section('content')
    <div class="container">


        <h3>Edit options - {!! $option->id !!}</h3>
        <hr>
        {!! Form::open(['route' => ['options.update', $option->id], 'method'=>'PUT', 'id'=>'sends', 'enctype'=>'multipart/form-data']) !!}

        <label class="radio-inline">
            <input name="type" @if($option->type == 'dir') checked="checked" @endif value="dir" type="radio">
            Справочник
        </label>
        <label class="radio-inline">
            <input name="type" @if($option->type == 'dir_img') checked="checked" @endif value="dir_img" type="radio">
            Справочник с картинками
        </label>
        <hr>

        {{--{{$validator->title}}--}}


        <div class="col-lg-8">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input name="name" type="text" value="{!! $option->name !!}" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="col-lg-12 dictionary" @if($option->type != "dir_img") style="display: none" @endif>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Значения справочника</label>
                    <div class="row">
                        <div class="col-lg-6">
                            <input name="name_option" type="text" id="exampleFormControlInput1" class="form-control value_name">
                        </div>
                        <div class="col-lg-4">
                            <input name="file_option" type="file" class="file_name">
                        </div>
                        <div class="col-lg-2">
                            <span class="btn btn-success glyphicon glyphicon-plus add_opt_img" id="{!! $option->id !!}"></span>
                        </div>
                    </div>
                    <hr>
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





            <div class="col-lg-12 dictionary" @if($option->type != "dir") style="display: none" @endif>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Значения справочника</label>
                    <div class="row">
                        <div class="col-lg-10">
                            <input name="value_name_option" type="text" id="exampleFormControlInput1" class="form-control value_name">
                        </div>
                        <div class="col-lg-2">
                            <span class="btn btn-success glyphicon glyphicon-plus add_opt" id="{!! $option->id !!}"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="options_list col-lg-12 justify-content-start">
                        @foreach($values as $value)
                            <div class="row">
                                <div class="col-lg-1">{!! $value->id !!}</div>
                                <div class="col-lg-7">{!! $value->name !!}</div>
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

            <div class="col-lg-12">{{Form::submit('Submit',['class'=>'btn btn-success'])}}</div>
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
        <div class="modal modal_bid" id="modal-bid">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button class="modal-close" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <form name="FORM" id="redact" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Name</label>
                                    <input name="name_option" type="text" id="exampleFormControlInput1" class="form-control value_name">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sort</label>
                                    <input name="sort_option" type="text" id="exampleFormControlInput1" class="form-control sort">
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-12 btn_center"><input value="Записать" class="btn modal-form__btn" type="submit"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('.add_opt').on('click', function(){
            var option_id = $(this).attr("id");

            var value_name_option =  $("input[name=value_name_option]").val();
            console.log(value_name_option);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/admin/add_value',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id:option_id,
                    name:value_name_option
                },
                success: function (data) {
                    //console.log(data);
                    $('.options_list').html(data);
                }
            });
        });


        $('.add_opt_img').on('click', function(){
            var option_id = $(this).attr("id");
            var div = $(this).parents().parents();
            var value_input = div.find(".value_name").val();

            //var data = $('#sends').serializeArray();
            var formData = new FormData($("#sends")[0][6].files[0]);
            //formData.append('file', $("#sends")[0][6].files[0]);
            console.log($("#sends")[0][6].files[0]);

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/admin/add_value_img',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id:option_id,
                    name:value_input,
                    file: formData
                },
                success: function (data) {

                    $('.options_list').html(data);
                }
            });
        });

        //edit options
        $('.edit_opt').click(function (e) {

            var name = $(this).attr("data-name");
            var sort = $(this).attr("data-sort");
            var option_id = $(this).attr("data-opt");
            var value_id = $(this).attr("id");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');



            $('.modal').on('show.bs.modal', function(e) {


                $("input[name='name_option']").val(name);
                $("input[name='sort_option']").val(sort);


                $("#redact").submit(function(e) {

                    e.preventDefault();
                    var new_value = $("input[name='name_option']").val();
                    var sort_value = $("input[name='sort_option']").val();


                    $.ajax({
                        type: "POST",
                        url: '/admin/edit_value',
                        data: {
                            _token: CSRF_TOKEN,
                            id: option_id,
                            value_id: value_id,
                            value: new_value,
                            sort: sort_value
                        },
                        success: function (response) {

                            console.log(response);
                        }
                    });
                    e.stopPropagation();
                });
            });

        });

        //del options
        $('.del_opt').on('click', function(){

            var option_id = $(this).attr("data-opt");
            var value_id = $(this).attr("id");
            //console.log(option_id);

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/admin/del_value',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id:option_id,
                    value:value_id
                },
                success: function (data) {
                    //console.log(data);
                    $('.options_list').html(data);
                }
            });
        })
    })

</script>