@extends('site.layouts.master')



@section('content')
    <div class="register">
        <div class="container">
            <div class="register-top heading">
                <h2>Kayıt Ol</h2>
            </div>
            <form method="post" action="{{action("Site\\AuthController@register")}}" role="form">
                {{csrf_field()}}
             <div class="register-main">
                <div class="col-md-6 account-left">
                    <input placeholder="Email adresi" name="email" id="email" type="text" tabindex="3" required>
                    <input placeholder="Şifre" type="password" name="password" id="password" tabindex="4" required>
                    <input placeholder="Şifre Tekrar" name="password_confirmation" id="password_confirmation" type="password" tabindex="4" required>
                    <input placeholder="Cep Telefonu" name="phone" id="phone" type="text" tabindex="3">

                </div>
                <div class="col-md-6 account-left">
                    <input placeholder="İsim" name="name" id="name" type="text" tabindex="1" required>
                    <input placeholder="Soyad" name="surname" id="surname" type="text" tabindex="2" required>
                    <textarea placeholder="Adres" name="address" id="address" style="width: 488px;height:100px; resize: none;"  maxlength="200"></textarea>
                    <button type="submit" class="btn btn-success"> Kayıt Ol</button>
                </div>

                <div class="clearfix"></div>


                 @include("errors.view_errors")

            </div>
            </form>

        </div>
    </div>
@endsection