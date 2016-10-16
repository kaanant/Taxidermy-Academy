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
                        <form role="form" action="{{ action('Admin\ProductController@create') }}">

                            <div class="form-group">
                                <label>Ürün Adı</label>
                                <input class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <label>Fiyatı</label>
                                <input class="form-control" name="price">
                            </div>

                            <div class="form-group">
                                <label>İndirimli Fiyatı</label>
                                <input class="form-control" name="discount" >
                            </div>

                            <div class="form-group">
                                <label>Miktar</label>
                                <input class="form-control" name="stock">
                            </div>

                            <div class="form-group">
                                <label>Marka</label>
                                <input class="form-control" name="brand">
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
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit "class="btn btn-block btn-primary">Onayla</button>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-block btn-default">Temizle</button>
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
    @stop