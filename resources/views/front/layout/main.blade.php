<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Alexa Digital" />
    <meta name="keywords" content="Alexa Digital" />
    <meta name="author" content="Alexa Digital" />
    <meta name="csrf-token" content="{{ @csrf_token() }}" />
    <title>Alexa Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset("css/css-plugin-collections{$direction}.css") }}" rel="stylesheet"/>
    <link id="menuzord-menu-skins" href="{{ asset('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet"/>
    <link href="{{ asset("css/style-main{$direction}.css") }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/colors/theme-skin-orange.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/iziToast/css/iziToast.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .search-popup {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 1500;
        }
        .search-bg {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background-color: rgb(0 0 0 / 85%);
        }

        .search-popup label {
            color: white;
        }

        .search-form {
            display: block;
            margin: 20em 4em;
            position: relative;
            right: -100%;
        }

        .form {
            position: relative;
            width: 60%;
            margin-right: 20%;
            border-bottom: 1px solid;
        }

        .form input {
            outline: none;
            border-width: 0 0 1px 0;
            border-style: none none solid none;
            border-color: #dad6d5;
            background-color: transparent;
            width: 100%;
            padding: 1em 0;
            color: #dad6d5;
        }

        .form input:focus::-webkit-input-placeholder {
            opacity: 0;
        }

        .form input:focus::-moz-placeholder {
            opacity: 0;
        }

        .form input:-ms-input-placeholder {
            opacity: 0;
        }

        .form input:focus:-moz-placeholder {
            opacity: 0;
        }

        .form label {
            position: absolute;
            top: 25%;
            left: 0;
        }

        .notification-container {
            position: relative;
            width: 16px;
            height: 16px;
            top: 0;
            left: 0;
        }

        .notification-container i {
            color: #fff;
        }

        .notification-counter {
            position: absolute;
            top: -2px;
            left: 12px;

            background-color: rgba(212, 19, 13, 1);
            color: #fff;
            border-radius: 3px;
            padding: 1px 3px;
            font: 8px Verdana;
        }

        .nav-search form input[type=search] {
            color: #fff;
            background: rgba(0,0,0,0);
            /*font-size: 60px;*/
            text-align: right;
            border: 0;
            outline: 0;
            font-family: Watan-Regular,sans-serif;
            font-size: 33px;
        }
        .nav-search form button {
            position: absolute;
            top: 90%;
            margin-top: 75px;
            background-color: transparent;
            border: unset;
            border: 2px solid #bed747;
            border-radius: 20px;
            width: 233px;
            height: 51px;
            cursor: pointer;
            font-family: Watan-Extra-Bold,sans-serif;
            font-size: 32px;
            color: #bed747;
            line-height: initial;
            right: 45%;
        }

    </style>
    @stack('styles')
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
</head>

<body>

<div id="wrapper" class="clearfix">
    <header id="header" class="header navbar-scrolltofixed">
        <div class="top-header">
            <div class="container menu-container">
                <div class="col-md-6">
                    <div id="lang" class="py-half pull-{{ $float }}">
{{--                        @if(App::getLocale() !== 'en')--}}
{{--                            <p class="mb-0"><a href="{{ route('updateLang', 'en') }}">English</a></p>--}}
{{--                        @endif--}}
{{--                        @if(App::getLocale() !== 'ar')--}}
{{--                           <p class="mb-0"><a href="{{ route('updateLang', 'ar') }}">Arabic</a></p>--}}
{{--                        @endif--}}
                    </div>
<!--                    <ul class="menuzord-menu menuzord-top-menu">-->
<!--                    @if(auth()->user() == null)-->
<!--                        <li class="py-2"><a class="text-white" href="{{ route('signIn') }}"><i class="fa fa-user" aria-hidden="true"></i>@lang('nav.sign_in')</a></li>-->
<!--                    @else-->
<!--                        @if(auth()->user())-->
<!--                        <li class="py-2"><a class="text-white" href="{{ route('admin.home') }}"><i class="fa fa-user" aria-hidden="true"></i>مرحبا {{auth()->user()->name}}</a></li>-->
<!--                        @endif-->
<!--                        <span class="navbar-text">-->
                            <!-- Right Side Of Navbar -->
<!--                            <ul class="ml-auto navbar-nav">-->
                            <!-- Authentication Links -->
<!--                            @guest-->
<!--                                <li class="nav-item">-->
<!--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>-->
<!--                                </li>-->
<!--                                @if (Route::has('register'))-->
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
<!--                                    </li>-->
<!--                                @endif-->
<!--                            @else-->
<!--                                <li class="nav-item dropdown">-->
<!--                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>-->
<!--                                        {{ Auth::user()->name }}-->
<!--                                    </a>-->

<!--                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
{{-- <!--                                        <a class="dropdown-item" href="{{ route('logout') }}"--> --}}
<!--                                        onclick="event.preventDefault();-->
<!--                                                        document.getElementById('logout-form').submit();">-->
{{-- <!--                                            {{ __('Logout') }}--> --}}
<!--                                        </a>-->

{{-- <!--                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--> --}}
<!--                                            @csrf-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            @endguest-->
<!--                            </ul>-->
<!--                        </span>-->
<!--                    @endif-->
<!--{{--                        <li class="py-2"><a class="text-white" href="{{ route('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>--}}-->
<!--                        <li class="py-2"><a class="text-white notification-container" href="{{ route('cart') }}">-->
<!--                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>-->
<!--{{--                                <span class="notification-counter">{{ Cart::getTotalQuantity() }}</span></a>--}}-->
<!--                                <span class="notification-counter">{{ Cart::getContent()->count() }}</span></a>-->
<!--                        </li>-->
<!--                    </ul>-->
<ul class="menuzord-menu menuzord-top-menu">
  <!--dd(auth()->user()) -->
    @guest
      <li class="py-2">
            <a class="text-white" href="{{ route('signIn') }}">
                <i class="fa fa-user" aria-hidden="true"></i>@lang('nav.sign_in')
            </a>
        </li>
    @else
        <li class="py-2">
            <a class="text-white" href="{{ route('admin.home') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                مرحبا {{ Auth::user()->name[0] }}
            </a>
        </li>
        <span class="navbar-text">
            <!-- Right Side Of Navbar -->
            <ul class="ml-auto navbar-nav">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href=" {{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </span>
    @endguest

    <li class="py-2">
        <a class="text-white notification-container" href="{{ route('cart') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="notification-counter">{{ Cart::getContent()->count() }}</span>
        </a>
    </li>
</ul>

                </div>
                <div class="col-md-6">
                    <ul class="menuzord-menu menuzord-top-menu pull-{{ $float }}">
                        <li class="py-2"><a class="text-white" href="{{ route('donationMethods') }}">@lang('nav.donation_methods')</a> <span class="text-white pipe ml-7">| </span> </li>
                        <li class="py-2"><a class="text-white" href="{{ route('contactUs') }}">@lang('nav.call_us')</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="bg-white header-nav-wrapper">
                <div class="container menu-container">
                    <nav id="menuzord-right" class="menuzord default">
                        <a class="menuzord-brand pull-{{ $float }} flip xs-pull-center" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo-wide.png') }}" alt="">
                        </a>
                        <ul class="menuzord-menu pull-{{ $float }}">
                            @foreach($navSections as $navSection)
                                <li class="{{ (Route::currentRouteName() == $navSection->model) ? 'active' : '' }}">
                                    <a href="{{ route($navSection->model) }}" {{ ($navSection->model == 'onlineService') ? 'target=_blank' : '' }}>{{ $navSection->name }}</a>
                                </li>
                            @endforeach
                            <li class="mr-90"><button data-height="45px" class="m-0 btn btn-colored btn-theme-colored btn-xs font-14" id="search" type="submit"><i class="fa fa-search"></i></button></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="search-popup">
        <div class="search-bg"></div>
        <div class="search-form nav-search">
            <form action="" id="searchForm" class="searchForm">
                <div class="form">
                    <input type="search" id="search" class="input-search" placeholder="@lang('nav.input_search_string')" autocomplete="off">
                    <label for="search"><i class="fa fa-search"></i></label>
                </div>
                <button class="icon-search" type="submit">ابحث</button>
            </form>
        </div>
    </div>

    @yield('content')

    <footer id="footer" class="footer" data-bg-img="{{ asset('images/footer-bg.png') }}" data-bg-color="#073b56">
        <div class="container pb-40 pt-70">
            <div class="row border-bottom-black">
                <div class="col-sm-6 col-md-4">
                    <div class="widget dark">
                        <img alt="" src="{{ asset('images/logo-wide-white-footer.svg') }}" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-sm-6 col-md-5">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">@lang('footer.quick_links')</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{ route('aboutUs') }}"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.who_are_we')</a></li>
                                    <li><a href="{{ route('contactUs') }}"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.call_us')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.our_branches')</a></li>
                                    <li><a href="{{ route('donation') }}"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.donation_methods')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.privacy_policy')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.sitemap')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.they_said')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.news')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.donation_policies')</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.your_guide')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.aqeeqah_sacrifices')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.penances')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.building_mosques')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.water_projects')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.educational_projects')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.development_projects')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.medical_projects')</a></li>
                                    <li><a href="#"><i class="fa fa-angle-{{ $reverseFloat }} ml-5" aria-hidden="true"></i>@lang('footer.halal_earning_projects')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <ul class="clearfix styled-icons icon-sm icon-bordered icon-circled">
                            <li>
                                <a href="https://www.facebook.com/7offath/"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/7offath"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCo8N1cb64WViHe4RuCkZ-UA/featured"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/7offath/"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>

                        <h5 class="mt-10 mb-10 widget-title">@lang('footer.subscribe_us')</h5>
                        <form id="mailchimp-subscription-form-footer" class="newsletter-form1">
                            <div class="input-group">
                                <input type="email" value="" name="EMAIL" placeholder="@lang('footer.add_your_email_here')" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer" style="height: 45px;" />
                                <span class="input-group-btn">
                                <button data-height="45px" class="m-0 btn btn-colored btn-theme-colored btn-xs font-14 custom-btn" type="submit">@lang('footer.subscribe')</button>
                            </span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom" data-bg-color="#054563">
            <div class="container pt-15 pb-15">
                <div class="row">
                    <div class="text-center col-md-12">
                        <p class="m-0 text-white font-12 text-black-777 sm-text-center">@lang('footer.copyright', ['year' => '2023']) <a href="https://www.websutility.com">@lang('footer.webs_utility')</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>

<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/iziToast/js/iziToast.min.js') }}"></script>


<script>

    $('#search').click(function() {
        $('.search-form').animate({right: 0}, 50);
        $('.search-popup').show();
        $('.search-bg').click(function() {
            $('.search-popup').hide();
            $('.search-form').animate({right: '-100%'}, 50);
        });
    });
    $('.addToCart').click(function() {
        var $counter, val;
        $counter = $('.notification-counter');
        val = parseInt($counter.text());
        $counter.fadeTo( "slow" , 0.1);
        let identifier = $(this).attr('data-identifier');
        let name = $('#product_' + identifier + '_name').val();
        let price = $('#product_' + identifier + '_amount').val();
        let image = $('#product_' + identifier + '_image').val();
        const modelArray = identifier.split("_");
        let model = modelArray[0];
        let model_id = modelArray[1];
        if(price > 0){
            val++;
            $.ajax({
                url: '{{ route('cart.store') }}',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {id: identifier, name: name, price: price, image: image, model: model, model_id: model_id},
                success: function () {
                    iziToast.success({
                        title: '{{ __('common.added_to_cart') }}',
                        message: name,
                        position: 'topCenter'
                    });
                },
            });
            $counter.text(val);
        }
        else {
            iziToast.error({
                title: '{{ __('common.add_amount_first') }}',
                position: 'topCenter'
            });
        }
        $counter.fadeTo( "slow" , 1);

    });
    function donateNow(id){
        if($('#product_' + id + '_amount').val() > 0){
            $('#' + id).click();

        }
        else {
            iziToast.error({
                title: '{{ __('common.add_amount_first') }}',
                position: 'topCenter'
            });
        }
    }

    $(function() {
        $('body').on('keydown', '#searchForm', function(e) {
            if (e.which === 32 && e.target.selectionStart === 0) {
                return false;
            }
        });
    });

    $(".searchForm").submit(function(e) {
        e.preventDefault();
    });

    $(".icon-search").click(function() {
        if ($('.input-search').val() != '') {
            var inputValue = $('.input-search').val();
            var withoutSpecial = inputValue.replace(/[&\/\\#,+()$~%.'":*?<>{}]/gi, "").replace(/-/g, '').replace(/_/g, '').replace(/  +/g, ' ').trim();
            var withoutSpace = withoutSpecial.replace(/\s/g, "-");
            var query = encodeURI(withoutSpace);
            window.location.href = "{{ url('search') }}" + '/' + query;
        }
    });
</script>
@stack('scripts')
</body>
</html>
