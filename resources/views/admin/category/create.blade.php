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
                        <form role="form" method="POST" action="{{ action('Admin\ProductController@store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Kategori Adı</label>
                                <input class="form-control" name="name">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group col-md-3">
                                    <button type="submit "class="btn btn-block btn-primary">Onayla</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="reset" class="btn btn-block btn-default">Temizle</button>
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
@stop