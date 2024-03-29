@extends('layouts.layout')

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ action('Admin\DashController@index') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="{{ action('Admin\ProductController@index') }}">Ürünler</a></li>
            <li class="active">Yeni Ürün</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Yeni Ürün Ekle</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" method="POST" action="{{ action('Admin\ProductController@store') }}" id="createProduct">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Ürün Adı</label>
                                <input class="form-control" name="name" required="required">
                            </div>

                            <div class="form-group">
                                <label>Fiyatı</label>
                                <input class="form-control" name="price" required>
                            </div>

                            <div class="form-group">
                                <label>İndirimli Fiyatı</label>
                                <input class="form-control" name="discount" required>
                            </div>

                            <div class="form-group">
                                <label>Miktar</label>
                                <input class="form-control" name="stock" required>
                            </div>

                            <div class="form-group">
                                <label>Marka</label>
                                <input class="form-control" name="brand" required>
                            </div>

                            <div class="form-group">
                                <label>Kalite</label>
                                <select class="form-control" name="quality">
                                    <option>Yüksek</option>
                                    <option>Orta</option>
                                    <option>Düşük</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Durum</label>
                                <select class="form-control" name="status">
                                    <option value="1" selected>Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-6 pull right">
                                    <button type="reset" class="btn btn-block btn-default">Temizle</button>
                                </div>
                                <div class="form-group col-md-6 pull right">
                                    <button type="submit" class="btn btn-block btn-primary">Onayla</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="/js/jquery-validate/jquery.validate.min.js"></script>

    <script>

        $(function(){
            $('#createProduct').submit(function(e){
                e.preventDefault();
                $(this).ajaxSubmit({
                    dataType: 'JSON',
                    success: function(resp) {
                        if (resp.err) {
                            return $.notify({
                                message: "Ürün Oluşturma Başarısız!"
                            }, {
                                delay: 3000,
                                type: 'danger',
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
                        return $.notify({
                            message: "Ürün Başarıyla Oluşturuldu"
                        }, {
                            delay: 3000,
                            type: 'success',
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
                        window.location.reload();
                    },
                });

            });
        });

    </script>

@stop