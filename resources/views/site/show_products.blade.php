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
                                            <a href="{{ action('Site\\ProductController@productdetail', [$product->id]) }}" class="mask">
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
                                    <label class="checkbox">
                                        <input type="checkbox" {{ in_array($category->id, $request->get('category_id', [])) ? 'checked' : null }} name="category_id[]" value="{{$category->id}}" >
                                        <i></i>{{$category->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        <section class="sky-form">
                            <h4>Fiyat</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <p>
                                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                    </p>
                                    <input type="hidden" name="price" id="priceHidden">
                                    <div id="slider-range" >

                                    </div>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ {{ $downPrice ?: 0 }}, {{ $upPrice ?: 500 }} ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );

                    $('#priceHidden').val(ui.values[0] + ',' + ui.values[1]);
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                    " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        } );
    </script>
@endsection