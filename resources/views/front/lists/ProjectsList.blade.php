@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        @foreach($projects as $key => $project)

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

@foreach($projects as $key => $project)
    <div class="col-md-4 h-card tone{{ $key }} float-{{ $float }}">
        <div class="flip-card-3D-wrapper">
            <div id="flip-card{{ $key }}">
                <div class="flip-card-front{{ $key }}">
                    <div class="causes bg-white maxwidth500 mb-30">
                        <div class="thumb">
                            <img src="{{ asset($project->image) }}" alt=""
                                 class="img-fullwidth">
                        </div>
                        <div class="causes-details border-1px bg-white clearfix p-20 pt-10 pb-20">
                            <h4 class="font-20 text-uppercase">{{ $project->name }}</h4>
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
                                <div class="progress-item mt-30 mb-30">
                                    @lang('relief.share_price') :
                                    <span class="text-theme-colored font-weight-700">{{ $project->cost - $project->paid }} @lang('relief.KWD')</span>
                                </div>
                            @endif
                            <p class="mt-15">{{ $project->description }}</p>
                        </div>
                    </div>
                    <button id="flip-card-btn-turn-to-back{{ $key }}">@lang('relief.donate_now')</button>
                </div>
                <div class="flip-card-back{{ $key }}">
                    <div class="causes bg-white maxwidth500 mb-30">
                        <!-- <div class="thumb">
                          <img src="images/project/single-cause.jpg" alt="" class="img-fullwidth">
                        </div> -->
                        <div class="causes-details border-1px bg-white clearfix p-20 pt-10 pb-20">
                            <h4 class="font-20 text-uppercase">{{ $project->name }}</h4>
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
                                <div class="progress-item mt-30 mb-30">
                                    @lang('relief.share_price') :
                                    <span class="text-theme-colored font-weight-700">{{ $project->cost - $project->paid }} @lang('relief.KWD')</span>
                                </div>
                            @endif

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
                                        <input type="number" value="" name="amount"
                                               placeholder="@lang('relief.enter_amount')"
                                               class="form-control input-lg font-16"
                                               data-height="45px" style="height: 45px;"
                                               id="{{ 'product_project_' . $project->id . '_amount' }}">
                                        <input type="hidden" id="{{ 'product_project_' . $project->id . '_image' }}" value="{{ $project->image }}">
                                        <input type="hidden" id="{{ 'product_project_' . $project->id . '_name' }}" value="{{ $project->name }}">
                                        <span class="input-group-btn">
                                                            <button data-height="45px"
                                                                    class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                                                                    type="button"
                                                                    style="height: 45px;">@lang('relief.KWD')</button>
                                                        </span>
                                    </div>
                                </form>

                                <a href="javascript:void(0);" onclick="donateNow()"
                                   class="btn btn-fill-block">@lang('relief.donate_now')</a>
                                <a href="javascript:void(0);"
                                   class="btn btn-border-block mt-1 addToCart"
                                   data-identifier="{{ 'project_' . $project->id }}">
                                    @lang('relief.add_to_basket')
                                    <i class="ri-shopping-basket-line"></i></a>
                            </div>
                        </div>
                    </div>
                    <button id="flip-card-btn-turn-to-front{{ $key }}">@lang('relief.go_back')</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/flip-card.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function (event) {
            @foreach($projects as $key => $project)
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
        function updateAmount(id, amount){
            $('#product_project_' + id + '_amount').val(amount);
        }
    </script>
@endpush
