<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/media-queries.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" >
        <title>Studentb&amp;b | @yield('title', 'Home')</title>
    </head>
    <body>
        <!-- Header
   ================================================== -->
            <header>
                <div class="row">
                   <div class="twelve columns">
                      <div class="logo">
                         <a href="index.html"><img alt="" src="images/logo.png"></a>
                      </div>

                      <nav id="nav-wrap">
                         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                         <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
                        @include('navs/_navpublic')
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
