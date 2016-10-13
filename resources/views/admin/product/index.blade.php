@extends('layouts.layout')

@section('header')

    <link href="/css/docs.min.css" rel="stylesheet">

@stop


@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ürünler</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Panel heading</div>

            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <button type="submit" class="btn btn-primary">Yeni Ürün</button>
                </div>
            </div>
        </div>
    </div>
                <!-- Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ürün Kodu</th>
                            <th>Fiyat</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Marka</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th>{{ $product->product_key  }}</th>
                            <th>{{ $product->price  }}</th>
                            <th>{{ $product->stock }}</th>
                            <th>{{ $product->category_id  }}</th>
                            <th>{{ $product->brand  }}</th>
                            <th><a href="{{ action('Admin\ProductController@destroy', ['product' => $product]) }}">Sil</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@stop


@section('scripts')

<script src="/js/bootstrap-table.js"></script>

@stop
