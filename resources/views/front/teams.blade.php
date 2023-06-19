@extends('front.layout.main')

@push('styles')
    <style>
        .single-news-list {
            overflow: hidden;
            float: right;
        }

        .single-news-list .wrap {
            background-color: #fff;
            border-radius: 20px;
            border: 2px solid #dfdfdf;
            overflow: hidden;
        }

        .single-news-list h3 a {
            font-size: 20px;
            color: #F26522;
        }

        .single-news-list h3 {
            height: 70px;
        }

    </style>
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
                            <h2 class="text-white font-36">@lang('breadcrumbs.teams')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.teams')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 single-news-list mb-3 mb-md-4">
                        <div class="p-3 wrap">
                            <a href="{{ route('projects') }}"><img src="https://hofath.org/dist/teams/brotherhood.jpeg"
                                                                   alt="تآخي" srcset=""></a>
                            <h3><a href="{{ route('projects') }}">فريق التآخي</a></h3>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
