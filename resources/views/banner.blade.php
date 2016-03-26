<!-- banner -->
<div class="banner">
    <!-- Slider-starts-Here -->
     <script src="{!! asset('js/user/responsiveslides.min.js') !!}" type="text/javascript"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--//End-slider-script -->
    <div  id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
        <ul class="rslides" id="slider3">
            <li>
                <div class="banner-inf">
                    <h3>soluta nobis est eligendi cumque</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis, ante interdum vehicula pretium, dui enim porta
                        lectus, non euismod tortor ante eu libero</p>
                    <a href="single.html">See More</a>
                </div>
            </li>
            <li>
                <div class="banner-inf">
                    <h3>euismod nobis est eligendi cumque</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis, ante interdum vehicula pretium, dui enim porta
                        lectus, non euismod tortor ante eu libero</p>
                    <a href="single.html">See More</a>
                </div>
            </li>
            <li>
                <div class="banner-inf">
                    <h3>tortor nobis est eligendi cumque</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis, ante interdum vehicula pretium, dui enim porta
                        lectus, non euismod tortor ante eu libero</p>
                    <a href="single.html">See More</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- //banner -->
<!-- banner-bottom -->
<div class="banner-bottom">
    <ul id="flexiselDemo1">			
        <li>
            <div class="banner-bottom-grid">
                <img src="{!! asset('images/user/1.jpg') !!}" alt=" " class="img-responsive" />
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus 
                    qui blanditiis praesentium voluptatum deleniti atque corrupti 
                    quos dolores et quas molestias excepturi sint occaecati
                    cupiditate non provident</p>
                <div class="more">
                    <a href="single.html" class="hvr-bounce-to-bottom sint">Read More</a>
                </div>
            </div>
        </li>
        <li>
            <div class="banner-bottom-grid">
                <img src="{!! asset('images/user/2.jpg') !!}" alt=" " class="img-responsive" />
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus 
                    qui blanditiis praesentium voluptatum deleniti atque corrupti 
                    quos dolores et quas molestias excepturi sint occaecati
                    cupiditate non provident</p>
                <div class="more">
                    <a href="single.html" class="hvr-bounce-to-bottom sint">Read More</a>
                </div>
            </div>
        </li>
        <li>
            <div class="banner-bottom-grid">
                <img src="{!! asset('images/user/3.jpg') !!}" alt=" " class="img-responsive" />
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus 
                    qui blanditiis praesentium voluptatum deleniti atque corrupti 
                    quos dolores et quas molestias excepturi sint occaecati
                    cupiditate non provident</p>
                <div class="more">
                    <a href="single.html" class="hvr-bounce-to-bottom sint">Read More</a>
                </div>
            </div>
        </li>
    </ul>
    <script type="text/javascript">
        $(window).load(function () {
            $("#flexiselDemo1").flexisel({
                visibleItems: 3,
                animationSpeed: 1000,
                autoPlay: false,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
</div>
<!-- //banner-bottom -->