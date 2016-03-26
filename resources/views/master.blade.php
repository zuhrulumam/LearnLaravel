<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="{!! asset('css/bootstrap.min.css')!!}" type="text/css" rel="stylesheet">
        <link href="{!! asset('css/user/style.css')!!}" type="text/css" rel="stylesheet">   

        <script src="{!! asset('js/jquery-1.10.2.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/user/move-top.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('js/user/easing.js') !!}" type="text/javascript"></script>

        <script type="text/javascript">
                    jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
            event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 1000);
            });
            });</script>

        @yield('css')

    </head>

    <body id="@yield('bodyid','main')" >      
        <div class="banner-body">
            <div class="container">
                @include('menubar')
                <div class="header-bottom">
                    <div class="header-bottom-top">
                        <ul>
                            <li><a href="#" class="g"> </a></li>
                            <li><a href="#" class="p"> </a></li>
                            <li><a href="#" class="facebook"> </a></li>
                            <li><a href="#" class="twitter"> </a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                    @yield('content')
                </div>

            </div>
        </div>
        @include('footer')


        <script src="{!! asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>

        @yield('js')
    </body>

</html>