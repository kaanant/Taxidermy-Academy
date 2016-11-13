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
            <h1 class="page-header">Ürünler</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading col-md-12">Panel heading</div>

            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <form action="{{ action('Admin\ProductController@create') }}">
                        <button type="submit" class="btn btn-primary" >Yeni Ürün</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="col-md-12">
            <div class="panel panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Ürün Kodu</th>
                        <th>Fiyat</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Marka</th>
                        <th>İşlemler</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->name  }}</th>
                            <th>{{ $product->price  }}</th>
                            <th>{{ $product->stock }}</th>
                            <th>{{ $product->category_id  }}</th>
                            <th>{{ $product->brand  }}</th>
                            <th>{{ $product->status  }}</th>
                            <th>
                                <form method="DELETE" action="{{ action('Admin\ProductController@destroy', ['product' => $product]) }}">
                                    <button type="submit" class="btn btn-danger">Sil</button>
                                </form>
                                <form method="edit" action="{{ action('Admin\ProductController@edit', ['product' => $product]) }}">
                                    <button type="submit" class="btn">Düzenle</button>
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
