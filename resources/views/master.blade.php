<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="{!! asset('css/semantic.min.css')!!}" type="text/css" rel="stylesheet">
        
        @yield('css')

    </head>

    <body id="@yield('bodyid')">        

        @yield('content')

        <script src="{!! asset('js/jquery-1.12.1.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/semantic.min.js') !!}" type="text/javascript"></script>
        
        @yield('js')
    </body>

</html>