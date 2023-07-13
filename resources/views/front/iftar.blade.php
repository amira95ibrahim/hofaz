@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        .button-plus {
            padding-right: 0%;
        }
    </style>
@endpush

@section('content')

    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8"
                 data-bg-img="{{ asset('images/bg/bg2.webp') }}">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.iftar')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.iftar')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Blog -->
        <section>
            <div class="container pt-70 pb-70">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrapper">

                            <div class="tab-wrapper">
                                <ul class="tabs">
                                    <li class="tab-list" data-tab="1">
                                        <div class="icon tab-link active mb-5">
                                            <span>1</span>
                                            <span>@lang('iftar.dinar')</span>
                                        </div>
                                        <p>
                                            <span class="sad2"><span id="Label3"
                                                                     style="font-family:GSSLight;font-weight:bold;">@lang('iftar.basket')</span></span><br>
                                            <span class="ssad2"><span id="Label26"
                                                                      style="font-family:GSSLight;font-weight:bold;">@lang('iftar.stack')</span></span>
                                        </p>
                                    </li>

                                    <li class="tab-list" data-tab="2">
                                        <div class="icon tab-link mb-5">
                                            <span>7.5</span>
                                            <span>@lang('iftar.dinar')</span>
                                        </div>
                                        <p>
                                            <span class="sad2"><span id="Label3"
                                                                     style="font-family:GSSLight;font-weight:bold;">@lang('iftar.for')</span></span><br>
                                            <span class="ssad2"><span id="Label26"
                                                                      style="font-family:GSSLight;font-weight:bold;">@lang('iftar.week')</span></span>
                                        </p>
                                    </li>
                                    <li class="tab-list" data-tab="3">
                                        <div class="icon tab-link mb-5">
                                            <span>15</span>
                                            <span>@lang('iftar.dinar')</span>
                                        </div>
                                        <p>
                                            <span class="sad2"><span id="Label3"
                                                                     style="font-family:GSSLight;font-weight:bold;">@lang('iftar.for')</span></span><br>
                                            <span class="ssad2"><span id="Label26"
                                                                      style="font-family:GSSLight;font-weight:bold;">@lang('iftar.half_month')</span></span>
                                        </p>
                                    </li>
                                    <li class="tab-list" data-tab="4">
                                        <div class="icon tab-link mb-5">
                                            <span>30</span>
                                            <span>@lang('iftar.dinar')</span>
                                        </div>
                                        <p>
                                            <span class="sad2"><span id="Label3"
                                                                     style="font-family:GSSLight;font-weight:bold;">@lang('iftar.for')</span></span><br>
                                            <span class="ssad2"><span id="Label26"
                                                                      style="font-family:GSSLight;font-weight:bold;">@lang('iftar.month')</span></span>
                                        </p>
                                    </li>
                                </ul>
                            </div>

                            <div class="content-wrapper bg-grey br-20 mt-50">
                                <div id="tab-1" class="tab-content active clearfix">
                                    <div class="one-circle">
                                        <div class="text-center"><span class="big-text">1</span> <br>
                                            <p>@lang('iftar.dinar')</p></div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>@lang('iftar.number_of_shares')<small>*</small></label>
                                                <div class="input-group plus-minus-input mb-15">
                                                    <div class="input-group-button button-plus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="plus" data-field="quantity">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <input class="input-group-field form-control" type="number"
                                                           name="quantity" value="1">
                                                    <div class="input-group-button button-minus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="minus" data-field="quantity">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.country')</label>
                                            <select class="form-control">
                                                <option selected="" disabled=""
                                                        name="country">@lang('iftar.select_country')</option>
                                                <option>@lang('iftar.india')</option>
                                                <option>@lang('iftar.saudi_arabia')</option>
                                                <option>@lang('iftar.USA')</option>
                                                <option>@lang('iftar.UK')</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.amount')</label>
                                            <input type="number" class="form-control" name="amount">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang('iftar.comments')</label>
                                            <textarea class="form-control" rows="5"
                                                      placeholder="@lang('iftar.your_comments_here')"></textarea>
                                        </div>
                                        {{-- <div class="col-sm-12">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="col-md-10 col-sm-3">
                                                    <label class="mt-2">@lang('iftar.payment_method')</label>
                                                    <div class="plans">
                                                        <div style="clear: both;"></div>
                                                        <label class="plan basic-plan" for="basic">
                                                            <input checked type="radio" name="plan" id="basic"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/Visa-Master.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>

                                                        <label class="plan complete-plan" for="complete">
                                                            <input type="radio" id="complete" name="plan"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>
                                                        <label class="plan complete-plan" for="google_pay">
                                                            <input type="radio" id="google_pay" name="plan"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/Gpay.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>
                                                        <label class="plan complete-plan" for="apple_pay">
                                                            <input type="radio" id="apple_pay" name="plan"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/apple_pay2.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12 text-center mt-10">
                                            <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                            <a href="{{ route('payment') }}" type="submit"
                                               class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('iftar.donate_now')</a>
                                        </div>

                                    </form>
                                </div>

                                <div id="tab-2" class="tab-content clearfix">
                                    <div class="one-circle">
                                        <div class="text-center"><span class="big-text">7.5 </span> <br>
                                            <p>@lang('iftar.dinar')</p></div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>@lang('iftar.number_of_shares')<small>*</small></label>
                                                <div class="input-group plus-minus-input mb-15">
                                                    <div class="input-group-button button-plus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="plus" data-field="quantity">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <input class="input-group-field form-control" type="number"
                                                           name="quantity" value="1">
                                                    <div class="input-group-button button-minus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="minus" data-field="quantity">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.country')</label>
                                            <select class="form-control">
                                                <option selected="" disabled=""
                                                        name="country">@lang('iftar.select_country')</option>
                                                <option>@lang('iftar.india')</option>
                                                <option>@lang('iftar.saudi_arabia')</option>
                                                <option>@lang('iftar.USA')</option>
                                                <option>@lang('iftar.UK')</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.amount')</label>
                                            <input type="number" class="form-control" name="amount">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang('iftar.comments')</label>
                                            <textarea class="form-control" rows="5"
                                                      placeholder="@lang('iftar.your_comments_here')"></textarea>
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
                                                                <img loading="lazy" src="{{ asset('images/Visa-Master.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>

                                                        <label class="plan complete-plan" for="complete">
                                                            <input type="radio" id="complete" name="plan"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12 text-center mt-10">
                                            <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                            <a href="{{ route('payment') }}" type="submit"
                                               class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('iftar.donate_now')</a>
                                        </div>

                                    </form>
                                </div>

                                <div id="tab-3" class="tab-content clearfix">
                                    <div class="one-circle">
                                        <div class="text-center"><span class="big-text">15</span> <br>
                                            <p>@lang('iftar.dinar')</p></div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>@lang('iftar.number_of_shares')<small>*</small></label>
                                                <div class="input-group plus-minus-input mb-15">
                                                    <div class="input-group-button button-plus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="plus" data-field="quantity">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <input class="input-group-field form-control" type="number"
                                                           name="quantity" value="1">
                                                    <div class="input-group-button button-minus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="minus" data-field="quantity">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.country')</label>
                                            <select class="form-control">
                                                <option selected="" disabled=""
                                                        name="country">@lang('iftar.select_country')</option>
                                                <option>@lang('iftar.india')</option>
                                                <option>@lang('iftar.saudi_arabia')</option>
                                                <option>@lang('iftar.USA')</option>
                                                <option>@lang('iftar.UK')</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.amount')</label>
                                            <input type="number" class="form-control" name="amount">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang('iftar.comments')</label>
                                            <textarea class="form-control" rows="5"
                                                      placeholder="@lang('iftar.your_comments_here')"></textarea>
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
                                                                <img loading="lazy" src="{{ asset('images/Visa-Master.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>

                                                        <label class="plan complete-plan" for="complete">
                                                            <input type="radio" id="complete" name="plan"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12 text-center mt-10">
                                            <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                            <a href="{{ route('payment') }}" type="submit"
                                               class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('iftar.donate_now')</a>
                                        </div>

                                    </form>
                                </div>

                                <div id="tab-4" class="tab-content clearfix">
                                    <div class="one-circle">
                                        <div class="text-center"><span class="big-text">30</span> <br>
                                            <p>@lang('iftar.dinar')</p></div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>@lang('iftar.number_of_shares')<small>*</small></label>
                                                <div class="input-group plus-minus-input mb-15">
                                                    <div class="input-group-button button-plus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="plus" data-field="quantity">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <input class="input-group-field form-control" type="number"
                                                           name="quantity" value="1">
                                                    <div class="input-group-button button-minus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="minus" data-field="quantity">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.country')</label>
                                            <select class="form-control">
                                                <option selected="" disabled=""
                                                        name="country">@lang('iftar.select_country')</option>
                                                <option>@lang('iftar.india')</option>
                                                <option>@lang('iftar.saudi_arabia')</option>
                                                <option>@lang('iftar.USA')</option>
                                                <option>@lang('iftar.UK')</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>@lang('iftar.amount')</label>
                                            <input type="number" class="form-control" name="amount">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang('iftar.comments')</label>
                                            <textarea class="form-control" rows="5"
                                                      placeholder="@lang('iftar.your_comments_here')"></textarea>
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
                                                                <img loading="lazy" src="{{ asset('images/Visa-Master.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>

                                                        <label class="plan complete-plan" for="complete">
                                                            <input type="radio" id="complete" name="plan"/>
                                                            <div class="plan-content">
                                                                <img loading="lazy" src="{{ asset('images/knet.png') }}"
                                                                     alt=""/>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12 text-center mt-10">
                                            <!-- <button type="submit" class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5">Donate Now</button> -->
                                            <a href="{{ route('payment') }}" type="submit"
                                               class="btn btn-dark btn-xl btn-theme-colored btn-flat mr-5 btnFullwidth">@lang('iftar.donate_now')</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->

@endsection


@push('scripts')
    {{-- <script type="text/javascript">
        $('.tab-list').click(function () {

            var tabID = $(this).attr('data-tab');

            $('.tab-link').removeClass('active');

            $(this).find('div').addClass('active');

            $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
        });

        jQuery(document).ready(function () {
            // This button will increment the value
            $('[data-quantity="plus"]').click(function (e) {
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
            $('[data-quantity="minus"]').click(function (e) {
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
        });
    </script> --}}

<script type="text/javascript">
    // Define tab values
    var tabValues = {
      1: 1,
      2: 7.5,
      3: 15,
      4: 30
    };

    function updateAmount() {
      var activeTab = $('.tab-link.active').parent().data('tab');
      var quantity = parseInt($('input[name="quantity"]').val());
      $('input[name="amount"]').val(tabValues[activeTab] * quantity);
    }

    $('.tab-list').click(function () {
      var tabID = $(this).attr('data-tab');

      $('.tab-link').removeClass('active');
      $(this).find('div').addClass('active');
      $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

      updateAmount(); // Update the amount based on selected tab
    });

    jQuery(document).ready(function () {
      // Set the initial amount based on the active tab
      updateAmount();

      // This button will increment the value
      $('[data-quantity="plus"]').click(function (e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        if (!isNaN(currentVal)) {
          $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
          $('input[name=' + fieldName + ']').val(0);
        }

        updateAmount(); // Update the amount based on the incremented quantity
      });

      // This button will decrement the value till 0
      $('[data-quantity="minus"]').click(function (e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        if (!isNaN(currentVal) && currentVal > 0) {
          $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
          $('input[name=' + fieldName + ']').val(0);
        }

        updateAmount(); // Update the amount based on the decremented quantity
      });
    });
  </script>
@endpush
