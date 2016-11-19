@extends("site.layouts.master")


@section('content')
    <div class="container">
        <div class="contact-top heading">
            <h2>Sipariş Onay</h2>
        </div>
        <div class="contact-text">
            <div class="col-md-12 contact-right">
                <form method="POST" action="{{action("Site\\OrderController@payment")}}">
                {{csrf_field()}}
                <div class="heading " style="margin-top: 1px">
                    <h3 class="ghj">Teslim Edilecek Kişi Bilgisi</h3>
                </div>
                <div class="contact-text">
                        <input type="text" name="shipment_name" placeholder="İsim Soyisim">
                        <input type="text" name="shipment_phone" placeholder="Telefon">
                        <input type="text" name="shipment_email" placeholder="Email">
                    <div class="clearfix"></div>
                </div>
                <hr>
                <div class=" heading " style=>
                    <h3 class="ghj">Kargo Tipi</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="radio">
                                <label for="part_of" class="text-muted" style="font-size: large">
                                    <input type="radio" name="delivery" id="part_of"
                                           value="part_of">
                                    Parça Başına Kargo
                                </label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label for="complete" class="text-muted" style="font-size: large">
                                    <input type="radio" name="delivery" id="complete"
                                           value="complete">
                                    Hepsi Dahil Kargo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class=" heading " style=>
                    <h3 class="ghj">Ödeme Tipi</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="radio">
                                <label for="part_of" class="text-muted" style="font-size: large">
                                    <input type="radio" name="payment" id="transfer"
                                           value="transfer">
                                    EFT/Banka Ödemesi
                                </label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="radio">
                                <label for="complete" class="text-muted" style="font-size: large">
                                    <input type="radio" name="payment" id="cash"
                                           value="cash">
                                    Kapıda Ödeme
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class=" heading " style=>
                    <h3 class="ghj">Teslimat Adresi</h3>
                    @foreach($user->address as $address)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label for="address" class="text-muted" style="font-size: large">
                                        <input type="radio" name="address" id="delivery_address"
                                               value="{{$address->id}}">
                                        {{$address->address}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <div class="radio">
                                <label for="address" class="text-muted" style="font-size: large">
                                    <input type="radio" name="address" id="new_address"
                                           value="new_address">
                                    Yeni Adres
                                </label>
                                <textarea placeholder="Adres" id="new_address" name="new_address"
                                          class="col-md-1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="submit-btn" style=" margin-bottom: 80px; float: right;">
                    <input type="submit" value="Sipariş Ver">
                </div>
                </form>
            </div>
            <div class="clearfix"></div>
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

