@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/share.css') }}">
@endpush

@section('content')
    <div class="main-content">
        <section class="inner-header divider layer-overlay overlay-dark-8"
                 data-bg-img="{{ asset('images/bg/bg2.webp') }}">
            <div class="container pt-40 pb-40">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 float-{{ $reverseFloat }}">
                            <h2 class="text-white font-36">@lang('breadcrumbs.kafala')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.kafala')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container pt-70 pb-40">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ $kafalahPageDetails->title }}</h2>
                            <p>{{ $kafalahPageDetails->details }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container pt-0 pb-70">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrapper">

                            <div class="tab-wrapper">
                                <ul class="tabs">
                                    <li class="tab-link active" data-tab="all">@lang('kafala.all')</li>
                                    @foreach($kafalahTypes as $type)
                                        <li class="tab-link" data-tab="{{ $type->id }}">{{ $type->name }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <form class="form-group" action="{{ route('kafalat') }}" method="get" id="filterForm">
                                <div class="filter-tab">
                                    <div class="country-gender">
                                        <select class="form-control filterKafalat" name="country">
                                            <option selected="" value="">@lang('kafala.select_country')</option>
                                            @foreach($kafalahCountries as $country)
                                                <option value="{{ $country['id'] }}" {{ request()->get('country') == $country['id'] ? 'selected' : '' }}> {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                        <select class="form-control filterKafalat" name="gender">
                                            <option selected="" value="">@lang('kafala.select_gender')</option>
                                            <option value="Male" {{ request()->get('gender') == 'Male' ? 'selected' : '' }}>@lang('kafala.male')</option>
                                            <option value="Female" {{ request()->get('gender') == 'Female' ? 'selected' : '' }}>@lang('kafala.female')</option>
                                        </select>
                                    </div>
                                    {{--                                    <div class="name">--}}
                                    {{--                                        <div class="input-group">--}}
                                    {{--                                            <input type="email" value="" name="EMAIL" placeholder="@lang('kafala.search_word')" class="form-control input-lg font-16 w-25" data-height="45px" id="mce-EMAIL-footer" style="height: 45px;">--}}
                                    {{--                                            <span class="input-group-btn">--}}
                                    {{--	                                <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="submit" style="height: 45px;"><i class="fa fa-search"></i></button>--}}
                                    {{--	                            </span>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </form>

                            <div class="content-wrapper">
                                <div id="tab-all" class="tab-content active clearfix">
                                    <div class="row mt-2">
                                        @foreach($kafalat as $kafalah)
                                            <div class="col-sm-3 mt-2">
                                                <div class="circle-sponsor text-center">
                                                    <img src="{{ asset($kafalah->image) }}" class="img-fluid">
                                                    <a href="{{ route('sponsorDetail', $kafalah->id) }}" class="text-orange">{{ $kafalah->name }}</a>
                                                    <div class="sponsor-share-btn mt-1">
                                                        <a href="{{ route('sponsorDetail', $kafalah->id) }}"
                                                           class="btn btn-success border-0 button-sponsor btn-lg">@lang('kafala.sponsor_me')
                                                            <i class="ri-heart-fill red-icon"></i></a>
                                                        <!-- <a href="#" class="btn btn-success border-0 button-sponsor btn-lg"><i class="ri-share-fill"></i></a> -->
                                                        <div class="share-button sharer">
                                                            <button type="button"
                                                                    class="btn btn-success border-0 button-sponsor share-btn">
                                                                <i class="ri-share-fill"></i></button>
                                                            <div class="social top center networks-5 ">
                                                                <!-- Facebook Share Button -->
                                                                <a class="fbtn share facebook"
                                                                   href="https://www.facebook.com/sharer/sharer.php?u=url"><i
                                                                        class="fa fa-facebook"></i></a>
                                                                <!-- Google Plus Share Button -->
                                                                <a class="fbtn share gplus"
                                                                   href="https://plus.google.com/share?url=url"><i
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
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @foreach($kafalahTypes as $type)
                                    <div id="tab-{{ $type->id }}" class="tab-content clearfix">
                                        <div class="row">
                                            @foreach($type->kafalat as $kafalah)
                                                <div class="col-sm-3">
                                                    <div class="circle-sponsor text-center">
                                                        <img src="{{ asset($kafalah->image) }}" class="img-fluid">
                                                        <a href="{{ route('sponsorDetail', $kafalah->id) }}" class="text-orange">{{ $kafalah->name }}</a>
                                                        <div class="sponsor-share-btn mt-1">
                                                            <a href="{{ route('sponsorDetail', $kafalah->id) }}"
                                                               class="btn btn-success border-0 button-sponsor btn-lg">@lang('kafala.sponsor_me')
                                                                <i class="ri-heart-fill red-icon"></i></a>
                                                            <!-- <a href="#" class="btn btn-success border-0 button-sponsor btn-lg"><i class="ri-share-fill"></i></a> -->
                                                            <div class="share-button sharer">
                                                                <button type="button"
                                                                        class="btn btn-success border-0 button-sponsor share-btn">
                                                                    <i class="ri-share-fill"></i></button>
                                                                <div class="social top center networks-5 ">
                                                                    <!-- Facebook Share Button -->
                                                                    <a class="fbtn share facebook"
                                                                       href="https://www.facebook.com/sharer/sharer.php?u=url"><i
                                                                            class="fa fa-facebook"></i></a>
                                                                    <!-- Google Plus Share Button -->
                                                                    <a class="fbtn share gplus"
                                                                       href="https://plus.google.com/share?url=url"><i
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
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
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

        $('.tab-link').click(function () {

            var tabID = $(this).attr('data-tab');

            $(this).addClass('active').siblings().removeClass('active');

            $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
        });

        $('.filterKafalat').on('change', function(){
            console.log('test');
            $('#filterForm').submit();
        });
    </script>
@endpush
