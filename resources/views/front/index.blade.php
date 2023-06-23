@inject('projectService', 'App\Services\ProjectService')
@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('onlineService/css/util.css') }}">
    <style>
        .button-plus {
            padding-right: 1%;
        }
        .img-fullwidth{
            height: 250px;
        }
    </style>
@endpush



@section('content')
    <div class="main-content">
        <!-- slider -->
        <section id="home" class="divider">
            <div class="fullwidth-carousel" data-nav="true">
                @foreach($sliders as $slider)
                    @if($slider->link)
                        <a href="{{ url($slider->link) }}">
                    @endif
                    <div class="carousel-item bg-img-cover" data-bg-img="{{ asset($slider->image) }}"></div>
                    @if($slider->link)
                        </a>
                    @endif
                @endforeach
            </div>
        </section>

        <!-- kafalat -->
        <section>
            <div class="container pb-sm-50">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-3col" data-dots="false" data-nav="true">
                            @foreach($projectService::getHomepageProjects() as $project)
                                <div class="item">
                                    <a href="{{ route($project->model . '.show', $project->id) }}">
                                        <h3 class="line-bottom border-bottom mt-0 mt-sm-20">{{ $project->name }}</h3>
                                        <img src="{{ asset($project->image) }}" class="img-fullwidth" alt=""/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Donatation -->
        <section class="bg-silver-light">
            <div class="container pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h3 class="text-uppercase title line-bottom mt-0 mb-30"><i
                                        class="fa fa-cc-mastercard text-theme-colored icon-margin"></i> @lang('index.donation')
                                <span class="text-theme-colored">@lang('index.quick')!</span></h3>
                            <form id="paypal_donate_form_onetime_recurring">
                                <div class="row">
                                    <div class="flex-sb-m">
                                        <div class="col-sm-8 float-{{ $float }}">
                                            <div class="form-group mb-20">
                                                <label><strong>@lang('index.projects')</strong></label>
                                                <select name="item_name" class="form-control product_data">
                                                    @foreach($projectService::getAllActiveProjects() as $project)
                                                        <option value='{{ $project->model . '_' . $project->id }}' id="name_{{ $project->model . '_' . $project->id }}">
                                                            {{ $project->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-20">
                                                <label><strong>@lang('index.how_much')</strong></label>
                                                <div class="input-group plus-minus-input mb-15">
                                                    <div class="input-group-button button-plus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="plus" data-field="quantity">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <input class="input-group-field form-control product_price" type="number"
                                                           name="quantity" value="0">
                                                    <input type="hidden" class="product_name">
                                                    <div class="input-group-button button-minus">
                                                        <button type="button" class="btn custom-btn-success"
                                                                data-quantity="minus" data-field="quantity">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="button" class="hidden addToCart" data-identifier="">
                                            </button>
                                            <button type="button"
                                                    class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30 quick-donation">@lang('index.donate_now')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form id="paypal_donate_form-onetime" class="hidden"
                                  action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_donations"/>
                                <input type="hidden" name="business" value="accounts@thememascot.com"/>
                                <input type="hidden" name="item_name" value="Educate Children"/>
                                <input type="hidden" name="currency_code" value="USD"/>
                                <input type="hidden" name="amount" value="20"/>
                                <input type="hidden" name="no_shipping" value="1"/>
                                <input type="hidden" name="cn" value="Comments..."/>
                                <input type="hidden" name="tax" value="0"/>
                                <input type="hidden" name="lc" value="US"/>
                                <input type="hidden" name="bn" value="PP-DonationsBF"/>
                                <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html"/>
                                <input type="hidden" name="cancel_return"
                                       value="http://www.yoursite.com/paymentcancel.html"/>
                                <input type="hidden" name="notify_url"
                                       value="http://www.yoursite.com/notifypayment.php"/>
                                <input type="submit" name="submit"/>
                            </form>
                            <form id="paypal_donate_form-recurring" class="hidden"
                                  action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_xclick-subscriptions"/>
                                <input type="hidden" name="business" value="accounts@thememascot.com"/>
                                <input type="hidden" name="item_name" value="Educate Children"/>
                                <input type="hidden" name="currency_code" value="USD"/>
                                <input type="hidden" name="a3" value="20"/>
                                <input type="hidden" name="t3" value="D"/>
                                <input type="hidden" name="p3" value="1"/>
                                <input type="hidden" name="rm" value="2"/>
                                <input type="hidden" name="src" value="1"/>
                                <input type="hidden" name="sra" value="1"/>
                                <input type="hidden" name="no_shipping" value="0"/>
                                <input type="hidden" name="no_note" value="1"/>
                                <input type="hidden" name="lc" value="US"/>
                                <input type="hidden" name="bn" value="PP-DonationsBF"/>
                                <input type="hidden" name="return" value="http://www.yoursite.com/thankyou.html"/>
                                <input type="hidden" name="cancel_return"
                                       value="http://www.yoursite.com/paymentcancel.html"/>
                                <input type="hidden" name="notify_url"
                                       value="http://www.yoursite.com/notifypayment.php"/>
                                <input type="submit" name="submit"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Achievements -->
        <section class="divider parallax layer-overlay-gradient overlay-dark" data-bg-img="{{ asset('images/bg/bg1.jpg') }}"
                 data-parallax-ratio="0.7">
            <div class="container pt-90 pb-90 pb-sm-30">
                <div class="row">
                    @foreach($achievements as $achievement)
                        <div class="col-xs-6 col-sm-3 col-md-3 mb-md-50">
                            <div class="funfact text-center">
                                <img src="{{ asset($achievement->image) }}">
                                <h2 data-animation-duration="2000" data-value="{{ $achievement->number }}"
                                    class="animate-number text-theme-colored font-42 font-weight-700 mt-0 mb-0">0</h2>
                                <h5 class="text-white text-uppercase font-weight-600">{{ $achievement->name }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Publications -->
        <section class="">
            <div class="container pb-70">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <a href="{{ route('publications') }}"><h2 class="text-uppercase line-bottom-center mt-0">@lang('index.media') <span
                                        class="text-theme-colored">@lang('index.library')</span></h2></a>
                            <div class="title-flaticon">
                                <i class="flaticon-charity-alms"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel-4col" data-dots="false" data-nav="true">
                                @foreach($publications as $publication)
                                    <div class="gallery-isotope clearfix">
                                        <div class="item">
                                            <div class="gallery-item">
                                                <div class="thumb">
                                                    <img alt="project" src="{{ asset($publication->image) }}"
                                                         class="img-fullwidth"/>
                                                    <div class="overlay-shade"></div>
                                                    <div class="icons-holder">
                                                        <div class="icons-holder-inner">
                                                            <div class="icon-sm icon-dark">
                                                                <a href="{{ asset($publication->pdf) }}" target="_blank" class="text-white">{{ $publication->name }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- News -->
        <section id="blog" class="bg-silver-light">
            <div class="container pb-70 pb-sm-40">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <a href="{{ route('news') }}"><h2 class="text-uppercase line-bottom-center mt-0">@lang('index.our') <span
                                        class="text-theme-colored">@lang('index.news')</span></h2></a>
                            <div class="title-flaticon">
                                <i class="flaticon-charity-alms"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach($news as $article)
                            <div class="col-xs-12 col-sm-6 col-md-4 float-{{ $float }}">
                                <article class="post clearfix mb-sm-30 bg-silver-light border-1px">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{ asset($article->image) }}" alt=""
                                                 class="img-responsive img-fullwidth"/>
                                        </div>
                                        <div class="entry-meta media">
                                            <div class="entry-date media-{{ $float }} text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                                <ul>
                                                    <li class="font-16 text-white font-weight-600 border-bottom">{{ \Carbon\Carbon::createFromDate($article->publishing_date)->format('d') }}</li>
                                                    <li class="font-12 text-white text-uppercase">{{ \Carbon\Carbon::createFromDate($article->publishing_date)->translatedFormat('M') }}</li>
                                                </ul>
                                            </div>
                                            <div class="media-body pl-20">
                                                <div class="event-content">
                                                    <h4 class="entry-title font-22 mb-5"><a
                                                            href="{{ route('news.details', $article->id) }}">{{ $article->name }}</a></h4>
                                                    <span class="mb-10 mr-10"><i
                                                            class="fa fa-calendar mr-5 text-theme-colored"></i> {{ $article->publishing_date }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-content">
                                        <p>{{ mb_substr($article->description, 0, 150,'utf-8') . ' ...' }}</p>
                                        <a href="{{ route('news.details', $article->id) }}"
                                           class="btn btn-default btn-sm btn-theme-colored mt-10">@lang('index.read_more')</a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function (c) {
            // var d = $("#paypal_donate_form_onetime_recurring");
            // var a = d.find("#custom_other_amount");
            // a.hide();
            // d.find("select[name='amount']").change(function () {
            //     var e = $(this);
            //     if (e.val() == "other") {
            //         a.show().append('<div class="input-group"><span class="input-group-addon">$</span> <input id="input_other_amount" type="text" name="amount" class="form-control" value="100"/></div>');
            //     } else {
            //         a.children(".input-group").remove();
            //         a.hide();
            //     }
            // });
            // var b = d.find("#donation_type_choice");
            // b.hide();
            // $("input[name='payment_type']").change(function () {
            //     if (this.value == "recurring") {
            //         b.show();
            //     } else {
            //         b.hide();
            //     }
            // });
            // d.on("submit", function (j) {
            //     $("#paypal_donate_form-onetime").submit();
            //     var l = d.find("select[name='item_name'] option:selected").val();
            //     var f = d.find("select[name='currency_code'] option:selected").val();
            //     var h = d.find("select[name='amount'] option:selected").val();
            //     var g = d.find("input[name='t3']:checked").val();
            //     if (h == "other") {
            //         h = d.find("#input_other_amount").val();
            //     }
            //     if ($("input[name='payment_type']:checked", d).val() == "recurring") {
            //         var i = $("#paypal_donate_form-recurring");
            //         i.find("input[name='item_name']").val(l);
            //         i.find("input[name='currency_code']").val(f);
            //         i.find("input[name='a3']").val(h);
            //         i.find("input[name='t3']").val(g);
            //         i.find("input[type='submit']").trigger("click");
            //     } else {
            //         if ($("input[name='payment_type']:checked", d).val() == "one_time") {
            //             var k = $("#paypal_donate_form-onetime");
            //             k.find("input[name='item_name']").val(l);
            //             k.find("input[name='currency_code']").val(f);
            //             k.find("input[name='amount']").val(h);
            //             k.find("input[type='submit']").trigger("click");
            //         }
            //     }
            //     return false;
            // });

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

        jQuery(document).ready(function () {

            selectProject($('.product_data').val());
            $('.product_data').on('change', function () {
                selectProject($(this).val());
            });

            function selectProject(val) {
                $('.addToCart').attr('data-identifier', val).attr('id', val);
                $('.quick-donation').attr('onclick', 'donateNow("' + val + '")');
                $('.product_price').attr('id', 'product_' + val + '_amount');
                $('.product_name').attr('id', 'product_' + val + '_name').val($('#name_' + val).html());
            }
        });
    </script>
@endpush
