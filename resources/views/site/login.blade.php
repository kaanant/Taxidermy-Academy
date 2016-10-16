@extends("site.layouts.master")



@section("content")
    <div class="account">
        <div class="container">
            <div class="account-main">
                <form method="post" action="{{action("Site\\AuthController@login")}}" role="form">
                    {{csrf_field()}}
                    <div class="col-md-6 account-left">
                        <h3>Giriş Yap</h3>
                        <div class="account-bottom">
                            <input placeholder="Email" name="email" id="email" type="text" tabindex="3" required>
                            <input placeholder="Şifre" name="password" id="password" type="password" tabindex="4" required>
                            <div class="address">
                                <a class="forgot" href="#">Şifremi Unuttum</a>
                                <input type="submit" value="Giriş Yap">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-6 account-right account-left">
                    <h3>Yeni kullanıcıysanız Kayıt Ol</h3>
                    <p>Sipariş verebilmek ve size daha iyi hizmet sunabilmemiz için lütfen kayıt olun</p>
                    <a href="{{action("Site\\AuthController@showregister")}}">Kayıt Ol</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <br>
            @include('errors.view_errors')
        </div>
    </div>
@endsection