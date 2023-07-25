@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        :root {
            --primary-color: #F26522;
            --secondary-color: #f5f5f5;
        }

        #tabs-container {
            /*position: absolute;*/
            /*left: 0;*/
            /*top: 0;*/
            /*right: 0;*/
            /*bottom: 0;*/
            margin-top: 3%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #tabs-container .tabs {
            display: flex;
            position: relative;
            background-color: #fff;
            box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
            padding: 0.75rem;
            border-radius: 99px;
            margin-bottom: 0;
        }

        #tabs-container .tabs * {
            z-index: 2;
        }

        #tabs-container input[type=radio] {
            display: none;
        }

        #tabs-container .tab {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 54px;
            width: 200px;
            font-size: 1.25rem;
            font-weight: 500;
            border-radius: 99px;
            cursor: pointer;
            transition: color 0.15s ease-in;
        }

        #tabs-container .notification {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            margin-left: 0.75rem;
            border-radius: 50%;
            background-color: var(--secondary-color);
            transition: 0.15s ease-in;
        }

        #tabs-container input[type=radio]:checked+label {
            color: var(--primary-color);
        }

        #tabs-container input[type=radio]:checked+label>.notification {
            background-color: var(--primary-color);
            color: #fff;
        }

        #tabs-container input[id=radio-1]:checked~.glider {
            transform: translateX(100%);
        }

        #tabs-container input[id=radio-2]:checked~.glider {
            transform: translateX(0);
        }

        #tabs-container input[id=radio-3]:checked~.glider {
            transform: translateX(-100%);
        }

        #tabs-container .glider {
            position: absolute;
            display: flex;
            height: 54px;
            width: 200px;
            background-color: var(--secondary-color);
            z-index: 1;
            border-radius: 99px;
            transition: 0.25s ease-out;
        }

        @media (max-width: 700px) {
            #tabs-container .tabs {
                transform: scale(0.6);
            }
        }
    </style>
@endpush

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: Blog -->
        <section>
            <form action="{{ route('make-payment') }}" method="POST">
                @csrf
                <input type="hidden" id="amount" value="{{
                    number_format( Cart::getTotal())
                  }}" name="amount">
                <div id="tabs-container">
                    <div class="tabs">
                        <input type="radio" id="radio-1" name="donor_type" value="unknown" checked />
                        <label class="tab" for="radio-1" onclick="openTab(event, 'unknownTab')">فاعل خير</label>
                        @auth
                            <input type="radio" id="radio-2" name="donor_type" value="logged" />
                            <label class="tab" style="width: 400px" for="radio-2"
                                onclick="openTab(event, 'loggedTab')">{{ \Illuminate\Support\Facades\Auth::user()->name }}</label>
                        @else
                            <input type="radio" id="radio-2" name="donor_type" value="login" />
                            <label class="tab" for="radio-2" onclick="openTab(event, 'signinTab')">تسجيل الدخول</label>
                            <input type="radio" id="radio-3" name="donor_type" value="signup" />
                            <label class="tab" for="radio-3" onclick="openTab(event, 'registerTab')">انشاء حساب</label>
                        @endauth
                        <span class="glider"></span>
                    </div>
                </div>

                <div class="container pt-70 pb-70">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrapper">
                                <div class="bg-grey br-20">
                                    <div id="unknownTab" class="tab-content active clearfix">

                                        <div class="col-sm-12 text-center">
                                            <p>باختيار فاعل خير.. لن نستطيع أن نرسل لك رسائل نصية أو بريداً أو تقارير حول
                                                المشروع</p>
                                        </div>
                                        <div class="col-sm-12 text-center mt-10">
                                            <div class="row">
                                                <div class="col-sm-4">

                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="">رقم الهاتف<small>(اختياري)</small></label>
                                                    <input type="number"
                                                        class="form-control @error('phone_number') is-invalid @enderror"
                                                        name="phone_number">
                                                    @error('phone_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 text-center mt-20">
                                            <h3 class="font-weight-bold text-black-333 pr-0">

                                                مبلغ التبرع:
                                                <span
                                                    class="text-theme-colored font-weight-700 amount">{{
                                                        number_format(session()->has('amount') ? session('amount') : Cart::getTotal())
                                                      }}
                                                    د.ك</span>
                                            </h3>
                                        </div>
                                        {{-- <div class="col-sm-12">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="col-md-6">
                                                    <label class="mt-2">@lang('iftar.payment_method')</label>
                                                    <div class="plans">
                                                        <div style="clear: both;"></div>
                                                        <label class="plan basic-plan" for="basic">
                                                            <input checked type="radio" name="plan" id="basic"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/myfatoorah.jpeg') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-sm-12">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="col-md-10">
                                                    <label class="mt-2">@lang('iftar.payment_method')</label>
                                                    <div class="plans">
                                                        <div style="clear: both;"></div>
                                                        <label class="plan basic-plan" for="basic">
                                                            <input checked type="radio" name="plan" id="basic" />
                                                            <div class="plan-content">
                                                                <img loading="lazy"
                                                                    src="{{ asset('images/Visa-Master.png') }}"
                                                                    alt="" />
                                                            </div>
                                                        </label>

                                                        <label class="plan complete-plan" for="complete">
                                                            <input type="radio" id="complete" name="plan" />
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                    alt="" />
                                                            </div>
                                                        </label>
                                                        <label class="plan complete-plan" for="complete">
                                                            <input type="radio" id="complete" name="plan" />
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/Gpay.png') }}"
                                                                    alt="" />
                                                            </div>
                                                        </label>
                                                        <label class="plan complete-plan" for="complete">
                                                            <input type="radio" id="complete" name="plan" />
                                                            <div class="plan-content">
                                                                <img loading="lazy"
                                                                    src="{{ asset('images/apple_pay2.png') }}"
                                                                    alt="" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-12">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="col-md-10">
                                                    <label class="mt-2">@lang('iftar.payment_method')</label>
                                                    <div class="plans">
                                                        <div style="clear: both;"></div>
                                                        <label class="plan basic-plan" for="visa-master">
                                                            <input checked type="radio" name="plan" id="visa-master" value="2" />
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/Visa-Master.png') }}" alt="" />
                                                            </div>
                                                        </label>

                                                        <label class="plan complete-plan" for="knet">
                                                            <input type="radio" name="plan" id="knet" value="1" />
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/knet.png') }}" alt="" />
                                                            </div>
                                                        </label>
                                                        <label class="plan complete-plan" for="gpay">
                                                            <input type="radio" name="plan" id="gpay" value="32" />
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/Gpay.png') }}" alt="" />
                                                            </div>
                                                        </label>
                                                        <label class="plan complete-plan" for="apple-pay">
                                                            <input type="radio" name="plan" id="apple-pay" value="25" />
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/apple_pay2.png') }}" alt="" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center mt-10">
                                            <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                            <button type="submit"
                                                class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">
                                                @lang('iftar.donate_now')</button>
                                        </div>

                                    </div>

                                    @auth
                                        <div id="loggedTab" class="tab-content clearfix" style="display: none">
                                            <div class="col-sm-12 text-center mt-20">
                                                <h3 class="font-weight-bold text-black-333 pr-0">
                                                    مبلغ التبرع:
                                                    <span
                                                        class="text-theme-colored font-weight-700 amount">     {{
                                                            number_format(session()->has('amount') ? session('amount') : Cart::getTotal())
                                                          }}
                                                        د.ك</span>
                                                </h3>
                                            </div>
                                            {{-- <div class="col-sm-12">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="col-md-6">
                                                        <label class="mt-2">@lang('iftar.payment_method')</label>
                                                        <div class="plans">
                                                            <div style="clear: both;"></div>
                                                            <label class="plan basic-plan" for="basic">
                                                                <input checked type="radio" name="plan" id="basic"/>
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/myfatoorah.jpeg') }}"
                                                                         alt=""/>
                                                                </div>
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-sm-12">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="col-md-10">
                                                        <label class="mt-2">@lang('iftar.payment_method')</label>
                                                        <div class="plans">
                                                            <div style="clear: both;"></div>
                                                            <label class="plan basic-plan" for="basic">
                                                                <input checked type="radio" name="plan"
                                                                    id="basic" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy"
                                                                        src="{{ asset('images/Visa-Master.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>

                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/Gpay.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy"
                                                                        src="{{ asset('images/apple_pay2.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="col-md-10">
                                                        <label class="mt-2">@lang('iftar.payment_method')</label>
                                                        <div class="plans">
                                                            <div style="clear: both;"></div>
                                                            <label class="plan basic-plan" for="visa-master">
                                                                <input checked type="radio" name="plan" id="visa-master" value="2" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/Visa-Master.png') }}" alt="" />
                                                                </div>
                                                            </label>

                                                            <label class="plan complete-plan" for="knet">
                                                                <input type="radio" name="plan" id="knet" value="1" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/knet.png') }}" alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="gpay">
                                                                <input type="radio" name="plan" id="gpay" value="32" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/Gpay.png') }}" alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="apple-pay">
                                                                <input type="radio" name="plan" id="apple-pay" value="25" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/apple_pay2.png') }}" alt="" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mt-10">
                                                <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                                <button type="submit"
                                                    class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">
                                                    @lang('iftar.donate_now')</button>
                                            </div>
                                        </div>
                                    @else
                                        <div id="signinTab" class="tab-content clearfix" style="display: none">
                                            <div class="col-sm-6">
                                                <label>البريد الإلكتروني</label>
                                                <input type="email" autocomplete="none" class="form-control"
                                                    name="email" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label>كلمة المرور</label>
                                                <input type="password" autocomplete="none" class="form-control"
                                                    name="password" />
                                            </div>
                                            <div class="col-sm-12 text-center mt-20">
                                                <h3 class="font-weight-bold text-black-333 pr-0">
                                                    مبلغ التبرع:
                                                    <span
                                                        class="text-theme-colored font-weight-700 amount">{{
                                                            number_format(session()->has('amount') ? session('amount') : Cart::getTotal())
                                                          }}
                                                        د.ك</span>
                                                </h3>
                                            </div>
                                            {{-- <div class="col-sm-12">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="col-md-6">
                                                        <label class="mt-2">@lang('iftar.payment_method')</label>
                                                        <div class="plans">
                                                            <div style="clear: both;"></div>
                                                            <label class="plan basic-plan" for="basic">
                                                                <input checked type="radio" name="plan" id="basic"/>
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/myfatoorah.jpeg') }}"
                                                                         alt=""/>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="col-md-10">
                                                        <label class="mt-2">@lang('iftar.payment_method')</label>
                                                        <div class="plans">
                                                            <div style="clear: both;"></div>
                                                            <label class="plan basic-plan" for="basic">
                                                                <input checked type="radio" name="plan"
                                                                    id="basic" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy"
                                                                        src="{{ asset('images/Visa-Master.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>

                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/Gpay.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy"
                                                                        src="{{ asset('images/apple_pay2.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mt-10">
                                                <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                                <a href="{{ route('signIn') }}" type="submit"
                                                    class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('iftar.donate_now')</a>
                                            </div>
                                        </div>

                                        <div id="registerTab" class="tab-content clearfix" style="display: none">
                                            <div class="col-sm-6">
                                                <label>الاسم</label>
                                                <input type="text" autocomplete="none" class="form-control"
                                                    name="name" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label>رقم الهاتف</label>
                                                <input type="number" autocomplete="none" class="form-control"
                                                    name="phone" />
                                            </div>
                                            <div class="col-sm-12 mt-10">
                                                <label>البريد الالكتروني</label>
                                                <input type="email" autocomplete="none" class="form-control"
                                                    name="email" />
                                            </div>
                                            <div class="col-sm-6 mt-10">
                                                <label>كلمة المرور</label>
                                                <input type="password" autocomplete="none" class="form-control"
                                                    name="password" />
                                            </div>
                                            <div class="col-sm-6 mt-10">
                                                <label>تأكيد كلمة المرور</label>
                                                <input type="password" autocomplete="none" class="form-control"
                                                    name="confirm_password" />
                                            </div>
                                            <div class="col-sm-12 text-center mt-20">
                                                <h3 class="font-weight-bold text-black-333 pr-0">
                                                    مبلغ التبرع:
                                                    <span
                                                        class="text-theme-colored font-weight-700 amount">{{
                                                            number_format(session()->has('amount') ? session('amount') : Cart::getTotal())
                                                          }}
                                                        د.ك</span>
                                                </h3>
                                            </div>

                                            {{-- <div class="col-sm-12">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="col-md-10">
                                                        <label class="mt-2">@lang('iftar.payment_method')</label>
                                                        <div class="plans">
                                                            <div style="clear: both;"></div>
                                                            <label class="plan basic-plan" for="basic">
                                                                <input checked type="radio" name="plan"
                                                                    id="basic" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy"
                                                                        src="{{ asset('images/Visa-Master.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>

                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan"  />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/Gpay.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="complete">
                                                                <input type="radio" id="complete" name="plan" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy"
                                                                        src="{{ asset('images/apple_pay2.png') }}"
                                                                        alt="" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-sm-12">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="col-md-10">
                                                        <label class="mt-2">@lang('iftar.payment_method')</label>
                                                        <div class="plans">
                                                            <div style="clear: both;"></div>
                                                            <label class="plan basic-plan" for="visa-master">
                                                                <input checked type="radio" name="plan" id="visa-master" value="2" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/Visa-Master.png') }}" alt="" />
                                                                </div>
                                                            </label>

                                                            <label class="plan complete-plan" for="knet">
                                                                <input type="radio" name="plan" id="knet" value="1" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/knet.png') }}" alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="gpay">
                                                                <input type="radio" name="plan" id="gpay" value="32" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/Gpay.png') }}" alt="" />
                                                                </div>
                                                            </label>
                                                            <label class="plan complete-plan" for="apple-pay">
                                                                <input type="radio" name="plan" id="apple-pay" value="25" />
                                                                <div class="plan-content">
                                                                    <img loading="lazy" src="{{ asset('images/apple_pay2.png') }}" alt="" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mt-10">
                                                <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                                <button type="submit"
                                                    class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">
                                                    @lang('iftar.donate_now')</button>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </div>
    <!-- end main-content -->
@endsection


@push('scripts')
    <script type="text/javascript">
        function openTab(evt, cityName) {
            // Declare all variables
            var i, tabcontent;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        jQuery(document).ready(function() {
            // This button will increment the value
            $('[data-quantity="plus"]').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name=' + fieldName + ']').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0);
                }
            });
            // This button will decrement the value till 0
            $('[data-quantity="minus"]').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    // Decrement one
                    $('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0);
                }
            });

            //payment
            let model = sessionStorage.getItem('model');
            let model_id = sessionStorage.getItem('model_id');
            let amount = sessionStorage.getItem('amount');
            $('#amount').val(amount);
           // $('.amount').html(amount+'د.ك');
            // Use the retrieved data to process the donation
        });
    </script>
@endpush
