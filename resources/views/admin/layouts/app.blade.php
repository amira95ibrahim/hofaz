<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- Icons -->
    <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/_icons.scss') }}" rel="stylesheet">

    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
  
    <!-- Main styles for this application -->
    <link href="{{ asset('backend/dest/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('backend/css/adminlte.min.css')}}">
    @stack('third_party_stylesheets')

    @stack('page_css')
  

</head>
<!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->

<body class="navbar-fixed sidebar-nav fixed-nav">
<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="{{ route('admin.home') }}"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down">
            <li class="ml-20 nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('images/favicon.png') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="hidden-md-down">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <small>عضو منذ {{ Auth::user()->created_at->format('M. Y') }}</small>
                    </div>
{{--                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> @lang('auth.profile')</a>--}}
{{--                    <div class="divider"></div>--}}
                    <a href="#" class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i>
                        تسجيل خروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
    </div>
</header>
@include('admin.layouts.sidebar')

<!-- Main content -->
<main class="main">
    @yield('content')
</main>
    
       
<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('backend/js/libs/jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/tether.min.js') }}"></script>
<script src="{{ asset('backend/js/libs/bootstrap.min.js') }}"></script>
 <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>-->
<script src="{{ asset('backend/js/libs/pace.min.js') }}"></script>

<!--<script src="{{ asset('backend/js/libs/Chart.min.js') }}"></script>-->
 
   
<!-- CoreUI main scripts -->
<script src="{{ asset('backend/js/app.js') }}"></script>

<!-- Plugins and scripts required by this views -->
<!--<script src="{{ asset('backend/js/views/main.js') }}"></script>-->

<!-- Custom scripts required by this view -->
<script src="{{ asset('vendor/tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{asset('backend/js/adminlte.min.js')}}"></script>
<!-- Initialization script for bsCustomFileInput -->
<script>
    // $(function () {
    //     bsCustomFileInput.init();
    // });


    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
<script>
    tinymce.init({
        selector: '.textarea'
    });
</script>

@stack('third_party_scripts')

@stack('page_scripts')
</body>

</html>
