<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CodeDelivery | </title>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/icheck/flat/green.css') }}" rel="stylesheet">


    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="./" class="site_title"><i class="fa fa-paw"></i>
                        <span>Code Delivery</span>
                    </a>
                </div>
                <div class="clearfix"></div>

                @if( Auth::check() )
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="https://avatars0.githubusercontent.com/u/5508160?v=3&s=460" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bem Vindo,</span>
                            <h2>{{ Auth::user()->name }} !</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                @else
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="https://aninaland.files.wordpress.com/2010/04/34.jpg?w=640" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bem Vindo,</span>
                            <h2>Visitante !</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                @endif

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>Geral</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-windows"></i> Gerenciar <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li>
                                        <a href="{{ route('admin.client.index') }}">Clientes</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.category.index') }}">Categorias</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.product.index') }}">Produtos</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.orders.index') }}">Pedidos</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.cupoms.index') }}">Cupons</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li>
                                        <a href="{{ route('customer.order.index') }}">Meus Pedidos</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            @if(Auth::check())
                                <img src="https://avatars0.githubusercontent.com/u/5508160?v=3&s=460" alt="">
                                {{ Auth::user()->name }}
                                <span class=" fa fa-angle-down"></span>
                            @else
                                <img src="https://aninaland.files.wordpress.com/2010/04/34.jpg?w=640" alt="">Visitante
                                <span class=" fa fa-angle-down"></span>
                            @endif
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li>
                                    @if(Auth::check())
                                        <a href="{{ url('/auth/logout') }}">
                                            <i class="fa fa-sign-out pull-right"></i> Log Out
                                        </a>
                                    @else
                                        <a href="{{ Auth::logout() }}">
                                            <i class="fa fa-sign-out pull-right"></i> Log Out
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="https://avatars0.githubusercontent.com/u/5508160?v=3&s=460" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="https://avatars0.githubusercontent.com/u/5508160?v=3&s=460" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="https://avatars0.githubusercontent.com/u/5508160?v=3&s=460" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="https://avatars0.githubusercontent.com/u/5508160?v=3&s=460" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>@yield('titleLeft')</h3>
                    </div>

                    <!--
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="min-height:600px;">
                            <div class="x_title">
                                <h2>@yield('titlePainel')</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    @yield('optionsPainel')
                                </ul>
                                <div class="clearfix"></div>
                            </div>

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>

            <!-- footer content -->
            <footer>
                <div class="">
                    <p class="pull-right">Code Delivery a Bootstrap 3 template by <a>Kimlabs</a>. |
                        <span class="lead"> <i class="fa fa-paw"></i> Code Delivery</span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

        </div>
        <!-- /page content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

<!-- chart js -->
<script src="{{ asset('/assets/js/chartjs/chart.min.js') }}"></script>
<!-- bootstrap progress js -->
<script src="{{ asset('/assets/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('/assets/js/nicescroll/jquery.nicescroll.min.js') }}"></script>
<!-- icheck -->
<script src="{{ asset('/assets/js/icheck/icheck.min.js') }}"></script>

<script src="{{ asset('/assets/js/custom.js') }}"></script>

<!-- moris js -->
<script src="{{ asset('/assets/js/moris/raphael-min.js') }}"></script>
<script src="{{ asset('/assets/js/moris/morris.js') }}"></script>
<script src="{{ asset('/assets/js/moris/example.js') }}"></script>

@yield('post-script')

</body>

</html>