@extends('front.layout.main')

@push('styles')
    <style>
        #debt-amount-slider {
            display: flex;
            flex-direction: row;
            align-content: stretch;
            position: relative;
            width: 100%;
            height: 50px;
            user-select: none;
        }

        #debt-amount-slider::before {
            content: " ";
            position: absolute;
            height: 2px;
            width: 100%;
            width: calc(100% * (2 / 3));
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #F26522;
        }

        #debt-amount-slider input,
        #debt-amount-slider label {
            box-sizing: border-box;
            flex: 1;
            user-select: none;
            cursor: pointer;
        }

        #debt-amount-slider label {
            display: inline-block;
            position: relative;
            width: 20%;
            height: 100%;
            user-select: none;
        }

        #debt-amount-slider label::before {
            content: attr(data-debt-amount);
            position: absolute;
            left: 50%;
            padding-top: 10px;
            transform: translate(-50%, 45px);
            font-size: 14px;
            letter-spacing: 0.4px;
            font-weight: 400;
            white-space: nowrap;
            opacity: 0.85;
            transition: all 0.15s ease-in-out;
        }

        #debt-amount-slider label::after {
            content: " ";
            position: absolute;
            left: 51%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 30px;
            height: 30px;
            border: 2px solid #F26522;
            background: #fff;
            border-radius: 50%;
            pointer-events: none;
            user-select: none;
            z-index: 1;
            cursor: pointer;
            transition: all 0.15s ease-in-out;
        }

        #debt-amount-slider label:hover::after {
            transform: translate(-50%, -50%) scale(1.25);
        }

        #debt-amount-slider input {
            display: none;
        }

        #debt-amount-slider input:checked+label::before {
            font-weight: 800;
            opacity: 1;
        }

        #debt-amount-slider input:checked+label::after {
            border-width: 4px;
            transform: translate(-50%, -50%) scale(0.75);
        }

        #debt-amount-slider input:checked~#debt-amount-pos {
            opacity: 1;
        }

        #debt-amount-slider input:checked:nth-child(1)~#debt-amount-pos {
            right: 14.1%;
        }

        #debt-amount-slider input:checked:nth-child(3)~#debt-amount-pos {
            right: 47.4%;
        }

        #debt-amount-slider input:checked:nth-child(5)~#debt-amount-pos {
            right: 80.9%;
        }

        /*#debt-amount-slider input:checked:nth-child(7) ~ #debt-amount-pos {*/
        /*    right: 85%;*/
        /*}*/

        /*#debt-amount-slider input:checked:nth-child(9) ~ #debt-amount-pos {*/
        /*    right: 90%;*/
        /*}*/
        #debt-amount-slider #debt-amount-pos {
            display: block;
            position: absolute;
            top: 50%;
            width: 12px;
            height: 12px;
            background: #F26522;
            border-radius: 50%;
            transition: all 0.15s ease-in-out;
            transform: translate(-50%, -50%);
            border: 2px solid #fff;
            opacity: 0;
            z-index: 2;
        }

        form:valid #debt-amount-slider input+label::before {
            transform: translate(-50%, 45px) scale(0.9);
            transition: all 0.15s linear;
        }

        form:valid #debt-amount-slider input:checked+label::before {
            transform: translate(-50%, 45px) scale(1.1);
            transition: all 0.15s linear;
        }

        form+button {
            display: block;
            position: relative;
            margin: 56px auto 0;
            padding: 10px 20px;
            appearance: none;
            transition: all 0.15s ease-in-out;
            font-family: inherit;
            font-size: 24px;
            font-weight: 600;
            background: #F26522;
            border: 2px solid #000;
            border-radius: 8px;
            outline: 0;
            user-select: none;
            cursor: pointer;
        }

        form+button:hover {
            background: #F26522;
            color: #fff;
        }

        form+button:hover:active {
            transform: scale(0.9);
        }

        form+button:focus {
            background: #4caf50;
            border-color: #4caf50;
            color: #fff;
            pointer-events: none;
        }

        form+button:focus::before {
            animation: spin 1s linear infinite;
        }

        form+button::before {
            display: inline-block;
            width: 0;
            opacity: 0;
            content: "\f3f4";
            font-family: "Font Awesome 5 Pro";
            font-weight: 900;
            margin-right: 0;
            transform: rotate(0deg);
        }

        form:invalid+button {
            pointer-events: none;
            opacity: 0.25;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
                width: 24px;
                opacity: 1;
                margin-right: 12px;
            }

            to {
                transform: rotate(360deg);
                width: 24px;
                opacity: 1;
                margin-right: 12px;
            }
        }

        .select-amount {
            margin-right: 6%;
        }

        #donation_period input[type=radio] {
            position: absolute;
            visibility: hidden;
            display: none;
        }

        #donation_period label {
            color: #9a929e;
            display: inline-block;
            cursor: pointer;
            font-weight: bold;
            padding: 5px 40px;
        }

        #donation_period input[type=radio]:checked+label {
            color: #FFFFFF;
            background: #F26522;
        }

        #donation_period label+input[type=radio]+label {
            /*border-left: solid 3px #675f6b;*/
        }

        #donation_period .radio-group {
            /*border: solid 3px #675f6b;*/
            display: inline-block;
            margin: 20px;
            /*border-radius: 10px;*/
            overflow: hidden;
            width: 95%;
        }
    </style>
@endpush

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/bg/bg2.jpg') }}">
            <div class="container pt-90 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('donation.donate')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.donate')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: DonetForm & Testimonials -->
        <section>
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h3 class="mt-0 line-bottom">@lang('donation.testimonials')</h3>
                            <div class="testimonial style1 owl-carousel owl-nav-top">
                                @foreach ($testimonial as $item)
                                    <div class="item">
                                        <div class="comment bg-theme-colored">
                                            <p>{{ $item->testimonial }}</p>
                                        </div>
                                        <div class="content mt-20">
                                            <div class="thumb pull-right">
                                                <img class="img-circle" alt="" src="{{ asset($item->image) }}">
                                            </div>
                                            <div class="patient-details text-right pull-right mr-20 mt-10">
                                                <h5 class="author text-theme-colored">{{ $item->name }}</h5>
                                                <h6 class="title">{{ $item->job }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <h3 class="mt-0 line-bottom">@lang('donation.make_donation')<span class="font-weight-300">
                                    @lang('donation.now')!</span>
                            </h3>

                            <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
                            <form action=" {{ route('PeriodicDonation') }} "  method="POST"
                                id="leenpopup_paypal_donate_form_onetime_recurring">
                                @csrf
                                <div class="row">
                                    {{--                                <div class="col-md-12"> --}}
                                    {{--                                    <img src="{{ asset('images/payment-card-logo-sm.png') }}" alt=""> --}}
                                    {{--                                    <div class="form-group mt-20 mb-20"> --}}
                                    {{--                                        <label><strong>Payment Type</strong></label> <br> --}}
                                    {{--                                        <label class="radio-inline"> --}}
                                    {{--                                            <input type="radio" checked="" value="one_time" name="payment_type"> --}}
                                    {{--                                            One Time --}}
                                    {{--                                        </label> --}}
                                    {{--                                        <label class="radio-inline"> --}}
                                    {{--                                            <input type="radio" value="recurring" name="payment_type"> --}}
                                    {{--                                            Recurring --}}
                                    {{--                                        </label> --}}
                                    {{--                                    </div> --}}
                                    {{--                                </div> --}}

                                    <div class="col-sm-12 mb-40" id="donation_type_choice">
                                        <div class="form-group mb-20">
                                            <label><strong>@lang('donation.donation_type')</strong></label>
                                            <div class="radio mt-5">
                                                <div id="debt-amount-slider">
                                                    <input type="radio" id="frequency1" value="Daily" name="frequency" required checked="">
                                                    <label for="frequency1" data-frequency="Daily">@lang('donation.daily')</label>
                                                    <input type="radio" id="frequency2" value="Weekly" name="frequency" required>
                                                    <label for="frequency2" data-frequency="Weekly">@lang('donation.weekly')</label>
                                                    <input type="radio" id="frequency3" value="Monthly" name="frequency" required>
                                                    <label for="frequency3" data-frequency="Monthly">@lang('donation.monthly')</label>
                                                    {{-- <input type="radio" name="debt-amount" id="4" value="4" required> --}}
                                                    {{-- <label for="4" data-debt-amount="@lang('donation.yearly')"></label> --}}
                                                    <div id="debt-amount-pos"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="donation_period">
                                        <div>
                                            <strong>@lang('donation.donation_period')</strong>
                                        </div>

                                        <div class="radio-group">
                                            <input type="radio" id="option-one" name="duration" value="6" checked>
                                            <label for="option-one">@lang('donation.six_months')</label>

                                            <input type="radio" id="option-two" name="duration" value="12">
                                            <label for="option-two">@lang('donation.year')</label>

                                            <input type="radio" id="option-three" name="duration" value="24">
                                            <label for="option-three">@lang('donation.two_years')</label>

                                            <input type="radio" id="option-four" name="duration" value="0">
                                            <label for="option-four">@lang('donation.continues')</label>
                                        </div>
                                        {{-- <input type="hidden" name="frequency" id="frequency" value=""> --}}

                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group mb-20">
                                            <label><strong>@lang('donation.i_want_donate_for')</strong></label>
                                            <select name="item_name" class="form-control br-20">
                                                <option value="Educate Children">@lang('donation.educate_children')</option>
                                                <option value="Child Camps">@lang('donation.child_camps')</option>
                                                <option value="Clean Water for Life">@lang('donation.clean_water_for_life')</option>
                                                <option value="Campaign for Child Poverty">@lang('donation.campaign_for_child')</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-40">
                                        <div class="donation-amount">
                                            <h5>@lang('donation.choose_donation_amount')</h5>
                                            <div class="select-amount">
                                                <div class="button">
                                                    <input type="radio" id="a25" name="amount" value="10">
                                                    <label class="btn btn-default" for="a25">10 @lang('donation.KWD')</label>
                                                </div>
                                                <div class="button">
                                                    <input type="radio" id="a50" name="amount" value="20">
                                                    <label class="btn btn-default" for="a50">20 @lang('donation.KWD')</label>
                                                </div>
                                                <div class="button">
                                                    <input type="radio" id="a75" name="amount" value="30">
                                                    <label class="btn btn-default" for="a75">30 @lang('donation.KWD')</label>
                                                </div>
                                                <div class="button">
                                                    <input type="radio" id="a100" name="amount" value="50">
                                                    <label class="btn btn-default" for="a100">50 @lang('donation.KWD')</label>
                                                </div>
                                            </div>
                                            <div class="or mt-1 mb-10"> - @lang('donation.or') -</div>
                                            <div class="mt-1">
                                                <div class="input-group">
                                                    <input type="text" value="" name="custom_amount" placeholder="@lang('donation.enter_amount')" class="form-control input-lg font-16" data-height="45px" style="height: 45px;">
                                                    <span class="input-group-btn">
                                                        <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="button" style="height: 45px;">@lang('donation.KWD')</button>
                                                    </span>
                                                </div>
                                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30 w-100"
                                data-loading-text="Please wait...">@lang('donation.donate_now')</button>
                        </div>
                    </div>
                </form>
                </div>


                <!-- Paypal Onetime Form -->
                {{-- <form id="popup_paypal_donate_form-onetime" class="hidden" action="https://www.paypal.com/cgi-bin/webscr"
                    method="post">
                    <input type="hidden" name="cmd" value="_donations">
                    <input type="hidden" name="business" value="accounts@thememascot.com">

                    <input type="hidden" name="item_name" value="Educate Children">
                    <!-- updated dynamically -->
                    <input type="hidden" name="currency_code" value="USD"> <!-- updated dynamically -->
                    <input type="hidden" name="amount" value="20"> <!-- updated dynamically -->

                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="cn" value="Comments...">
                    <input type="hidden" name="tax" value="0">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="bn" value="PP-DonationsBF">
                    <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html">
                    <input type="hidden" name="cancel_return" value="http://www.yoursite.com/paymentcancel.html">
                    <input type="hidden" name="notify_url" value="http://www.yoursite.com/notifypayment.php">
                    <input type="submit" name="submit">
                </form> --}}

                <!-- Paypal Recurring Form -->
                {{-- <form id="popup_paypal_donate_form-recurring" class="hidden"
                    action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick-subscriptions">
                    <input type="hidden" name="business" value="accounts@thememascot.com">

                    <input type="hidden" name="item_name" value="Educate Children">
                    <!-- updated dynamically -->
                    <input type="hidden" name="currency_code" value="USD"> <!-- updated dynamically -->
                    <input type="hidden" name="a3" value="20"> <!-- updated dynamically -->
                    <input type="hidden" name="t3" value="D"> <!-- updated dynamically -->


                    <input type="hidden" name="p3" value="1">
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="src" value="1">
                    <input type="hidden" name="sra" value="1">
                    <input type="hidden" name="no_shipping" value="0">
                    <input type="hidden" name="no_note" value="1">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="bn" value="PP-DonationsBF">
                    <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html">
                    <input type="hidden" name="cancel_return" value="http://www.yoursite.com/paymentcancel.html">
                    <input type="hidden" name="notify_url" value="http://www.yoursite.com/notifypayment.php">
                    <input type="submit" name="submit">
                </form> --}}
                <!-- ===== END: Paypal Both Onetime/Recurring Form ===== -->
            </div>
    </div>
    </div>
    </div>
    </section>

    <!-- Section: Causes -->
    {{--    <section class="bg-silver-light"> --}}
    {{--        <div class="container"> --}}
    {{--            <div class="section-title text-center"> --}}
    {{--                <div class="row"> --}}
    {{--                    <div class="col-md-8 col-md-offset-2"> --}}
    {{--                        <h2 class="text-uppercase line-bottom-center mt-0">Our <span class="text-theme-colored">Causes</span></h2> --}}
    {{--                        <div class="title-flaticon"> --}}
    {{--                            <i class="flaticon-charity-alms"></i> --}}
    {{--                        </div> --}}
    {{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p> --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--            <div class="row"> --}}
    {{--                <div class="col-md-12"> --}}
    {{--                    <div class="owl-carousel" data-dots="true"> --}}
    {{--                        <div class="item"> --}}
    {{--                            <div class="causes bg-silver-light maxwidth500 mb-30"> --}}
    {{--                                <div class="thumb"> --}}
    {{--                                    <img src="{{ asset('images/project/1.jpg') }}" alt="" class="img-fullwidth"> --}}
    {{--                                </div> --}}
    {{--                                <div class="causes-details border-1px bg-white clearfix p-15 pb-30"> --}}
    {{--                                    <h4 class="font-16 text-uppercase"><a href="page-single-cause.html">Education for Childreen</a></h4> --}}
    {{--                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-10"> --}}
    {{--                                        <li class="pull-left font-weight-400 text-black-333 pr-0">Raised: <span class="text-theme-colored font-weight-700">$2860</span></li> --}}
    {{--                                        <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> --}}
    {{--                                    </ul> --}}
    {{--                                    <div class="progress-item mt-10"> --}}
    {{--                                        <div class="progress mb-0"> --}}
    {{--                                            <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                    <p class="mt-15">Lorem ipsum dolor sit ametconse adipisicing elit. Praesent quossrs it.Lorem ipsum dolor is emmit </p> --}}
    {{--                                    <a href="page-donate.html" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> --}}
    {{--                                </div> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                        <div class="item"> --}}
    {{--                            <div class="causes bg-silver-light maxwidth500 mb-30"> --}}
    {{--                                <div class="thumb"> --}}
    {{--                                    <img src="{{ asset('images/project/1.jpg') }}" alt="" class="img-fullwidth"> --}}
    {{--                                </div> --}}
    {{--                                <div class="causes-details border-1px bg-white clearfix p-15 pb-30"> --}}
    {{--                                    <h4 class="font-16 text-uppercase"><a href="page-single-cause.html">Education for Childreen</a></h4> --}}
    {{--                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-10"> --}}
    {{--                                        <li class="pull-left font-weight-400 text-black-333 pr-0">Raised: <span class="text-theme-colored font-weight-700">$2860</span></li> --}}
    {{--                                        <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> --}}
    {{--                                    </ul> --}}
    {{--                                    <div class="progress-item mt-10"> --}}
    {{--                                        <div class="progress mb-0"> --}}
    {{--                                            <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                    <p class="mt-15">Lorem ipsum dolor sit ametconse adipisicing elit. Praesent quossrs it.Lorem ipsum dolor is emmit </p> --}}
    {{--                                    <a href="page-donate.html" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> --}}
    {{--                                </div> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                        <div class="item"> --}}
    {{--                            <div class="causes bg-silver-light maxwidth500 mb-30"> --}}
    {{--                                <div class="thumb"> --}}
    {{--                                    <img src="{{ asset('images/project/2.jpg') }}" alt="" class="img-fullwidth"> --}}
    {{--                                </div> --}}
    {{--                                <div class="causes-details border-1px bg-white clearfix p-15 pb-30"> --}}
    {{--                                    <h4 class="font-16 text-uppercase"><a href="page-single-cause.html">Education for Childreen</a></h4> --}}
    {{--                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-10"> --}}
    {{--                                        <li class="pull-left font-weight-400 text-black-333 pr-0">Raised: <span class="text-theme-colored font-weight-700">$2860</span></li> --}}
    {{--                                        <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> --}}
    {{--                                    </ul> --}}
    {{--                                    <div class="progress-item mt-10"> --}}
    {{--                                        <div class="progress mb-0"> --}}
    {{--                                            <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                    <p class="mt-15">Lorem ipsum dolor sit ametconse adipisicing elit. Praesent quossrs it.Lorem ipsum dolor is emmit </p> --}}
    {{--                                    <a href="page-donate.html" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> --}}
    {{--                                </div> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                        <div class="item"> --}}
    {{--                            <div class="causes bg-silver-light maxwidth500 mb-30"> --}}
    {{--                                <div class="thumb"> --}}
    {{--                                    <img src="{{ asset('images/project/3.jpg') }}" alt="" class="img-fullwidth"> --}}
    {{--                                </div> --}}
    {{--                                <div class="causes-details border-1px bg-white clearfix p-15 pb-30"> --}}
    {{--                                    <h4 class="font-16 text-uppercase"><a href="page-single-cause.html">Education for Childreen</a></h4> --}}
    {{--                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-10"> --}}
    {{--                                        <li class="pull-left font-weight-400 text-black-333 pr-0">Raised: <span class="text-theme-colored font-weight-700">$2860</span></li> --}}
    {{--                                        <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> --}}
    {{--                                    </ul> --}}
    {{--                                    <div class="progress-item mt-10"> --}}
    {{--                                        <div class="progress mb-0"> --}}
    {{--                                            <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                    <p class="mt-15">Lorem ipsum dolor sit ametconse adipisicing elit. Praesent quossrs it.Lorem ipsum dolor is emmit </p> --}}
    {{--                                    <a href="page-donate.html" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> --}}
    {{--                                </div> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                        <div class="item"> --}}
    {{--                            <div class="causes bg-silver-light maxwidth500 mb-30"> --}}
    {{--                                <div class="thumb"> --}}
    {{--                                    <img src="{{ asset('images/project/1.jpg') }}" alt="" class="img-fullwidth"> --}}
    {{--                                </div> --}}
    {{--                                <div class="causes-details border-1px bg-white clearfix p-15 pb-30"> --}}
    {{--                                    <h4 class="font-16 text-uppercase"><a href="page-single-cause.html">Education for Childreen</a></h4> --}}
    {{--                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-10"> --}}
    {{--                                        <li class="pull-left font-weight-400 text-black-333 pr-0">Raised: <span class="text-theme-colored font-weight-700">$2860</span></li> --}}
    {{--                                        <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> --}}
    {{--                                    </ul> --}}
    {{--                                    <div class="progress-item mt-10"> --}}
    {{--                                        <div class="progress mb-0"> --}}
    {{--                                            <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                    <p class="mt-15">Lorem ipsum dolor sit ametconse adipisicing elit. Praesent quossrs it.Lorem ipsum dolor is emmit </p> --}}
    {{--                                    <a href="page-donate.html" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> --}}
    {{--                                </div> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                        <div class="item"> --}}
    {{--                            <div class="causes bg-silver-light maxwidth500 mb-30"> --}}
    {{--                                <div class="thumb"> --}}
    {{--                                    <img src="{{ asset('images/project/2.jpg') }}" alt="" class="img-fullwidth"> --}}
    {{--                                </div> --}}
    {{--                                <div class="causes-details border-1px bg-white clearfix p-15 pb-30"> --}}
    {{--                                    <h4 class="font-16 text-uppercase"><a href="page-single-cause.html">Education for Childreen</a></h4> --}}
    {{--                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-10"> --}}
    {{--                                        <li class="pull-left font-weight-400 text-black-333 pr-0">Raised: <span class="text-theme-colored font-weight-700">$2860</span></li> --}}
    {{--                                        <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> --}}
    {{--                                    </ul> --}}
    {{--                                    <div class="progress-item mt-10"> --}}
    {{--                                        <div class="progress mb-0"> --}}
    {{--                                            <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                    <p class="mt-15">Lorem ipsum dolor sit ametconse adipisicing elit. Praesent quossrs it.Lorem ipsum dolor is emmit </p> --}}
    {{--                                    <a href="page-donate.html" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> --}}
    {{--                                </div> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                        <div class="item"> --}}
    {{--                            <div class="causes bg-silver-light maxwidth500 mb-30"> --}}
    {{--                                <div class="thumb"> --}}
    {{--                                    <img src="{{ asset('images/project/3.jpg') }}" alt="" class="img-fullwidth"> --}}
    {{--                                </div> --}}
    {{--                                <div class="causes-details border-1px bg-white clearfix p-15 pb-30"> --}}
    {{--                                    <h4 class="font-16 text-uppercase"><a href="page-single-cause.html">Education for Childreen</a></h4> --}}
    {{--                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-10"> --}}
    {{--                                        <li class="pull-left font-weight-400 text-black-333 pr-0">Raised: <span class="text-theme-colored font-weight-700">$2860</span></li> --}}
    {{--                                        <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> --}}
    {{--                                    </ul> --}}
    {{--                                    <div class="progress-item mt-10"> --}}
    {{--                                        <div class="progress mb-0"> --}}
    {{--                                            <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div> --}}
    {{--                                        </div> --}}
    {{--                                    </div> --}}
    {{--                                    <p class="mt-15">Lorem ipsum dolor sit ametconse adipisicing elit. Praesent quossrs it.Lorem ipsum dolor is emmit </p> --}}
    {{--                                    <a href="page-donate.html" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm">Donate <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> --}}
    {{--                                </div> --}}
    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </section> --}}

    <!-- Section: Divider call -->
    <section class="divider layer-overlay overlay-theme-colored" data-bg-img="{{ asset('images/bg/bg3.jpg') }}">
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="call-to-action">
                    <div class="col-md-9">
                        <h2 class="text-white font-opensans font-30 mt-0 mb-5">@lang('donation.please_raise_your_hand')</h2>
                        <h3 class="text-white font-opensans font-18 mt-0">@lang('donation.for_those_helpless_children')</h3>
                    </div>
                    <div class="col-md-3 mt-30">
                        <a href="#" class="btn btn-default btn-circled btn-lg">@lang('donation.become_fundraiser')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    </div>
    <!-- end main-content -->
@endsection

@push('scripts')
    <script>
        $('.owl-carousel').each(function() {
            var data_dots = ($(this).data("dots") === undefined) ? false : $(this).data("dots");
            var data_nav = ($(this).data("nav") === undefined) ? false : $(this).data("nav");
            $(this).owlCarousel({
                rtl: THEMEMASCOT.isRTL.check(),
                autoplay: true,
                loop: true,
                items: 1,
                dots: data_dots,
                nav: data_nav,
                navText: [
                    '<i class="pe-7s-angle-left"></i>',
                    '<i class="pe-7s-angle-right"></i>'
                ]
            });
        });
    </script>


@endpush
