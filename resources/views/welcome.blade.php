@extends('master')

@section('title', 'Home')

@section('content')
@include('banner')

<!-- blog -->
<div class="blog">
    <div class="blog-left">
        <div class="blog-left-grid">
            <div class="blog-left-grid-left">
                <h3><a href="single.html">voluptates repudiandae sint non recusandae</a></h3>
                <p>by <span>Charlie</span> | June 29,2015 | <span>Sint</span></p>
            </div>
            <div class="blog-left-grid-right">
                <a href="#" class="hvr-bounce-to-bottom non">20 Comments</a>
            </div>
            <div class="clearfix"> </div>
            <a href="single.html"><img src="{!! asset('images/user/4.jpg') !!}" alt=" " class="img-responsive" /></a>
            <p class="para"> Itaque earum rerum hic tenetur a sapiente delectus, 
                ut aut reiciendis voluptatibus maiores alias consequatur aut 
                perferendis doloribus asperiores repellat.Et harum quidem rerum 
                facilis est et expedita distinctio. Nam libero tempore, cum 
                soluta nobis est eligendi optio cumque nihil impedit quo minus 
                id quod maxime placeat facere possimus, omnis voluptas assumenda 
                est, omnis dolor repellendus. Temporibus autem quibusdam et 
                aut officiis debitis.</p>
            <div class="rd-mre">
                <a href="single.html" class="hvr-bounce-to-bottom quod">Read More</a>
            </div>
        </div>
        <div class="blog-left-grid">
            <div class="blog-left-grid-left">
                <h3><a href="single.html">voluptates repudiandae sint non recusandae</a></h3>
                <p>by <span>Charlie</span> | June 29,2015 | <span>Sint</span></p>
            </div>
            <div class="blog-left-grid-right">
                <a href="#" class="hvr-bounce-to-bottom non">40 Comments</a>
            </div>
            <div class="clearfix"> </div>
            <a href="single.html"><img src="{!! asset('images/user/5.jpg') !!}" alt=" " class="img-responsive" /></a>
            <p class="para"> Itaque earum rerum hic tenetur a sapiente delectus, 
                ut aut reiciendis voluptatibus maiores alias consequatur aut 
                perferendis doloribus asperiores repellat.Et harum quidem rerum 
                facilis est et expedita distinctio. Nam libero tempore, cum 
                soluta nobis est eligendi optio cumque nihil impedit quo minus 
                id quod maxime placeat facere possimus, omnis voluptas assumenda 
                est, omnis dolor repellendus. Temporibus autem quibusdam et 
                aut officiis debitis.</p>
            <div class="rd-mre">
                <a href="single.html" class="hvr-bounce-to-bottom quod">Read More</a>
            </div>
        </div>
    </div>
    <div class="blog-right">
        <div class="sap_tabs">	
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span>Popular</span></li>
                    <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span>Recent</span></li>
                    <li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span>Comments</span></li>
                    <div class="clear"></div>
                </ul>				  	 
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/7-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/7.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015 <span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/8-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/8.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/9-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/9.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/10-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/10.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/8-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/8.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/9-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/9.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/10-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/10.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/7-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/7.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/9-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/9.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/10-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/10.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/7-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/7.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="facts">
                            <div class="tab_list">
                                <a href="{!! asset('images/user/8-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                                    <img src="{!! asset('images/user/8.jpg') !!}" alt=" " class="img-responsive" />
                                </a>
                            </div>
                            <div class="tab_list1">
                                <a href="#">excepturi sint occaecati</a>
                                <p>June 30,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#horizontalTab').easyResponsiveTabs({
                            type: 'default', //Types: default, vertical, accordion           
                            width: 'auto', //auto or any width like 600px
                            fit: true   // 100% fit in a container
                        });
                    });
                </script>
                <link rel="stylesheet" href="css/swipebox.css">
                <script src="js/jquery.swipebox.min.js"></script> 
                <script type="text/javascript">
                    jQuery(function ($) {
                        $(".swipebox").swipebox();
                    });
                </script>
            </div>
        </div>
        <div class="newsletter">
            <h3>Subscribe To Our Newsletter</h3>
            <form>
                <input type="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                    this.value = 'Email Address';
                                                                }" required="">
                <input type="submit" value="Send">
            </form>
        </div>
        <div class="four-fig">
            <div class="four-fig1">
                <a href="{!! asset('images/user/11-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                    <img src="{!! asset('images/user/11.jpg') !!}" class="img-responsive" alt=" " />
                </a>
            </div>
            <div class="four-fig1">
                <a href="{!! asset('images/user/14-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                    <img src="{!! asset('images/user/14.jpg') !!}" class="img-responsive" alt=" " />
                </a>
            </div>
            <div class="four-fig1">
                <a href="{!! asset('images/user/10-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                    <img src="{!! asset('images/user/21.jpg') !!}" class="img-responsive" alt=" " />
                </a>
            </div>
            <div class="four-fig1">
                <a href="{!! asset('images/user/8-.jpg') !!}" class="b-link-stripe b-animate-go   swipebox"  title="">
                    <img src="{!! asset('images/user/22.jpg') !!}" class="img-responsive" alt=" " />
                </a>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="pgs">
            <h3>Pages</h3>
            <ul>
                <li><a href="#">doloribus asperiores repellat</a></li>
                <li><a href="#">Itaque earum rerum hic tenetur</a></li>
                <li><a href="#">deserunt mollitia laborum et dolorum</a></li>
                <li><a href="#">facilis est et expedita distinctio</a></li>
                <li><a href="#">occaecati cupiditate non provident</a></li>
                <li><a href="#">deserunt mollitia laborum et dolorum</a></li>
            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- //blog -->
@endsection
