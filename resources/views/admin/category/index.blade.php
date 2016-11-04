@extends('layouts.layout')


@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashController@index') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Kategoriler</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategoriler</h1>
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
                <form action="{{ action('Admin\CategoryController@create') }}">
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
                    <th>Kategori No</th>
                    <th>Adı</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <th>{{ $category->name }}</th>
                        <th>
                            <form method="DELETE" >
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                            <form method="edit" >
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