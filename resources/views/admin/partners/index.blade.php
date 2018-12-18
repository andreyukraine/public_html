@extends('admin.layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-11">
                <h4>Партнеры</h4>
            </div>
            <div class="col-lg-1">
                <a href="{{ route('partners.create') }}" class="btn btn-success" id="create_product" role="button">Create</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="partner_list col-lg-12">
                @foreach($partners as $partner)
                    <div class="row">
                        <div class="col-lg-1">
                            {{$partner->id}}
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ route('products.edit',$partner->id) }}"><p class="name">{!! $partner->name !!}</p></a>
                        </div>
                        <div class="col-lg-5">
                            <p class="addres">{!! $partner->addres !!}</p></a>
                        </div>
                        <div class="col-lg-1">
                            <p class="sort">{!! $partner->sort !!}</p>
                        </div>
                        <div class="col-lg-1">
                            <p class="type">{!! $partner->type !!}</p>
                        </div>
                        <div class="panel_my col-lg-1">
                            <a href="{{ route('partners.edit',$partner->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ route('delete.partner',$partner->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('.cat span').click(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                /* the route pointing to the post function */
                url: 'ajax/products',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {
                    _token: CSRF_TOKEN,
                    id:this.id
                },
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    $('.product_list').html(data);
                }
            });
        });

    });
</script>