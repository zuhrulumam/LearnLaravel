<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <h1><a href="index.html">Easy <span>Admin</span></a></h1>
    </div>
    <div class="logo-icon text-center">
        <a href="index.html"><i class="lnr lnr-home"></i> </a>
    </div>

    <!--logo and iconic logo end-->
    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li class="active"><a href="index.html"><i class="lnr lnr-home"></i><span>Dashboard</span></a></li>

            <li class="menu-list">
                <a href="{!! action('admin\BlogController@index') !!}"><i class="lnr lnr-database"></i>
                    <span>Posts</span></a>
                <ul class="sub-menu-list">
                    <li><a href="{!! action('admin\BlogController@index') !!}">All Posts</a> </li>
                    <li><a href="{!! action('admin\BlogController@getCreate') !!}">Create Post</a> </li>
                </ul>
            </li>
            <li class="menu-list">
                <a href="{!! action('admin\CommentController@index') !!}"><i class="lnr lnr-bubble"></i>
                    <span>Comments</span></a>
                <ul class="sub-menu-list">
                    <li><a href="{!! action('admin\CommentController@index') !!}">All Comments</a> </li>
                </ul>
            </li>
            <li class="menu-list">
                <a href="{!! action('admin\CategoriesController@index') !!}"><i class="lnr lnr-leaf"></i>
                    <span>Categories</span></a>
                <ul class="sub-menu-list">
                    <li><a href="{!! action('admin\CategoriesController@index') !!}">All Categories</a> </li>
                    <li><a href="{!! action('admin\CategoriesController@getCreate') !!}">Create Category</a> </li>
                </ul>
            </li>
            <li class="menu-list">
                <a href="{!! action('admin\MediaController@index') !!}"><i class="lnr lnr-picture"></i>
                    <span>Media</span></a>
                <ul class="sub-menu-list">
                    <li><a href="{!! action('admin\MediaController@index') !!}">All Media</a> </li>
                    <li><a href="{!! action('admin\MediaController@getCreate') !!}">Create Media</a> </li>
                </ul>
            </li>
            <li><a href="{!! action('auth\AuthController@logout') !!}"><i class="lnr lnr-power-switch"></i><span>Logout</span></a></li>
            <li><a href="forms.html"><i class="lnr lnr-spell-check"></i> <span>Forms</span></a></li>
            <li><a href="tables.html"><i class="lnr lnr-menu"></i> <span>Tables</span></a></li>              
            <li class="menu-list"><a href="#"><i class="lnr lnr-envelope"></i> <span>MailBox</span></a>
                <ul class="sub-menu-list">
                    <li><a href="inbox.html">Inbox</a> </li>
                    <li><a href="compose-mail.html">Compose Mail</a></li>
                </ul>
            </li>      
            <li class="menu-list"><a href="#"><i class="lnr lnr-indent-increase"></i> <span>Menu Levels</span></a>  
                <ul class="sub-menu-list">
                    <li><a href="charts.html">Basic Charts</a> </li>
                </ul>
            </li>
            <li><a href="codes.html"><i class="lnr lnr-pencil"></i> <span>Typography</span></a></li>
            <li><a href="media.html"><i class="lnr lnr-select"></i> <span>Media Css</span></a></li>
            <li class="menu-list"><a href="#"><i class="lnr lnr-book"></i>  <span>Pages</span></a> 
                <ul class="sub-menu-list">
                    <li><a href="sign-in.html">Sign In</a> </li>
                    <li><a href="sign-up.html">Sign Up</a></li>
                    <li><a href="blank_page.html">Blank Page</a></li>
                </ul>
            </li>
        </ul>
        <!--sidebar nav end-->
    </div>
</div>
<!-- left side end-->