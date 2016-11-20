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
                <div class="panel-heading">Siparişler</div>
                <div class="panel panel-body">
                    <table class="table table-striped col-md-12">
                        <thead>
                        <tr>
                            <th>Teslim Edilecek Kişi</th>
                            <th>Teslimat Adresi</th>
                            <th>Fatura Adresi</th>
                            <th>Ödeme Tipi</th>
                            <th>Toplam Ücret</th>
                            <th>Teslimat Telefonu</th>
                            <th>Kargo Tipi</th>
                            <th>Sipariş Tarihi</th>
                            <th>Sipariş Durumu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th>{{ $order->shipment_user  }}</th>
                                <th>{{ $order->shipment_user }}</th>
                                <th>{{ $order->shipment_user  }}</th>
                                <th>{{ $order->payment_type  }}</th>
                                <th>{{ $order->total_price  }}</th>
                                <th>{{ $order->shipment_phone  }}</th>
                                <th>{{ $order->delivery_type }}</th>
                                <th>{{ $order->created_at}}</th>
                                <th>
                                    <select class="form-control" name="status" value="{{ $order->status }}">
                                        <option>Teslim Edildi</option>
                                        <option>Beklemede</option>
                                        <option>Teslimat Sırasında</option>
                                    </select>
                                </th>
                                <th></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



@endsection