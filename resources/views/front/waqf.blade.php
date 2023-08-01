@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        @foreach($waqf as $key => $item)

        #flip-card{{ $key }}  {
            width: 100%;
            height: 100%;
            text-align: center;
            margin: 50px auto;
            /*position: absolute;*/
            -o-transition: all 1s ease-in-out;
            -webkit-transition: all 1s ease-in-out;
            -ms-transition: all 1s ease-in-out;
            transition: all 1s ease-in-out;
            -o-transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            -ms-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        .do-flip{{ $key }}  {
            -o-transform: rotateY(-180deg);
            -webkit-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
        }

        #flip-card-btn-turn-to-back{{ $key }}, #flip-card-btn-turn-to-front{{ $key }}  {
            background: white;
            cursor: pointer;
            visibility: hidden;
            /*font-family: 'Open Sans', sans-serif;*/
            font-size: 16px;
            padding: 10px 30px;
            color: #f26522;
            border: 1px solid #f26522;
        }

        #flip-card{{ $key }} .flip-card-front{{ $key }}, #flip-card{{ $key }} .flip-card-back{{ $key }} {
            width: 100%;
            height: 100%;
            position: absolute;
            -o-backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;
            z-index: 2;
            -webkit-box-shadow: 5px 6px 32px 2px rgba(133, 133, 133, 0.71);
            -moz-box-shadow: 5px 6px 32px 2px rgba(133, 133, 133, 0.71);
            box-shadow: 5px 6px 32px 2px rgba(133, 133, 133, 0.71);
        }

        #flip-card{{ $key }} .flip-card-front{{ $key }}  {
            background: lightgreen;
            border: 1px solid grey;
        }

        #flip-card{{ $key }} .flip-card-back{{ $key }}  {
            background: lightblue;
            border: 1px solid grey;
            -o-transform: rotateY(180deg);
            -webkit-transform: rotateY(180deg);
            -ms-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        .h-card {
            height: 610px;
        }

        .btn-fill-block {
            display: block;
            background: #f26522;
            color: #fff;
        }

        .btn-border-block {
            display: block;
            border: 1px solid #f26522;
        }
        @endforeach
    </style>
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
                            <h2 class="text-white font-36">@lang('breadcrumbs.waqf')</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">@lang('breadcrumbs.waqf')</li>
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
                            <h2>{{ $waqfPageDetails->title }}</h2>
                            <p>{{ $waqfPageDetails->details }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <form class="form-group" action="{{ route('waqf') }}" method="get" id="filterForm">
                                <div class="filter-tab">
                                    <div class="country-gender">
                                        <select class="form-control filterWaqf" name="country">
                                            <option selected="" value="">@lang('kafala.select_country')</option>
                                            @foreach($waqfCountries as $country)
                                                <option value="{{ $country['id'] }}" {{ request()->get('country') == $country['id'] ? 'selected' : '' }}> {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @foreach($waqf as $key => $item)
                        <div class="col-md-4 h-card tone{{ $key }} float-{{ $float }}">
                            <div class="flip-card-3D-wrapper">
                                <div id="flip-card{{ $key }}">
                                    <div class="flip-card-front{{ $key }}">
                                        <div class="causes bg-white maxwidth500 mb-30">
                                            <div class="thumb">
                                                <a href="{{ route('waqf.show', $item->id) }}">
                                                    <img src="{{ asset($item->image) }}" alt=""
                                                         class="img-fullwidth">
                                                </a>
                                            </div>
                                            <div class="causes-details border-1px bg-white clearfix p-20 pt-10 pb-20">
                                                <h4 class="font-20 text-uppercase"><a href="{{ route('waqf.show', $item->id) }}">{{ $item->name }}</a></h4>
                                                @if($item->show_remaining)
                                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-15">
                                                        <li class="pull-left font-weight-400 text-black-333 pr-0">@lang('waqf.raised')
                                                            :
                                                            <span class="text-theme-colored font-weight-700">{{ number_format($item->cost - $item->paid) }} @lang('waqf.KWD')</span>
                                                        </li>
                                                        <li class="pull-right font-weight-400 text-black-333 pr-0">@lang('waqf.goal')
                                                            :
                                                            <span class="text-theme-colored font-weight-700">{{ number_format($item->cost) }} @lang('waqf.KWD')</span>
                                                        </li>
                                                    </ul>
                                                    <div class="progress-item mt-15">
                                                        <div class="progress mb-0">
                                                            <div data-percent="{{ round(($item->paid * 100) / $item->cost) }}" class="progress-bar"><span
                                                                    class="percent">0</span></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="progress-item mt-30 mb-30">
                                                        @lang('relief.share_price') :
                                                        <span class="text-theme-colored font-weight-700">{{ $item->cost }} @lang('waqf.KWD')</span>
                                                    </div>
                                                @endif
{{--                                                <p class="mt-15">{{ $item->description }}</p>--}}
                                            </div>
                                        </div>
                                        <button id="flip-card-btn-turn-to-back{{ $key }}">@lang('waqf.donate_now')</button>
                                    </div>
                                    <div class="flip-card-back{{ $key }}">
                                        <div class="causes bg-white maxwidth500 mb-30">
                                            <!-- <div class="thumb">
                                              <img src="images/project/single-cause.jpg" alt="" class="img-fullwidth">
                                            </div> -->
                                            <div class="causes-details border-1px bg-white clearfix p-20 pt-10 pb-20">
                                                <h4 class="font-20 text-uppercase"><a href="{{ route('waqf.show', $item->id) }}">{{ $item->name }}</a></h4>
                                                @if($item->show_remaining)
                                                    <ul class="list-inline font-weight-600 font-16 clearfix mt-15">
                                                        <li class="pull-left font-weight-400 text-black-333 pr-0">@lang('waqf.raised')
                                                            :
                                                            <span class="text-theme-colored font-weight-700">{{ number_format($item->cost - $item->paid) }} @lang('waqf.KWD')</span>
                                                        </li>
                                                        <li class="pull-right font-weight-400 text-black-333 pr-0">@lang('waqf.goal')
                                                            :
                                                            <span class="text-theme-colored font-weight-700">{{ number_format($item->cost) }} @lang('waqf.KWD')</span>
                                                        </li>
                                                    </ul>
                                                    <div class="progress-item mt-15">
                                                        <div class="progress mb-0">
                                                            <div data-percent="{{ round(($item->paid * 100) / $item->cost) }}" class="progress-bar"><span
                                                                    class="percent">0</span></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="progress-item mt-30 mb-30">
                                                        @lang('relief.share_price') :
                                                        <span class="text-theme-colored font-weight-700">{{ $item->cost }} @lang('waqf.KWD')</span>
                                                    </div>
                                                @endif

                                                <div class="donation-amount">
                                                    <h5>@lang('waqf.choose_donation_amount')</h5>

                                                    <div class="slect-amount">
                                                        <div class="button">
                                                            <input type="radio" id="a25" name="check-substitution-2"
                                                                   onclick="updateAmount('{{ $item->id }}', '{{ $item->initial_amount }}')"/>
                                                            <label class="btn btn-default"
                                                                   for="a25">{{ $item->initial_amount }} @lang('waqf.KWD')</label>
                                                        </div>
                                                        <div class="button">
                                                            <input type="radio" id="a50" name="check-substitution-2"
                                                                   onclick="updateAmount('{{ $item->id }}', '{{ ($item->show_remaining) ? $item->initial_amount + 10 : $item->initial_amount * 2 }}')"/>
                                                            <label class="btn btn-default"
                                                                   for="a50">{{ ($item->show_remaining) ? $item->initial_amount + 10 : $item->initial_amount * 2 }} @lang('waqf.KWD')</label>
                                                        </div>
                                                        <div class="button">
                                                            <input type="radio" id="a75" name="check-substitution-2"
                                                                   onclick="updateAmount('{{ $item->id }}', '{{ ($item->show_remaining) ? $item->initial_amount + 20 : $item->initial_amount * 3 }}')"/>
                                                            <label class="btn btn-default"
                                                                   for="a75">{{ ($item->show_remaining) ? $item->initial_amount + 20 : $item->initial_amount * 3 }} @lang('waqf.KWD')</label>
                                                        </div>
                                                        <div class="button">
                                                            <input type="radio" id="a75" name="check-substitution-2"
                                                                   onclick="updateAmount('{{ $item->id }}', '{{ ($item->show_remaining) ? $item->initial_amount + 30 : $item->initial_amount * 4 }}')"/>
                                                            <label class="btn btn-default"
                                                                   for="a75">{{ ($item->show_remaining) ? $item->initial_amount + 30 : $item->initial_amount * 4 }} @lang('waqf.KWD')</label>
                                                        </div>
                                                    </div>
                                                    <div class="or mt-1"> - @lang('waqf.or') -</div>

                                                    <form class="mt-1">
                                                        <div class="input-group">
                                                            <input type="number" value="" name="amount"
                                                                   placeholder="@lang('waqf.enter_amount')"
                                                                   class="form-control input-lg font-16"
                                                                   data-height="45px" style="height: 45px;"
                                                                   id="{{ 'product_waqf_' . $item->id . '_amount' }}">
                                                            <input type="hidden" id="{{ 'product_waqf_' . $item->id . '_image' }}" value="{{ $item->image }}">
                                                            <input type="hidden" id="{{ 'product_waqf_' . $item->id . '_name' }}" value="{{ $item->name }}">
                                                            <span class="input-group-btn">
                                                            <button data-height="45px"
                                                                    class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                                                                    type="button"
                                                                    style="height: 45px;">@lang('waqf.KWD')</button>
                                                        </span>
                                                        </div>
                                                    </form>

                                                    <a href="javascript:void(0);"
                                                        onclick="donateNow('{{ 'waqf_'  . $item->id }}', 'waqf', {{$item->id}}, getUserIdFromURL())"
                                                          class="btn btn-fill-block">@lang('waqf.donate_now')</a>
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-border-block mt-1 addToCart" id="{{ 'waqf_' . $item->id }}"
                                                       data-identifier="{{ 'waqf_' . $item->id }}">
                                                        @lang('waqf.add_to_basket')
                                                        <i class="ri-shopping-basket-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="flip-card-btn-turn-to-front{{ $key }}">@lang('waqf.go_back')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div style="clear: both;"></div>
                </div>
            </div>
        </section>
        <div style="clear: both;"></div>

    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/flip-card.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function (event) {
            @foreach($waqf as $key => $item)
            document.getElementById('flip-card-btn-turn-to-back{{ $key }}').style.visibility = 'visible';
            document.getElementById('flip-card-btn-turn-to-front{{ $key }}').style.visibility = 'visible';

            document.getElementById('flip-card-btn-turn-to-back{{ $key }}').onclick = function () {
                document.getElementById('flip-card{{ $key }}').classList.toggle('do-flip{{ $key }}');
            };

            document.getElementById('flip-card-btn-turn-to-front{{ $key }}').onclick = function () {
                document.getElementById('flip-card{{ $key }}').classList.toggle('do-flip{{ $key }}');
            };
            @endforeach
        });
        $('.filterWaqf').on('change', function(){
            $('#filterForm').submit();
        });

        function updateAmount(id, amount){
            $('#product_waqf_' + id + '_amount').val(amount);
        }
    </script>
@endpush

