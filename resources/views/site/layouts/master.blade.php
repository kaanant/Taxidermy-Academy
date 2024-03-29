<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Luxury Watches A Ecommerce Category Flat Bootstrap Resposive Website Template | Home :: w3layouts</title>
    @include('site.layouts.stylesheets')

</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">

            <div class="col-md-10 top-header-left">
                <div class="cart box_1 text-center">
                    <a href="{{action("Site\\CartController@showcart")}}">
                        <div class="total">
                            <span id="simpleCart_total">
                                {{ $cartTotalCost }}
                            </span>$
                        </div>
                        <img src="/images/cart-1.png" alt=""/>
                    </a>
                    <p>
                        <a href="javascript:;" class="simpleCart_empty">
                            Sepette <span id="aCartCount">{{ $cartCount}}</span> ürün var.
                        </a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
            @if(!auth()->check())
            <div class="col-md-2">
                <a href="{{action("Site\\AuthController@showlogin")}}">
                    <div class="col-sm-5 btn btn-link "  >
                            Giriş Yap /
                    </div>
                </a>

                <a href="{{action("Site\\AuthController@showregister")}}">
                    <div class="col-sm-6 btn btn-link" >
                            Kayıt Ol
                    </div>
                </a>
            </div>
            @else
            <div class="col-md-2">
                <div class="col-md-12">
                    Hosgeldin,
                    {{ucfirst(auth()->user()->name)}} {{ucfirst(auth()->user()->surname)}}
                </div>
                <a href="{{action("Site\\AuthController@logout")}}">
                    <div class="col-sm-10">
                        Çıkış Yap
                    </div>
                </a>
            </div>
            @endif


            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="{{action("Site\\IndexController@index")}}"><h1>VEDAT UĞURLU TAHNİT</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="{{action('Site\IndexController@index')}}">Home</a></li>
                        <li class="grid"><a href="#">Kategoriler</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4> <a href="{{action('Site\ProductController@showproducts')}}">Satılık Tahnitler</a></h4><hr>
                                        <ul style="width:200px;">
                                            @foreach($categories as $category)
                                            <li><a href="{{action('Site\ProductController@showproducts')}}?category_id[]={{ $category->id }}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h4>Fotoğraf Galerisi</h4><hr>
                                        <ul style="width:200px;">
                                            @foreach($categories as $category)
                                                <li><a href="products.html">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
                <hr>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <input type="text" value="Search" onfocus="this.value = '';"
                           onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!--bottom-header-->
<!--banner-starts-->
<div class="container">
    {{csrf_field()}}
    @yield('content')
</div>
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Information</h3>
                <ul>
                    <li><a href="#"><p>Specials</p></a></li>
                    <li><a href="#"><p>New Products</p></a></li>
                    <li><a href="#"><p>Our Stores</p></a></li>
                    <li><a href="contact.html"><p>Contact Us</p></a></li>
                    <li><a href="#"><p>Top Sellers</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>My Account</h3>
                <ul>
                    <li><a href="account.html"><p>My Account</p></a></li>
                    <li><a href="#"><p>My Credit slips</p></a></li>
                    <li><a href="#"><p>My Merchandise returns</p></a></li>
                    <li><a href="#"><p>My Personal info</p></a></li>
                    <li><a href="#"><p>My Addresses</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Store Information</h3>
                <h4>The company name,
                    <span>Lorem ipsum dolor,</span>
                    Glasglow Dr 40 Fe 72.</h4>
                <h5>+955 123 4567</h5>
                <p><a href="mailto:example@email.com">contact@example.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
                <form>
                    <input type="text" value="Enter Your Email" onfocus="this.value = '';"
                           onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="col-md-6 footer-right">
                <p>© 2015 Luxury Watches. All Rights Reserved | Design by <a href="http://w3layouts.com/"
                                                                             target="_blank">W3layouts</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--Slider-Starts-Here-->

@include('site.layouts.corescripts')
@yield('footer')

<!--End-slider-script-->
<!--footer-end-->
</body>
</html>