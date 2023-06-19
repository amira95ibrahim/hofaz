@extends('front.layout.main')

@push('styles')
@endpush

@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8"
                 data-bg-img="{{ asset('images/bg/bg2.jpg') }}">
            <div class="container pt-90 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.donation_methods')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.donation_methods')</li>
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
                    <div class="col-xs-12 ">
                        <h3 class="mt-0 line-bottom">@lang('donationMethods.we_make_it_easier')</h3>
                        <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.generous_benefactor'):</h3>
                        <h3 class="mt-0 line-bottom mt-40"
                            style="color:#F26522">@lang('donationMethods.association_accounts')</h3>
                        <p class=" font-opensans font-18 mt-0">@lang('donationMethods.bank_deduction')</p>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.account_number') </h3>
                                <br>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.KW77')</h3>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.KW81')</h3>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.KW16')</h3>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.KW31')</h3>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.bank_name') </h3><br>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.kuwait_finance'): </h3>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.kuwait_international')
                                    : </h3>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.kuwait_commercial')
                                    : </h3>
                                <h3 class=" font-opensans font-18 mt-0">@lang('donationMethods.boubyan') : </h3>
                            </div>
                        </div>
                        <br>
                        <p class=" font-opensans font-18 mt-0">
                            @lang('donationMethods.visiting_the_association')
                        </p>
                        <p class=" font-opensans font-18 mt-0">
                            @lang('donationMethods.through_Hofath_website')
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Causes -->
    </div>
    <!-- end main-content -->
@endsection
