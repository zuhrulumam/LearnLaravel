<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="{!! asset('css/semantic.min.css')!!}" type="text/css" rel="stylesheet">

        @yield('css')

    </head>

    <body id="@yield('bodyid', 'main')">   

        @include('admin.layouts.navbar')

        @yield('content')



<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->

        <script src="{!! asset('js/jquery.min.js') !!}"></script>
        <script src="{!! asset('js/semantic.min.js') !!}"></script>
        <script type="text/javascript">
                    $('.message .close')
                    .on('click', function () {
                    $(this)
                            .closest('.message')
                            .transition('fade')
                            ;
                    })
                    ;
        </script>

        @yield('js')
    </body>

</html>