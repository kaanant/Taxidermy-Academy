@extends('site.layouts.master')


@section('content')
    <div class="bnr" id="home">
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                <li>
                    <img src="images/bnr-1.jpg" alt=""/>
                </li>
                <li>
                    <img src="images/bnr-2.jpg" alt=""/>
                </li>
                <li>
                    <img src="images/bnr-3.jpg" alt=""/>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--banner-ends-->

    <!--about-starts-->
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                @foreach($latest_products as $product)
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="images/abt-1.jpg" alt=""/>
                            <figcaption>
                                <h2>{{$product->name}}</h2>
                                <p>{{$product->brand}}</p>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    <!--about-end-->
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <div class="product-top">
                @foreach($discounted_products->chunk(4) as $chunkedProducts)
                    <div class="product-one">
                        @foreach($chunkedProducts as $product)
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="single.html" class="mask">
                                        <img class="img-responsive zoom-img" src="images/p-1.png" alt=""/></a>
                                    <div class="product-bottom">
                                        <h3>{{$product->name}}</h3>
                                        <p>Explore Now</p>
                                        <h4><a class="item_add" href="#"><i></i></a>
                                            <span class=" item_price"><strike>{{$product->price}} TL</strike></span>
                                        </h4>
                                        <h4><a class="item_add" href="#"><i></i></a>
                                            <span class=" item_price">{{($product->discount) }}</span>
                                        </h4>
                                    </div>
                                    <div class="srch">
                                        <span>%{{round(100 -($product->discount*100) / $product->price )}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--product-end-->
@endsection