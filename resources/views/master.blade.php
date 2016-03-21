<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        
        <link href="{!! asset('css/semantic.min.css')!!}" type="text/css" rel="stylesheet">

        @yield('css')

    </head>

    <body id="@yield('bodyid','main')" >        
        @include('sidebar')
        
        @yield('content')

        <script src="{!! asset('js/jquery.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/semantic.min.js') !!}" type="text/javascript"></script>

        <script>
                    $(document)
                    .ready(function() {

                    // fix menu when passed
                    $('.masthead')
                            .visibility({
                            once: false,
                                    onBottomPassed: function() {
                                    $('.fixed.menu').transition('fade in');
                                    },
                                    onBottomPassedReverse: function() {
                                    $('.fixed.menu').transition('fade out');
                                    }
                            })
                            ;
                            // create sidebar and attach to menu open
                            $('.ui.sidebar')
                            .sidebar('attach events', '.toc.item')
                            ;
                    })
                    ;
        </script>
        @yield('js')
    </body>

</html>