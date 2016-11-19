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
        <h1 class="page-header"></h1>
    </div>
</div><!--/.row-->
<div class="row">
    <!-- Table -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Kategoriler
                <a href="{{ action('Admin\\CategoryController@create') }}" class="btn btn-primary pull-right">Yeni Kategori</a>
            </div>
            <div class="panel panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Kategori ID</th>
                        <th>Kategori Adı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id  }}</th>
                            <th>{{ $category->name }}</th>
                            <th>
                                <form method="edit" action="{{ action('Admin\\CategoryController@edit', ['category' => $category]) }}">
                                    <button type="submit" class="btn btn-default">Düzenle</button>
                                </form>
                            </th>
                            <th>
                                <form method="delete" action="{{ action('Admin\\CategoryController@destroy', ['category' => $category]) }}">
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