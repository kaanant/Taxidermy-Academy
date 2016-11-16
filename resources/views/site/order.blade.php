@extends("site.layouts.master")


@section('content')
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h2>Sipariş Onay</h2>
            </div>
            <div class="contact-text">
                <div class="col-md-12 contact-right">
                    <form method="POST" action="{{action("Site\\OrderController@payment")}}">
                        {{csrf_field()}}
                        <div class="tabs">
                            <ul class="menu_drop">
                                <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Teslim Edilecek Kişi</a>
                                    <ul>
                                       <li class="subitem2">
                                           <a href="#">
                                               <input type="text"  style="margin-top:10px; height: 50px" id="name" name="name" placeholder="Adı">
                                               <input type="text" style="height: 50px" id="phone" name="phone" placeholder="Telefonu">
                                               <input type="text"  style="height: 50px" id="email" name="email" placeholder="Email">
                                           </a>
                                       </li>
                                    </ul>
                                </li>
                                <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Kargo Tipi</a>
                                    <ul>
                                        <li class="subitem2">
                                            <a href="#">
                                                <label for="delivery">
                                                    Parça Başına Kargo: <input type="radio" name="delivery" id="part_of" value="part_of"><br>
                                                    Hepsi Dahil Kargo: <input type="radio" name="delivery" id="complete" value="complete">
                                                </label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Ödeme Tipi</a>
                                    <ul>
                                        <li class="subitem2">
                                            <a href="#">
                                                <label for="delivery">
                                                    EFT/Havale: <input type="radio" name="payment" id="transfer" value="part_of"><br>
                                                    Kapıda Ödeme: <input type="radio" name="payment" id="selfpayment" value="complete">
                                                </label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Teslimat Adresi</a>
                                    <ul>
                                        <li class="subitem2">
                                            <a href="#">
                                                <textarea placeholder="Adres" id="address" name="address" style="height: 100px;" ></textarea>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                        </div>
                        <br>
                        <div class="submit-btn" style="margin-top: 10px; float: left;">
                            <input type="submit" value="SUBMIT">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
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

