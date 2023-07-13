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
                            <h2 class="text-white font-36">{{ $project->name }}</h2>
                            <ol class="breadcrumb mt-10 white">
                                <li><a href="{{ route('home') }}">@lang('breadcrumbs.home')</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li><a href="{{ route($model) }}">{{ __('breadcrumbs.' . $model) }}</a></li>
                                <li class="active ml-5"><i class="fa fa-angle-left"></i></li>
                                <li class="active">{{ $project->name }}</li>
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
                            <h2> {{ $project->name }} - <span class="text-theme-colored"> {{ $project->country->name }} </span></h2>
                            <div class="row vertical-align-middle">
                                <div class="col-sm-12 ml-100">
                                    <div class="form-group">
                                        @if($project->show_remaining)
                                            <ul class="list-inline font-weight-600 font-16 clearfix mt-15">
                                                <li class="pull-left font-weight-400 text-black-333 pr-0">@lang('relief.raised')
                                                    :
                                                    <span class="text-theme-colored font-weight-700">{{ number_format($project->cost - $project->paid) }} @lang('relief.KWD')</span>
                                                </li>
                                                <li class="pull-right font-weight-400 text-black-333 pr-0">@lang('relief.goal')
                                                    :
                                                    <span class="text-theme-colored font-weight-700">{{ number_format($project->cost) }} @lang('relief.KWD')</span>
                                                </li>
                                            </ul>
                                            <div class="progress-item mt-15">
                                                <div class="progress mb-0">
                                                    <div data-percent="{{ round(($project->paid * 100) / $project->cost) }}" class="progress-bar"><span
                                                            class="percent">0</span></div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="progress-item text-center font-weight-700 text-black-333 mt-30 mb-30 share_price">
                                                @lang('relief.share_price') :
                                                <span class="text-theme-colored font-weight-700">{{ $project->cost }} @lang('relief.KWD')</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="donation-amount">
                                <h5>@lang('relief.choose_donation_amount')</h5>

                                <div class="slect-amount">
                                    <div class="button">
                                        <input type="radio" id="a25" name="check-substitution-2"
                                               onclick="updateAmount('{{ $project->id }}', '{{ $project->initial_amount }}')"/>
                                        <label class="btn btn-default"
                                               for="a25">{{ $project->initial_amount }} @lang('waqf.KWD')</label>
                                    </div>
                                    <div class="button">
                                        <input type="radio" id="a50" name="check-substitution-2"
                                               onclick="updateAmount('{{ $project->id }}', '{{ ($project->show_remaining) ? $project->initial_amount + 10 : $project->initial_amount * 2 }}')"/>
                                        <label class="btn btn-default"
                                               for="a50">{{ ($project->show_remaining) ? $project->initial_amount + 10 : $project->initial_amount * 2 }} @lang('waqf.KWD')</label>
                                    </div>
                                    <div class="button">
                                        <input type="radio" id="a75" name="check-substitution-2"
                                               onclick="updateAmount('{{ $project->id }}', '{{ ($project->show_remaining) ? $project->initial_amount + 20 : $project->initial_amount * 3 }}')"/>
                                        <label class="btn btn-default"
                                               for="a75">{{ ($project->show_remaining) ? $project->initial_amount + 20 : $project->initial_amount * 3 }} @lang('waqf.KWD')</label>
                                    </div>
                                    <div class="button">
                                        <input type="radio" id="a75" name="check-substitution-2"
                                               onclick="updateAmount('{{ $project->id }}', '{{ ($project->show_remaining) ? $project->initial_amount + 30 : $project->initial_amount * 4 }}')"/>
                                        <label class="btn btn-default"
                                               for="a75">{{ ($project->show_remaining) ? $project->initial_amount + 30 : $project->initial_amount * 4 }} @lang('waqf.KWD')</label>
                                    </div>
                                </div>
                                <div class="or mt-1"> - @lang('relief.or') -</div>

                                <form class="mt-1">
                                    <div class="input-group">
                                        <input type="number" value="{{ $project->initial_amount }}" name="amount"
                                               placeholder="@lang('relief.enter_amount')"
                                               class="form-control input-lg font-16"
                                               data-height="45px" style="height: 45px;"
                                               id="{{ 'product_' . $model . '_' . $project->id . '_amount' }}">
                                        <input type="hidden" id="{{ 'product_' . $model . '_' . $project->id . '_image' }}" value="{{ $project->image }}">
                                        <input type="hidden" id="{{ 'product_' . $model . '_' . $project->id . '_name' }}" value="{{ $project->name }}">
                                        <span class="input-group-btn">
                                            <button data-height="45px"
                                                    class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                                                    type="button" style="height: 45px;">
                                                @lang('relief.KWD')
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="form-group">
                                <label>@lang('sadaqa.notes')</label>
                                <input type="text" class="form-control br-20 mb-15" name="">
                            </div>
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

                                <button type="button" class="btn custom-btn-success mr-5" onclick="donateNow('{{ $model . '_' . $project->id }}')"><i
                                   class="ri-coins-line btn-icon"></i> @lang('relief.donate_now')
                                </button>
                                <button type="button" class="btn custom-btn-success mr-5 addToCart" id="{{ $model . '_' . $project->id }}"
                                        data-identifier="{{ $model . '_' . $project->id }}"><i
                                        class="ri-shopping-cart-line btn-icon"></i> @lang('relief.add_to_basket')
                                </button>
                                <button type="button" class="btn custom-btn-success mr-5"><i
                                        class="ri-bank-card-line btn-icon"></i> @lang('sadaqa.deduction')
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset($project->image) }}" alt="" class="w-100">
                        </div>
                        <div class="col-md-6">
                            <h4 style="border-bottom: 1px solid orange;background: antiquewhite;padding: 8px; margin-bottom: 0;">@lang('projects.project_description')</h4>
                            <p style="margin-top: 15px;font-size: 16px;">{{ $project->description }}</p>
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
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name=' + fieldName + ']').val(currentVal + 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0);
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
                    $('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0);
                }
            });
            $(".share-btn").click(function (e) {
                $('.networks-5').not($(this).next(".networks-5")).each(function () {
                    $(this).removeClass("active");
                });
                $(this).next(".networks-5").toggleClass("active");
            });
        });
        function updateAmount(id, amount){
            $('#product_{{ $model }}_' + id + '_amount').val(amount);
        }
    </script>
@endpush
