@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/share{$direction}.css") }}">
    <style>
        .button-plus {
            padding-right: 4%;
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/bg/bg2.webp') }}">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">{{ $kafala->type->name }}</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li><a href="{{ route('kafalat') }}">@lang('breadcrumbs.kafala')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">{{ $kafala->name }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="bg-grey flex-center">
                        <div class="col-md-8">
                            <h2>{{ $kafala->name }} - {{ $kafala->country->name }}</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    @foreach($kafala->kafalatValues as $value)
                                        <tr>
                                            <td>{{ $value->name }} :</td>
                                            <td>{{ $value->pivot->{'value_' . $lang } }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>@lang('kafala.monthly_amount') :</td>
                                        <td>{{ $kafala->monthly_amount }} @lang('relief.KWD')</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form action="{{route('donation')}}" method="GET">
                                <div class="row vertical-align-middle">
                                    <div class="col-sm-8 ml-100">
                                        <div class="form-group">
                                            <label>@lang('kafala.kafalah_period')</label>
                                            <div class="input-group plus-minus-input mb-15">
                                                <div class="input-group-button button-plus">
                                                    <button type="button" class="btn custom-btn-success"
                                                            data-quantity="plus" data-field="period">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <input class="input-group-field form-control" type="number" min="1"
                                                       name="period" value="1">
{{--                                                <input type="hidden" id="{{ 'product_kafalah_' . $kafala->id . '_image' }}" value="{{ $kafala->image }}">--}}
                                                <input type="hidden" id="{{ 'product_kafalah_' . $kafala->id . '_name' }}" value="{{ 'كفالة - ' . $kafala->name }}">
                                                <div class="input-group-button button-minus">
                                                    <button type="button" class="btn custom-btn-success"
                                                            data-quantity="minus" data-field="period">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row vertical-align-middle">
                                    <div class="col-sm-8 ml-100">
                                        <div class="form-group">
                                            <label>@lang('sadaqa.amount')</label>
                                            <input type="number" name="amount" id="{{ 'product_kafalah_' . $kafala->id . '_amount' }}" value="{{ $kafala->monthly_amount }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="btn-group mr-40" role="group" aria-label="Basic example">
                                    <div class="share-button sharer float-left">
                                        <button type="button" class="btn border-0 share-btn custom-btn-success"><i
                                                class="ri-share-fill btn-icon"></i></button>
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

                                    <button type="button" class="btn custom-btn-success mr-5" onclick="donateNow('{{ 'kafalah_' . $kafala->id }}')"><i
                                      class="ri-coins-line btn-icon"></i> @lang('sadaqa.quick_donation')
                                    </button>

                                    <button type="button" class="btn custom-btn-success mr-5 addToCart" id="{{ 'kafalah_' . $kafala->id }}"
                                            data-identifier="{{ 'kafalah_' . $kafala->id }}"><i
                                            class="ri-shopping-cart-line btn-icon"></i> @lang('sadaqa.add_to_cart')
                                    </button>

                                    <button type="submit" class="btn custom-btn-success mr-5"><i
                                            class="ri-bank-card-line btn-icon"></i> @lang('sadaqa.deduction')
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="{{ asset($kafala->image) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="border-bottom: 1px solid orange;background: antiquewhite;padding: 8px; margin-bottom: 0;">{{ $kafala->type->name }}</h4>
                        <p style="margin-top: 15px;font-size: 16px;">{{ $kafala->type->description }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/flip-card.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //custom button for homepage
            $(".share-btn").click(function (e) {
                $('.networks-5').not($(this).next(".networks-5")).each(function () {
                    $(this).removeClass("active");
                });

                $(this).next(".networks-5").toggleClass("active");
            });
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
                    $('input[name=' + fieldName + ']').val(currentVal + 1).change();
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0).change();
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
                    $('input[name=' + fieldName + ']').val(currentVal - 1).change();
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0).change();
                }
            });
            $(".share-btn").click(function (e) {
                $('.networks-5').not($(this).next(".networks-5")).each(function () {
                    $(this).removeClass("active");
                });
                $(this).next(".networks-5").toggleClass("active");
            });
            $('input[name=period]').on('change', function () {
                $('input[name=amount]').val($(this).val() * {{ $kafala->monthly_amount }}).change();
            });
        });
    </script>
@endpush
