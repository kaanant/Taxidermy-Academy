@extends("site.layouts.master")


@section('content')
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h2>Sipariş Onay</h2>
            </div>
            <div class="contact-text">
                <div class="col-md-12 contact-right">
                    <form>
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Phone">
                        <input type="text"  placeholder="Email">
                        <textarea placeholder="Message" required=""></textarea>
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