@extends('site.layouts.master')

@section("content")
<div class="ckeckout">
    <div class="container">
        <div class="ckeck-top heading">
            <h2>SEPETİM</h2>
        </div>
        <div class="ckeckout-top">
            <div class="cart-items">
                <h3>SEPETİM</h3>
                <div class="in-check" >
                    <ul class="unit">
                        <li><span>Item</span></li>
                        <li><span>Product Name</span></li>
                        <li><span>Unit Price</span></li>
                        <li><span>Adet</span></li>
                        <li><span>Delivery Details</span></li>
                        <li> </li>
                        <div class="clearfix"> </div>
                    </ul>
                    @foreach($productList as $product)
                        <ul class="cart-header" data-id="{{ $product->id }}" id="ulHeader_{{$product->id}}">
                                <div class="close1 cartOperation" data-status="remove" data-product-id="{{$product->id}}"></div>
                                <li class="ring-in"><a href="single.html" ><img src="/images/c-1.jpg" class="img-responsive" alt=""></a>
                                </li>
                                <li><span class="name">{{ $product->name }}</span></li>
                                <li><span class="cost"> {{ $product->discount }} TL</span></li>
                                <li><span class="cost" > {{ $productIds[$product->id] }}</span></li>
                                <li><span class="name">Delivered in 2-3 business days</span></li>
                                <div class="clearfix"> </div>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("footer")
    <script>
        $(document).ready(function(c) {

            $('.close1').on('click', function(c){
                var $this = $(this);

                var $header = $('#ulHeader_' + $this.attr('data-product-id'));

                $header.fadeOut('slow', function(c){
                    $header.remove()
                });
            });
        });

    </script>
    <script src="js/simpleCart.min.js"> </script>
@endsection