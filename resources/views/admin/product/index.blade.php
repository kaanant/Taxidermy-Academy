@extends('layouts.layout')

@section('header')

    <link href="/css/docs.min.css" rel="stylesheet">

@stop


@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Table</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Panel heading</div>

                <!-- Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>kalsjda</th>
                            <th>kalsjda</th>
                            <th>kalsjdas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>fasikül</th>
                            <th>fasikül</th>
                            <th>fasikül</th>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop


@section('scripts')

<script src="/js/bootstrap-table.js"></script>

@stop
