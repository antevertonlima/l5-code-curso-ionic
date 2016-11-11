<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universal - All In 1 Template</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="{{ asset('/assets/front/css/animate.css') }}" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="{{ asset('/assets/front/css/style.marsala.css') }}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{ asset('/assets/front/css/custom.css') }}" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="{{ asset('/assets/front/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('/assets/front/img/apple-touch-icon.png') }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/assets/front/img/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/assets/front/img/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/front/img/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/assets/front/img/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/assets/front/img/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/assets/front/img/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/assets/front/img/apple-touch-icon-152x152.png') }}" />
    <!-- owl carousel css -->

    <link href="{{ asset('/assets/front/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/front/css/owl.theme.css') }}" rel="stylesheet">
</head>

<body>

<div id="all">
    <header>
        <!-- *** TOP *** -->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 contact">
                        <p class="hidden-sm hidden-xs">Contact us on +420 777 555 333 or hello@universal.com.</p>
                        <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>
                    <div class="col-xs-7">
                        <div class="social">
                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                        </div>

                        <div class="login">
                            <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
                            <a href="customer-register.html"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** TOP END *** -->

        <!-- *** NAVBAR ***
_________________________________________________________ -->

        <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

            <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                <div class="container">
                    <div class="navbar-header">

                        <a class="navbar-brand home" href="index.html">
                            <img src="{{ asset('/assets/front/img/logo.png') }}" alt="Universal logo" class="hidden-xs hidden-sm">
                            <img src="{{ asset('/assets/front/img/logo-small.png') }}" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                        </a>
                        <div class="navbar-buttons">
                            <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-align-justify"></i>
                            </button>
                        </div>
                    </div>
                    <!--/.navbar-header -->

                    <div class="navbar-collapse collapse" id="navigation">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown active">
                                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.html">Option 1: Default Page</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown use-yamm yamm-fw">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Features<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="yamm-content">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="{{ asset('/assets/front/img/template-easy-customize.png') }}" class="img-responsive hidden-xs" alt="">
                                                </div>
                                                <div class="col-sm-3">
                                                    <h5>Shortcodes</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="template-accordions.html">Accordions</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h5>Header variations</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="template-header-default.html">Default sticky header</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown use-yamm yamm-fw">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="yamm-content">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="{{ asset('/assets/front/img/template-homepage.png') }}" class="img-responsive hidden-xs" alt="">
                                                </div>
                                                <div class="col-sm-3">
                                                    <h5>Portfolio</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="portfolio-2.html">2 columns</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h5>About</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="about.html">About us</a>
                                                        </li>
                                                    </ul>
                                                    <h5>Marketing</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="packages.html">Packages</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- ========== FULL WIDTH MEGAMENU ================== -->
                            <li class="dropdown use-yamm yamm-fw">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">All Pages <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="yamm-content">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h5>Home</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="index.html">Option 1: Default Page</a>
                                                        </li>
                                                    </ul>
                                                    <h5>About</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="about.html">About us</a>
                                                        </li>
                                                    </ul>
                                                    <h5>Marketing</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="packages.html">Packages</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h5>Portfolio</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="portfolio-2.html">2 columns</a>
                                                        </li>
                                                    </ul>
                                                    <h5>User pages</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="customer-register.html">Register / login</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h5>Shop</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="shop-category.html">Category - sidebar right</a>
                                                        </li>
                                                    </ul>
                                                    <h5>Shop - order process</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="shop-basket.html">Shopping cart</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h5>Contact</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="contact.html">Contact</a>
                                                        </li>
                                                    </ul>
                                                    <h5>Pages</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="text.html">Text page</a>
                                                        </li>
                                                    </ul>
                                                    <h5>Blog</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="blog.html">Blog listing big</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <!-- ========== FULL WIDTH MEGAMENU END ================== -->

                            <li class="dropdown">
                                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Contact <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="contact.html">Contact option 1</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                    <div class="collapse clearfix" id="search">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                </span>
                            </div>
                        </form>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
            <!-- /#navbar -->
        </div>
        <!-- *** NAVBAR END *** -->
    </header>

    <!-- *** LOGIN MODAL *** -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/auth/login') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email_modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password_modal" placeholder="password">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted">
                        <a href="customer-register.html">
                            <strong>Register now</strong>
                        </a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- *** LOGIN MODAL END *** -->

              {{--<div class="col-md-12">--}}
                {{--<div class="heading text-center">--}}
                    {{--<h2>@yield('titlePainel')</h2>--}}
                {{--</div>--}}
            {{--</div>--}}
            <p class="lead">@yield('content')</p>
        <!-- /.container -->

    <!-- *** FOOTER ***
_________________________________________________________ -->

    <footer id="footer">
        <div class="container">
            <div class="col-md-3 col-sm-6">
                <h4>About us</h4>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                <hr>

                <h4>Join our monthly newsletter</h4>

                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                        <span class="input-group-btn">

                        <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>

                    </span>

                    </div>
                    <!-- /input-group -->
                </form>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Blog</h4>

                <div class="blog-entries">
                    <div class="item same-height-row clearfix">
                        <div class="image same-height-always">
                            <a href="#">
                                <img class="img-responsive" src="{{ asset('/assets/front/img/detailsquare.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="name same-height-always">
                            <h5><a href="#">Blog post name</a></h5>
                        </div>
                    </div>

                    <div class="item same-height-row clearfix">
                        <div class="image same-height-always">
                            <a href="#">
                                <img class="img-responsive" src="{{ asset('/assets/front/img/detailsquare.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="name same-height-always">
                            <h5><a href="#">Blog post name</a></h5>
                        </div>
                    </div>

                    <div class="item same-height-row clearfix">
                        <div class="image same-height-always">
                            <a href="#">
                                <img class="img-responsive" src="{{ asset('/assets/front/img/detailsquare.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="name same-height-always">
                            <h5><a href="#">Very very long blog post name</a></h5>
                        </div>
                    </div>
                </div>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Contact</h4>

                <p><strong>Universal Ltd.</strong>
                    <br>13/25 New Avenue
                    <br>Newtown upon River
                    <br>45Y 73J
                    <br>England
                    <br>
                    <strong>Great Britain</strong>
                </p>

                <a href="contact.html" class="btn btn-small btn-template-main">Go to contact page</a>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">

                <h4>Photostream</h4>

                <div class="photostream">
                    <div>
                        <a href="#">
                            <img src="{{ asset('/assets/front/img/detailsquare.jpg') }}" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="{{ asset('/assets/front/img/detailsquare2.jpg') }}" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="{{ asset('/assets/front/img/detailsquare3.jpg') }}" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="{{ asset('/assets/front/img/detailsquare3.jpg') }}" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="{{ asset('/assets/front/img/detailsquare2.jpg') }}" class="img-responsive" alt="#">
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <img src="{{ asset('/assets/front/img/detailsquare.jpg') }}" class="img-responsive" alt="#">
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-3 -->
        </div>
        <!-- /.container -->
    </footer>
    <!-- /#footer -->

    <!-- *** FOOTER END *** -->

    <!-- *** COPYRIGHT *** -->
    <div id="copyright">
        <div class="container">
            <div class="col-md-12">
                <p class="pull-left">&copy; 2015. Your company / name goes here</p>
                <p class="pull-right">Template by <a href="https://bootstrapious.com/free-templates">Bootstrapious</a>
                    <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                </p>
            </div>
        </div>
    </div>
    <!-- /#copyright -->
    <!-- *** COPYRIGHT END *** -->
</div>
<!-- /#all -->

<!-- #### JAVASCRIPT FILES ### -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
{{--<script>--}}
    {{--window.jQuery || document.write('<script src="{{ asset('/assets/front/js/jquery-1.11.0.min.js') }}"><\/script>')--}}
{{--</script>--}}
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="{{ asset('/assets/front/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('/assets/front/js/waypoints.min.js') }}"></script>
<script src="{{ asset('/assets/front/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('/assets/front/js/jquery.parallax-1.1.3.js') }}"></script>
<script src="{{ asset('/assets/front/js/front.js') }}"></script>

<!-- owl carousel -->
<script src="{{ asset('/assets/front/js/owl.carousel.min.js') }}"></script>

</body>
</html>