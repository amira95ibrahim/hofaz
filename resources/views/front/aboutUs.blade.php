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
                            <h2 class="text-white font-36">@lang('breadcrumbs.about_us')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.about_us')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Mission -->
        <section class="divider parallax layer-overlay overlay-deep">
            <div class="container pt-40 pb-60">
                <div class="row text-justify">
                    <div class="col-md-12">
                        <h3 class="line-bottom">@lang('aboutUs.app_name')</h3>
                        @lang('aboutUs.app_description')

                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- end main-content -->

@endsection
