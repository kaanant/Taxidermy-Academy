@extends('layouts.layout')


@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ action('Admin\DashController@index') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Kategoriler</li>
    </ol>
</div><!--/.row-->

    @stop