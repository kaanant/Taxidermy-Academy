@extends("site.layouts.master")


@section('content')
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h2>Sipariş Onay</h2>
            </div>
            <div class="contact-text">
                <div class="col-md-12 contact-right">
                    <form method="POST">


                        <div class="tabs">
                            <ul class="menu_drop">
                                <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
                                    <ul>
                                       <li class="subitem2">
                                           <a href="#">
                                               <input type="text" placeholder="Name">
                                               <input type="text" placeholder="Phone">
                                               <input type="text"  placeholder="Email">
                                           </a>
                                       </li>
                                    </ul>
                                </li>
                                <li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional information</a>
                                    <ul>
                                        <li class="subitem2">
                                            <a href="#">
                                                <textarea placeholder="Message" required=""></textarea>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="submit-btn">
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