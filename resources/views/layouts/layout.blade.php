<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/datepicker3.css" rel="stylesheet">
    <link href="/css/styles2.css" rel="stylesheet">

    <!--Icons-->
    <script src="/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->

    @yield('header')

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>VU</span>TAXIDERMY</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ auth()->user()->name }} {{ auth()->user()->surname }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                        <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                        <li><a href="{{ action("Admin\\AuthController@logout") }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="{{ setActive('admin/index', $request) }}"><a href="{{ action("Admin\\DashController@index") }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Kontrol Paneli</a></li>
        <li class="{{ setActive('admin/products', $request) }}"><a href="{{ action("Admin\\ProductController@index") }}"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Ürünler</a></li>
        <li class="{{ setActive('admin/orders', $request) }}"><a href="{{ action("Admin\\OrderController@index") }}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Siparişler</a></li>
        <li class="{{ setActive('admin/categories', $request) }}"><a href="{{ action("Admin\\CategoryController@index") }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Kategoriler</a></li>
        <li ><a href="{{action('Admin\\AlbumController@getList')}}"><svg class="glyph stroked camera"><use xlink:href="#stroked-camera"></use></svg> Galeri</a></li>
    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


    @yield('content')

</div>


<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootbox.min.js"></script>
<script src="/js/bootstrap-notify.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
</script>

@yield('scripts')

</body>

</html>