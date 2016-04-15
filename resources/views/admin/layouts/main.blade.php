<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel='stylesheet' type='text/css' />
        <link href="{!! asset('css/style.css') !!}" rel='stylesheet' type='text/css' />
        <link href="{!! asset('css/font-awesome.css') !!}" rel='stylesheet' type='text/css' />
        <link href="{!! asset('css/icon-font.min.css') !!}" rel='stylesheet' type='text/css' />
        <link href="{!! asset('css/animate.css') !!}" rel='stylesheet' type='text/css' />        
        
        <script src="{!! asset('js/jquery-2.2.3.min.js') !!}"></script>

        <script src="{!! asset('js/Chart.js') !!}"></script>
        <script src="{!! asset('js/wow.min.js') !!}"></script>
        <script>
                    new WOW().init();</script>

        <script src="{!! asset('js/jquery.validate.min.js') !!}"></script>

        <script src="{!! asset('js/ckeditor/ckeditor.js') !!}"></script>

        <script src="{!! asset('js/jquery.pjax.js') !!}"></script>

        @yield('css')

    </head>

    <body class="sticky-header left-side-collapsed"  onload="initMap()">   
        <section>
            @include('admin.layouts.navbar')
            <!-- main content start-->
            <div class="main-content">

                @include('admin.layouts.notification')
                <div id="page-wrapper">
                    @yield('content')
                </div>
            </div>

            @include('admin.layouts.footer')

        </section>

        <script src="{!! asset('js/jquery.nicescroll.js') !!}"></script>
        <script src="{!! asset('js/scripts.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>



        @yield('js')
    </body>

</html>