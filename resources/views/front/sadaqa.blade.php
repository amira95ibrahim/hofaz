@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/share{$direction}.css") }}">
@endpush

@section('content')
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="images/bg/bg2.webp">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.sadaqah')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.sadaqah')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div class="container">
                <div class="row">
                    <div class="p-30 bg-grey br-20 clearfix">
                        <div class="col-md-6">
                            <form action="{{route('donation')}}" method="GET">
                                <select class="form-control mb-15 br-20 product_data">
                                    @foreach($sadaqat as $sadaqah)
                                        <option value="{{ $sadaqah->id }}" id="name_{{ $sadaqah->id }}">{{ $sadaqah->name }}</option>
                                    @endforeach
                                </select>
                                <div class="row vertical-align-middle">
                                    <div class="col-sm-12 ml-100">
                                        <div class="form-group">
                                            <label>@lang('sadaqa.amount')</label>
                                            <div class="input-group plus-minus-input mb-15">
                                                <div class="input-group-button button-plus">
                                                    <button type="button" class="btn custom-btn-success"
                                                            data-quantity="plus" data-field="quantity">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <input class="input-group-field form-control product_price" type="number"
                                                       name="amount" value="10" >
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
                                <div class="form-group">
                                    <label>@lang('sadaqa.notes')</label>
                                    <input type="text" class="form-control br-20 mb-15" name="">
                                </div>
                                <div class="btn-group mr-40" role="group" aria-label="Basic example">
                                    <div class="share-button sharer float-left">
                                        <button type="button" class="btn border-0 share-btn custom-btn-success">
                                         <i class="fa fa-regular fa-share"></i></button>
                                        <div class="social top center networks-5 ">
                                            <!-- Facebook Share Button -->
                                            <a class="fbtn share facebook"
                                               href="https://www.facebook.com/sharer/sharer.php?u=url"><i
                                                        class="fa fa-facebook"></i></a>
                                            <!-- Google Plus Share Button -->
                                            <a class="fbtn share gplus" href="https://plus.google.com/share?url=url"><i
                                                        class="fa fa-google-plus"></i></a>
                                            <!-- Twitter Share Button -->
                                            <a class="fbtn share twitter"
                                               href="https://twitter.com/intent/tweet?text=title&amp;url=url&amp;via=creativedevs"><i
                                                        class="fa fa-twitter"></i></a>
                                            <!-- Pinterest Share Button -->
                                            <a class="fbtn share pinterest"
                                               href="https://pinterest.com/pin/create/button/?url=url&amp;description=data&amp;media=image"><i
                                                        class="fa fa-pinterest"></i></a>

                                            <!-- LinkedIn Share Button -->
                                            <a class="fbtn share linkedin"
                                               href="https://www.linkedin.com/shareArticle?mini=true&amp;url=url&amp;title=title&amp;source=url/"><i
                                                        class="fa fa-linkedin"></i></a>
                                        </div>
                                    </div>

                                    <button type="button" class="btn custom-btn-success mr-5 quick-donation" ><i
                                                class="ri-coins-line btn-icon"></i> @lang('sadaqa.quick_donation')
                                    </button>
                                    <button type="button" class="btn custom-btn-success mr-5 addToCart"
                                            data-identifier=""><i
                                                class="ri-shopping-cart-line btn-icon"></i> @lang('sadaqa.add_to_cart')
                                    </button>
                                    <button type="submit" class="btn custom-btn-success mr-5"><i
                                                class="ri-bank-card-line btn-icon"></i> @lang('sadaqa.deduction')
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($sadaqahPage->image) }}" alt="">
                        </div>
                        <div class="col-md-12">
                            <h4 style="border-bottom: 1px solid orange;background: antiquewhite;padding: 8px; margin-bottom: 0;">{{ $sadaqahPage->title }}</h4>
                            <p style="margin-top: 15px;font-size: 16px;">{{ $sadaqahPage->details }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            // This button will increment the value
            $('[data-quantity="plus"]').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                // var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If is not undefined
                // console.log(currentVal);
                // Get its current value
                var inputValue = $('.product_price').val();
                    // console.log("Input value:", inputValue);

                 var currentVal = parseInt(inputValue);

                if (!isNaN(currentVal)) {
                    // Increment
                    // console.log("Parsed value:", currentVal);
                   $('.product_price').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                   $('.product_price').val(0);
                }
            });
            // This button will decrement the value till 0
            $('[data-quantity="minus"]').click(function (e) {console.log('-');
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('data-field');
                // Get its current value
                var currentVal = parseInt($('.product_price').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 0) {
                    // Decrement one
                   $('.product_price').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                   $('.product_price').val(0);
                }
            });
            $(".share-btn").click(function (e) {
                $('.networks-5').not($(this).next(".networks-5")).each(function () {
                    $(this).removeClass("active");
                });
                $(this).next(".networks-5").toggleClass("active");
            });
            selectSadaqah($('.product_data').val());
            $('.product_data').on('change', function () {
                console.log($(this).val());
                selectSadaqah($(this).val());
            });

            function selectSadaqah(val) {
                console.log(val);
                let id = val;
                $('.addToCart').attr('data-identifier', 'sadaqah_' + id).attr('id', 'sadaqah_' + id);
                $('.quick-donation').attr('onclick', 'donateNow("sadaqah_' + id + '")');
                $('.product_price').attr('id', 'product_sadaqah_' + id + '_amount');
                console.log('name');
                console.log($('#name_' + val).html());
                $('.product_name').attr('id', 'product_sadaqah_' + id + '_name').val($('#name_' + val).html());
            }
        });
    </script>
@endpush
