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

        <script src="{!! asset('js/jquery-1.10.2.min.js') !!}"></script>
      
        @yield('css')

    </head>

    <body class="sign-in-up">   
        <section>
           

                <div id="page-wrapper" class="sign-in-wrapper">
                    @yield('content')
                </div>      

            @include('admin.layouts.footer')

        </section>

        <script src="{!! asset('js/jquery.nicescroll.js') !!}"></script>
        <script src="{!! asset('js/scripts.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>




        @stack('js')
    </body>

</html>