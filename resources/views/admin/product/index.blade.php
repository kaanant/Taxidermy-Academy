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
        </div>
    </div><!--/.row-->

    <div class="row">
        <!-- Table -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ürünler
                    <div class="col-md-2">
                        <form action="{{ action('Admin\ProductController@create') }}">
                            <button type="submit" class="btn btn-primary" >Yeni Ürün</button>
                        </form>
                    </div>
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
                            <tr>
                                <th>{{ $product->name  }}</th>
                                <th>{{ $product->price  }}</th>
                                <th>{{ $product->stock }}</th>
                                <th>{{ $product->getCategoryName()  }}</th>
                                <th>{{ $product->brand  }}</th>
                                <th>{{ $product->status  }}</th>
                                <th>
                                    <form method="edit" action="{{ action('Admin\\ProductController@edit', ['product' => $product]) }}">
                                        <button type="submit" class="btn btn-default">Düzenle</button>
                                    </form>
                                </th>
                                <th>
                                    <form method="DELETE" action="{{ action('Admin\\ProductController@destroy', ['product' => $product]) }}">
                                        <button type="submit" class="btn btn-danger">Sil</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

@stop


@section('scripts')

<script src="/js/bootstrap-table.js"></script>

@stop
