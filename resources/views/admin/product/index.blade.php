@extends('layouts.layout')


@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ action('Admin\DashController@index') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Ürünler</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <div class="">
                <form role="search" method="get" action="{{ action('Admin\\ProductController@search') }}">
                    <div class="form-group col-lg-2">
                        <select name="option" class="form-control">
                            <option value="name">Ürün Adı</option>
                            <option value="category">Kategori</option>
                            <option value="brand">Marka</option>
                            <option value="price">Fiyat</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-8">
                        <input type="text" name="value" class="form-control" placeholder="Ürün ara">
                    </div>
                    <div class="form-group col-lg-2">
                        <button type="submit" class="btn btn-default col-md-12" >Ara</button>
                    </div>
                </form>
            </div>
            </div>
    </div><!--/.row-->

    <hr>

    <div class="row">
        <!-- Table -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ürünler
                        <a href="{{ action('Admin\\ProductController@create') }}" class="btn btn-primary pull-right">Yeni Ürün</a>
                </div>
                <div class="panel panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ürün Adı</th>
                                <th>Fiyat</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Marka</th>
                                <th>Status</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr id="product_{{ $product->id }}">
                                <th>{{ $product->name  }}</th>
                                <th>{{ $product->price  }}</th>
                                <th>{{ $product->stock }}</th>
                                <th>{{ $product->category->name  }}</th>
                                <th>{{ $product->brand  }}</th>
                                <th>{{ $product->status  }}</th>
                                <th>
                                    <a href="{{ action('Admin\\ProductController@edit', ['product' => $product]) }}" class="btn btn-default">Düzenle</a>
                                </th>
                                <th>
                                    <a data-url="{{ action('Admin\\ProductController@destroy', ['product' => $product]) }}" class="btn btn-danger removeProduct">Sil</a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <ul class="pull-right">{{ $products->appends($request->only('option', 'value'))->render() }}</ul>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')

<script src="/js/bootstrap-table.js"></script>

<script>

    $('body').on('click', '.removeProduct', function(){
        var url = $(this).attr('data-url');
        var $tr = $(this).parents('tr');
        bootbox.confirm({
            message: "Ürünü silmek istediğinize emin misiniz?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Vazgeç'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Onayla'
                }
            },
            callback: function (result) {
                if(!result){
                    return;
                }
                $.ajax({
                    'url': url,
                    'type': 'DELETE',
                    'dataType': 'JSON',
                    'success': function(result){

                        var message='Silme işlemi başarılı';
                        var status='success';

                        if(result.err){
                            //return bootbox.alert("Silme işlemi başarısız!");
                            message = "Silme işlemi başarısız";
                            status = 'danger';
                        }

                        $tr.animate('').remove();
                        $.notify({

                            message: message
                        }, {
                            delay: 3000,
                            type: status,
                            allow_dismiss: false,
                            placement: {
                                from: "top",
                                align: "center"
                            },
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            }
                        });
                    }
                });
            }
        });
    })

</script>

@stop
