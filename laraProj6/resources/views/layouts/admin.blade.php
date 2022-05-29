<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/media-queries.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" >
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/favicon.ico')}}" >
        <script type="text/javascript" src="{{ URL::asset('js/functions.js') }}"></script>
        @section('scripts')
        @show
        <title>HouStudent | @yield('title', 'Home')</title>
    </head>
    <body>
        <!-- Header
   ================================================== -->
            <header>
                <div class="row">
                   <div class="twelve columns">
                      <div class="logo">
                         <a href="{{ Route('home') }}"><img alt="" src="/images/logo.png"></a>
                      </div>

                      <nav id="nav-wrap">
                         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                         <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
                        @include('navs/_navadmin')
                      </nav>
                       <!-- end #nav-wrap -->
                   </div>
                </div>
            </header> <!-- Header End -->

            <!-- end #menu -->
            <div>
                @yield('content')
            </div>

            <!-- end #content -->
            <footer>
                @include('footer/_footer')
            </footer> 
            <!-- end #footer -->
        </div>
    </body>
</html>


