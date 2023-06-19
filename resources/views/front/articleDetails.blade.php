@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/share{$direction}.css") }}">
@endpush

@section('content')
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="{{ asset('images/bg/bg2.webp') }}">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.hofath_news')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li><a href="{{ route('news') }}">{{ __('breadcrumbs.news') }}</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">{{ $article->name }}</li>
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
                            <h4 style="border-bottom: 1px solid orange;background: antiquewhite;padding: 8px; margin-bottom: 0;">{{ $article->name }}</h4>
                            <ul class="list-inline font-weight-600 font-16 clearfix mt-15">
                                <li class="pull-{{ $float }} font-weight-400 text-black-333 pr-0">
                                    <span class="mb-10 mr-10"><i
                                            class="fa fa-calendar mr-5 text-theme-colored"></i> {{ $article->publishing_date }}</span>
                                </li>
                            </ul>
                            <p style="margin-top: 15px;font-size: 16px;">{{ $article->description }}</p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($article->image) }}" alt="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
    </script>
@endpush
