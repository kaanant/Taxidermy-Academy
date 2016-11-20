@extends('layouts.layout')

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ action('Admin\DashController@index') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="{{ action('Admin\ProductController@index') }}">Ürünler</a></li>
            <li class="active">Düzenle</li>
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
                        <form role="form" method="post" action="{{ action('Admin\\ProductController@update', ['product' => $product]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="put" />
                            <div class="form-group">
                                <label>Ürün Adı</label>
                                <input class="form-control" name="name" value="{{ old('name', $product->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Fiyatı</label>
                                <input class="form-control" name="price" value="{{ old('price', $product->price) }}" required>
                            </div>

                            <div class="form-group">
                                <label>İndirimli Fiyatı</label>
                                <input class="form-control" name="discount" value="{{ old('discount', $product->discount) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Miktar</label>
                                <input class="form-control" name="stock" value="{{ old('stock', $product->stock) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Marka</label>
                                <input class="form-control" name="brand" value="{{ old('brand', $product->brand) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Kalite</label>
                                <select class="form-control" name="quality" value="{{ old('quality', $product->quality) }}">
                                    <option>Yüksek</option>
                                    <option>Orta</option>
                                    <option>Düşük</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option selected={{ old('cateegory_id', $product->category_id) }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group col-md-3">
                                    <button type="submit "class="btn btn-block btn-primary">Onayla</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="reset" class="btn btn-block btn-default">Geri Al</button>
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