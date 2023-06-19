@extends('front.layout.main')

@push('styles')

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
                            <h2 class="text-white font-36">@lang('breadcrumbs.projects')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.projects')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    @foreach($publications as $publication)
                        <div class="col-md-3 float-{{ $reverseFloat }} mt-20">
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
                                                        <a href="{{ asset($publication->pdf) }}" class="text-white" target="_blank">{{ $publication->name }}</a>
                                                    </div>
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
        </section>
    </div>
@endsection

@push('scripts')

@endpush
