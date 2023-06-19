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
                            <h2 class="text-white font-36">@lang('breadcrumbs.hofath_news')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.news')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    @foreach($news as $article)
                        <div class="col-xs-12 col-sm-6 col-md-4 float-{{ $reverseFloat }} mb-20">
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
                                    <p>{{ mb_substr($article->description, 0, 200,'utf-8') . ' ...' }}</p>
                                    <a href="{{ route('news.details', $article->id) }}"
                                       class="btn btn-default btn-sm btn-theme-colored mt-10">@lang('index.read_more')</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')

@endpush
