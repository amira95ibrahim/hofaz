@extends('front.layout.main')

@push('styles')
<style>
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font: inherit;
        font-size: 100%;
        vertical-align: baseline;
    }

    html {
        line-height: 1;
    }

    ol, ul {
        list-style: none;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    caption, th, td {
        text-align: left;
        font-weight: normal;
        vertical-align: middle;
    }

    q, blockquote {
        quotes: none;
    }
    q:before, q:after, blockquote:before, blockquote:after {
        content: "";
        content: none;
    }

    a img {
        border: none;
    }

    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
        display: block;
    }

    * {
        box-sizing: border-box;
    }

    body {
        color: #333;
        -webkit-font-smoothing: antialiased;
        font-family: 'Baloo Bhaijaan 2', cursive;
    }

    img {
        max-width: 100%;
    }

    .cf:before, .cf:after {
        content: " ";
        display: table;
    }

    .cf:after {
        clear: both;
    }

    .cf {
        *zoom: 1;
    }

    .wrap {
        width: 75%;
        max-width: 960px;
        margin: 0 auto;
        padding: 5% 0;
        margin-bottom: 5em;
    }

    .projTitle {
        font-weight: bold;
        text-align: center;
        font-size: 2em;
        padding: 1em 0;
        border-bottom: 1px solid #dadada;
        letter-spacing: 3px;
        text-transform: uppercase;
    }
    .projTitle span {
        font-family: 'Baloo Bhaijaan 2', cursive;
        font-weight: normal;
        font-style: italic;
        text-transform: lowercase;
        color: #777;
    }

    .heading {
        padding: 1em 0;
        border-bottom: 1px solid #D0D0D0;
    }
    .heading h1 {
        font-family: 'Baloo Bhaijaan 2', cursive;
        font-size: 2em;
        float: left;
    }
    .heading a.continue:link, .heading a.continue:visited {
        text-decoration: none;
        font-family: 'Baloo Bhaijaan 2', cursive;
        letter-spacing: -.015em;
        font-size: .75em;
        padding: 1em;
        color: #fff;
        background: #82ca9c;
        font-weight: bold;
        border-radius: 50px;
        float: right;
        text-align: right;
        -webkit-transition: all 0.25s linear;
        -moz-transition: all 0.25s linear;
        -ms-transition: all 0.25s linear;
        -o-transition: all 0.25s linear;
        transition: all 0.25s linear;
    }
    .heading a.continue:after {
        content: "\276f";
        padding: .5em;
        position: relative;
        right: 0;
        -webkit-transition: all 0.15s linear;
        -moz-transition: all 0.15s linear;
        -ms-transition: all 0.15s linear;
        -o-transition: all 0.15s linear;
        transition: all 0.15s linear;
    }
    .heading a.continue:hover, .heading a.continue:focus, .heading a.continue:active {
        background: #f69679;
    }
    .heading a.continue:hover:after, .heading a.continue:focus:after, .heading a.continue:active:after {
        right: -10px;
    }

    .tableHead {
        display: table;
        width: 100%;
        font-size: .75em;
    }
    .tableHead li {
        display: table-cell;
        padding: 1em 0;
        text-align: center;
    }
    .tableHead li.prodHeader {
        text-align: left;
    }

    .cart {
        padding: 1em 0;
    }
    .cart .items {
        display: block;
        width: 100%;
        vertical-align: middle;
        padding: 1.5em;
        border-bottom: 1px solid #fafafa;
    }
    .cart .items.even {
        background: #fafafa;
    }
    .cart .items .infoWrap {
        display: table;
        width: 100%;
    }
    .cart .items .cartSection {
        display: table-cell;
    }
    .cart .items .cartSection .itemNumber {
        font-size: .75em;
        color: #777;
        margin-bottom: .5em;
    }
    .cart .items .cartSection h3 {
        font-size: 17px;
        font-family: 'Baloo Bhaijaan 2', cursive;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: .025em;
        margin-top: 5%;
        width: 150px;
    }
    .cart .items .cartSection p {
        display: inline-block;
        font-size: .85em;
        color: #777777;
        font-family: 'Baloo Bhaijaan 2', cursive;
    }
    .cart .items .cartSection p .quantity {
        font-weight: bold;
        color: #333;
    }
    .cart .items .cartSection p.stockStatus {
        color: #82CA9C;
        font-weight: bold;
        padding: .5em 0 0 1em;
        text-transform: uppercase;
    }
    .cart .items .cartSection p.stockStatus.out {
        color: #F69679;
    }
    .cart .items .cartSection .itemImg {
        width: 4em;
        float: left;
    }
    .cart .items .cartSection.qtyWrap, .cart .items .cartSection.prodTotal {
        text-align: center;
    }
    .cart .items .cartSection.qtyWrap p, .cart .items .cartSection.prodTotal p {
        font-weight: bold;
        font-size: 1.25em;
    }
    .cart .items .cartSection input.qty {
        width: 2em;
        text-align: center;
        font-size: 1em;
        padding: .25em;
        margin: 1em .5em 0 0;
    }
    .cart .items .cartSection .itemImg {
        width: 8em;
        display: inline;
        padding-right: 1em;
        right: 43%;
        position: absolute;
    }

    .special {
        display: block;
    }
    .special .specialContent {
        padding: 1em 1em 0;
        display: block;
        margin-top: .5em;
        border-top: 1px solid #dadada;
    }
    .special .specialContent:before {
        content: "\21b3";
        font-size: 1.5em;
        margin-right: 1em;
        color: #6f6f6f;
    }

    a.remove {
        text-decoration: none;
        font-family: 'Baloo Bhaijaan 2', cursive;
        color: #ffffff;
        font-weight: bold;
        background: #e0e0e0;
        padding: .5em;
        font-size: .75em;
        display: inline-block;
        border-radius: 100%;
        line-height: .85;
        -webkit-transition: all 0.25s linear;
        -moz-transition: all 0.25s linear;
        -ms-transition: all 0.25s linear;
        -o-transition: all 0.25s linear;
        transition: all 0.25s linear;
    }
    a.remove:hover {
        background: #f30;
    }

    .promoCode {
        border: 2px solid #efefef;
        float: left;
        width: 35%;
        padding: 2%;
    }
    .promoCode label {
        display: block;
        width: 100%;
        font-style: italic;
        font-size: 1.15em;
        margin-bottom: .5em;
        letter-spacing: -.025em;
    }
    .promoCode input {
        width: 85%;
        font-size: 1em;
        padding: .5em;
        float: left;
        border: 1px solid #dadada;
    }
    .promoCode input:active, .promoCode input:focus {
        outline: 0;
    }
    .promoCode a.btn {
        float: left;
        width: 15%;
        padding: .75em 0;
        border-radius: 0 1em 1em 0;
        text-align: center;
        border: 1px solid #82ca9c;
    }
    .promoCode a.btn:hover {
        border: 1px solid #f69679;
        background: #f69679;
    }

    .btn:link, .btn:visited {
        text-decoration: none;
        font-family: 'Baloo Bhaijaan 2', cursive;
        letter-spacing: -.015em;
        font-size: 1em;
        padding: 1em 3em;
        color: #fff;
        background: #F26522;
        font-weight: bold;
        border-radius: 50px;
        float: right;
        text-align: right;
        -webkit-transition: all 0.25s linear;
        -moz-transition: all 0.25s linear;
        -ms-transition: all 0.25s linear;
        -o-transition: all 0.25s linear;
        transition: all 0.25s linear;
    }
    .btn:hover, .btn:focus, .btn:active {
        background: #fff;
        border: 1px solid #F26522;
        color: #F26522;
    }
    .btn:hover:after, .btn:focus:after, .btn:active:after {
        right: -10px;
    }
    .promoCode .btn {
        font-size: .85em;
        paddding: .5em 2em;
    }

    /* TOTAL AND CHECKOUT  */
    .subtotal {
        float: left;
        width: 35%;
        padding-right: 1%;
    }
    .subtotal .totalRow {
        padding: .5em;
        text-align: right;
    }
    .subtotal .totalRow.final {
        font-size: 1.25em;
        font-weight: bold;
    }
    .subtotal .totalRow span {
        display: inline-block;
        padding: 0 0 0 1em;
        text-align: right;
    }
    .subtotal .totalRow .label {
        font-family: 'Baloo Bhaijaan 2', cursive;
        font-size: .85em;
        text-transform: uppercase;
        color: #777;
    }
    .subtotal .totalRow .value {
        letter-spacing: -.025em;
        width: 40%;
    }

    @media only screen and (max-width: 39.375em) {
        .wrap {
            width: 98%;
            padding: 2% 0;
        }

        .projTitle {
            font-size: 1.5em;
            padding: 10% 5%;
        }

        .heading {
            padding: 1em;
            font-size: 90%;
        }

        .cart .items .cartSection {
            width: 90%;
            display: block;
            float: left;
        }
        .cart .items .cartSection.qtyWrap {
            width: 10%;
            text-align: center;
            padding: .5em 0;
            float: right;
        }
        .cart .items .cartSection.qtyWrap:before {
            content: "QTY";
            display: block;
            font-family: 'Baloo Bhaijaan 2', cursive;
            padding: .25em;
            font-size: .75em;
        }
        .cart .items .cartSection.prodTotal, .cart .items .cartSection.removeWrap {
            display: none;
        }
        .cart .items .cartSection .itemImg {
            width: 25%;
        }

        .promoCode, .subtotal {
            width: 100%;
        }

        a.btn.continue {
            width: 100%;
            text-align: center;
        }
    }

</style>
@endpush

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        @if(session()->has('error'))
            <p class="alert alert-danger">{{ session()->get('error') }}</p>
        @endif
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8"
                 data-bg-img="{{ asset('images/bg/bg2.jpg') }}">
            <div class="container pt-90 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.shop_cart')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.shop_cart')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="wrap cf">
            <div class="cart">
                <ul class="cartWrap">
                    @php($index = 1)
                    <li class="items even">
                        <div class="infoWrap">
                            <div class="cartSection">
                                <h3>الاسم/المشروع</h3>
                            </div>
                            <div class="prodTotal cartSection" style="padding-left: 24%;">
                                <p>المبلغ</p>
                            </div>
                            <div class="cartSection removeWrap">
                            </div>
                        </div>
                    </li>
                    @foreach ($cartItems as $item)
                        <li class="items {{ ($index % 2 == 0) ? 'even' : 'odd' }}">
                            <div class="infoWrap">
                                <div class="cartSection">
                                    <img src="{{ asset($item->attributes->image) }}" alt="" class="itemImg" />
                                    <h3>{{ $item->name }}</h3>
                                </div>
                                <div class="prodTotal cartSection">
                                    <p><span id="{{ $item->id . '_price' }}"  data-price="{{ $item->price }}">{{ number_format($item->price) }}</span> @lang('waqf.KWD')</p>
                                </div>
                                <div class="cartSection removeWrap">
                                    <a href="#" class="remove" data-identifier="{{ $item->id }}">x</a>
                                </div>
                            </div>
                        </li>
                        @php(++$index)
                    @endforeach
                </ul>
            </div>

            <div class="subtotal cf">
                <ul>
                    <li class="totalRow final"><span class="label">الاجمالي</span><span id="cartTotal" data-price="{{ Cart::getTotal() }}">{{ number_format(Cart::getTotal()) }}</span> <span class="value">@lang('waqf.KWD')</span></li>
                    <li class="totalRow"><a href="{{ route('payment') }}" class="btn continue">اتمام التبرع</a></li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        // Remove Items From Cart
        $('a.remove').click(function(){
            event.preventDefault();

            let $counter, val;
            $counter = $('.notification-counter');
            val = parseInt($counter.text());
            $counter.fadeTo( "slow" , 0.1);
            val--;

            $(this).parent().parent().parent().hide(400);
            let identifier = $(this).attr('data-identifier');
            let itemPrice = parseInt($('#' + identifier + '_price').attr('data-price'));
            let cartTotal = $('#cartTotal');
            let totalPrice = parseInt(cartTotal.attr('data-price'));
            let newTotal = totalPrice - itemPrice;
            cartTotal.html(newTotal.toLocaleString('en-US')).attr('data-price', newTotal);

            $.ajax({
                url: '{{ route('cart.remove') }}',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {id: identifier},
                success: function () {
                    $counter.text(val);
                    $counter.fadeTo( "slow" , 1);
                },
            });
        });

        // Just for testing, show all items
        $('a.btn.continue').click(function(){
            $('li.items').show(400);
        });
    </script>
@endpush
