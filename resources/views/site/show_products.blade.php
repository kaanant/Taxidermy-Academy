@extends('site.layouts.master')


@section('content')
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                    <div class="product-top">
                        @foreach($products->chunk(4) as $chunkedProducts)
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
                    <div class="text-center">
                        {{ $products->links() }}
                    </div>

                </div>
                <div class="col-md-3 single-right">
                    <form action="{{ action('Site\\ProductController@showproducts') }}" method="GET">
                        <div class="w_sidebar">
                        <section  class="sky-form">
                            <h4>Kategoriler</h4>
                            <div class="row1 scroll-pane">
                                @foreach($categories as $category)
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="{{$category->id}}" ><i></i>{{$category->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        <section class="sky-form">
                            <h4>İndirim</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="60" checked=""><i></i>%60 ve üstü</label>
                                    <label class="radio"><input type="radio" name="50_40"><i></i>%50 ve üstü</label>
                                    <label class="radio"><input type="radio" name="40_30"><i></i>%40 ve üstü  </label>
                                    <label class="radio"><input type="radio" name="30_20"><i></i>%30 ve üstü  </label>
                                    <label class="radio"><input type="radio" name="20_0"><i></i>%30 altı</label>
                                </div>
                            </div>
                        </section>
                            <div class="text-center">
                                <button type="submit" class="submit">Test</button>
                            </div>
                    </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@endsection


@section('footer')
    <script type="text/javascript">
        $(function () {

            var menu_ul = $('.menu_drop > li > ul'),
                    menu_a = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function (e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true, true).slideUp('normal');
                }
            });

        });
    </script>
@endsection