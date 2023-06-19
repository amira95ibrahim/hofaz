@extends('front.layout.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs.css') }}">
    <style>
        :root {
            --primary-color: #F26522;
            --secondary-color: #f5f5f5;
        }
        #tabs-container {
            /*position: absolute;*/
            /*left: 0;*/
            /*top: 0;*/
            /*right: 0;*/
            /*bottom: 0;*/
            margin-top: 3%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #tabs-container .tabs {
            display: flex;
            position: relative;
            background-color: #fff;
            box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
            padding: 0.75rem;
            border-radius: 99px;
            margin-bottom: 0;
        }
        #tabs-container .tabs * {
            z-index: 2;
        }

        #tabs-container input[type=radio] {
            display: none;
        }

        #tabs-container .tab {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 54px;
            width: 200px;
            font-size: 1.25rem;
            font-weight: 500;
            border-radius: 99px;
            cursor: pointer;
            transition: color 0.15s ease-in;
        }

        #tabs-container .notification {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            margin-left: 0.75rem;
            border-radius: 50%;
            background-color: var(--secondary-color);
            transition: 0.15s ease-in;
            margin-right: 5%;
        }

        #tabs-container input[type=radio]:checked + label {
            color: var(--primary-color);
        }
        #tabs-container input[type=radio]:checked + label > .notification {
            background-color: var(--primary-color);
            color: #fff;
        }

        #tabs-container input[id=radio-1]:checked ~ .glider {
            transform: translateX(200%);
        }

        #tabs-container input[id=radio-2]:checked ~ .glider {
            transform: translateX(100%);
        }

        #tabs-container input[id=radio-3]:checked ~ .glider {
            transform: translateX(0%);
        }

        #tabs-container input[id=radio-4]:checked ~ .glider {
            transform: translateX(-100%);
        }

        #tabs-container input[id=radio-5]:checked ~ .glider {
            transform: translateX(-200%);
        }

        #tabs-container .glider {
            position: absolute;
            display: flex;
            height: 54px;
            width: 200px;
            background-color: var(--secondary-color);
            z-index: 1;
            border-radius: 99px;
            transition: 0.25s ease-out;
        }

        @media (max-width: 700px) {
            #tabs-container .tabs {
                transform: scale(0.6);
            }
        }
    </style>
@endpush

@section('content')

    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: Blog -->
        <section>
            <div id="tabs-container">
                <div class="tabs">
                    <input type="radio" id="radio-1" class="radio-input" name="tabs" disabled/>
                    <label class="tab" for="radio-1" onclick="{{ $news->count() ? 'openTab(event, \'projectsTab\')' : '' }}">@lang('nav.projects')<span class="notification">{{ $projects->count() }}</span></label>
                    <input type="radio" id="radio-2" class="radio-input" name="tabs" disabled/>
                    <label class="tab" for="radio-2" onclick="{{ $news->count() ? 'openTab(event, \'waqfTab\')' : '' }}">@lang('nav.waqf')<span class="notification">{{ $waqf->count() }}</span></label>
                    <input type="radio" id="radio-3" class="radio-input" name="tabs" disabled/>
                    <label class="tab" for="radio-3" onclick="{{ $news->count() ? 'openTab(event, \'reliefsTab\')' : '' }}">@lang('nav.relief')<span class="notification">{{ $reliefs->count() }}</span></label>
                    <input type="radio" id="radio-4" class="radio-input" name="tabs" disabled/>
                    <label class="tab" for="radio-4" onclick="{{ $news->count() ? 'openTab(event, \'kafalatTab\')' : '' }}">@lang('nav.kafala')<span class="notification">{{ $kafala->count() }}</span></label>
                    <input type="radio" id="radio-5" class="radio-input" name="tabs" disabled/>
                    <label class="tab" for="radio-5" onclick="{{ $news->count() ? 'openTab(event, \'newsTab\')' : '' }}">@lang('nav.news')<span class="notification">{{ $news->count() }}</span></label>
                    <span class="glider"></span>
                </div>
            </div>

            <div class="container pt-70 pb-70">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrapper">
                            @if($projects->count())
                                <div id="projectsTab" class="tab-content clearfix">
                                    @include('front.lists.ProjectsList', ['projects' => $projects])
                                </div>
                            @endif

                            @if($waqf->count())
                                <div id="waqfTab" class="tab-content clearfix">
                                    @include('front.lists.ProjectsList', ['projects' => $waqf])
                                </div>
                            @endif

                            @if($reliefs->count())
                                <div id="reliefsTab" class="tab-content clearfix">
                                    @include('front.lists.ProjectsList', ['projects' => $reliefs])
                                </div>
                            @endif

                            @if($kafala->count())
                                <div id="kafalatTab" class="tab-content clearfix">
                                    @include('front.lists.KafalatList', ['kafalat' => $kafala])
                                </div>
                            @endif

                            @if($news->count())
                                <div id="newsTab" class="tab-content clearfix">
                                    @include('front.lists.NewsList', ['new' => $news])
                                </div>
                            @endif

                            @if(!$projects->count() && !$waqf->count() && !$reliefs->count() && !$kafala->count() && !$news->count())
                                    <div class="section-content">
                                        <div class="row">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('images/no-results.png') }}">
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <h3 class="text-theme-colored">
                                                    @lang('common.no_search_results')
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->

@endsection


@push('scripts')
    <script type="text/javascript">
        function openTab(evt, cityName) {
            // Declare all variables
            var i, tabcontent;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        $( document ).ready(function() {
            $('.tab-content').not(':eq(0)').hide();
            $('.tab-content').eq(0).addClass('active');
            let first = true;
            $('.notification').each(function(i, obj) {
                if(parseInt($(this).html()) > 0){
                    if(first){
                        $(this).parent().prev().attr('checked', true);
                        first = false;
                    }
                    $(this).parent().prev().prop('disabled', false);
                }
            });
        });

    </script>
@endpush
