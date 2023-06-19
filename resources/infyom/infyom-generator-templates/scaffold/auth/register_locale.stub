<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>{{ config('app.name') }} | @lang('auth.registration.title')</title>
    <!-- Icons -->
    <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('backend/dest/style.css') }}" rel="stylesheet">
</head>

<body class="">
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-x-auto pull-xs-none vamiddle">
                <div class="card">
                    <div class="card-block p-a-2">
                        <h1>@lang('auth.registration.title')</h1>
                        <p class="text-muted">حساب کاربری خود را بسازید!</p>
                        <form method="post" action="{{ route('register') }}">
                            @csrf
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}"
                                   placeholder="@lang('auth.full_name')">
                            @error('name')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon">@</span>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control en @error('email') is-invalid @enderror"
                                   placeholder="@lang('auth.email')">
                            @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password"
                                   name="password"
                                   class="form-control en @error('password') is-invalid @enderror"
                                   placeholder="@lang('auth.password')">
                            @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group m-b-2">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control en"
                                   placeholder="@lang('auth.confirm_password')">
                        </div>
                        <button type="submit" class="btn btn-block btn-success">
                            <i class="icon-user-follow"></i>
                            @lang('auth.register')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('backend/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('backend/js/libs/bootstrap.min.js') }}"></script>
    <script>
        function verticalAlignMiddle()
        {
            var bodyHeight = $(window).height();
            var formHeight = $('.vamiddle').height();
            var marginTop = (bodyHeight / 2) - (formHeight / 2);
            if (marginTop > 0)
            {
                $('.vamiddle').css('margin-top', marginTop);
            }
        }
        $(document).ready(function()
        {
            verticalAlignMiddle();
        });
        $(window).bind('resize', verticalAlignMiddle);
    </script>
    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js"></script>
</body>

</html>
