@extends('site.layouts.master')


@section('content')

<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="/images/s-1.jpg">
                                    <div class="thumb-image"> <img src="/images/s-1.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <li data-thumb="/images/s-2.jpg">
                                    <div class="thumb-image"> <img src="/images/s-2.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <li data-thumb="/images/s-3.jpg">
                                    <div class="thumb-image"> <img src="/images/s-3.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2>{{$product->name}}</h2>

                            <h5 class="item_price">{{$product->discount}} TL</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                            <ul class="tag-men">
                                <li><span>STOK DURUMU</span>
                                    <span >: @if ($product->stock ==0)
                                                 Stokta Bulunmamaktadır
                                             @else
                                                 {{$product->stock}}
                                             @endif
                                    </span></li>
                                <li><span>TAG</span>
                                    <span>: TAG!!! </span></li>
                                <li><span>MARKA</span>
                                    <span>: {{$product->brand}} </span>
                                <li><span>KALİTE</span>
                                    <span>:
                                    @if($product->product_quality == 0)
                                        Çok Düşük
                                    @elseif($product->product_quality == 1)
                                        Düşük
                                    @elseif($product->product_quality == 2)
                                        Orta
                                    @elseif($product->product_quality == 3)
                                        Yüksek
                                    @else
                                        Çok Yüksek
                                    @endif
                                    </span></li>
                                <li><span>Ürün Kodu</span>
                                    <span>: {{$product->product_key}} </span>


                            </ul>
                            <a href="#" class="add-cart item_add">Sepete Ekle</a>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="tabs">
                    <ul class="menu_drop">
                        <li class="item1"><a href="#"><img src="/images/arrow.png" alt="">Açıklama</a>
                            <ul>
                                <li class="subitem1"><a href="#"> Ürün Açıklaması</a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="#"><img src="/images/arrow.png" alt="">Sertifika</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 single-right">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    <script type="text/javascript">
        $(function() {

            var menu_ul = $('.menu_drop > li > ul'),
                    menu_a  = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });

        });
    </script>
    <!-- FlexSlider -->
    <script src="/js/imagezoom.js"></script>
    <script defer src="/js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails",
                directionNav: false
            });
        });
    </script>

@endsection
