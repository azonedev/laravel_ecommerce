<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Admin ShopMama</title>

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/gritter/css/jquery.gritter.css')}}" />
    
    
    <!-- advanced table -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="{{asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" />


    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('lib/chart-master/Chart.js')}}"></script>
    
    @yield('stylesheet')


</head>

<body>
    <section id="container">

        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="{{url('/adminhome')}}" class="logo"><b>SHOP<span>MAMA</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Dashio Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="{{asset('img/ui-zac.jpgs')}}"></span>
                                    <span class="subject">
                                        <span class="from">Zac Snider</span>
                                        <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="{{asset('img/ui-divya.jpg')}}"></span>
                                    <span class="subject">
                                        <span class="from">Divya Manian</span>
                                        <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                        Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="{{asset('img/ui-danro.jpg')}}"></span>
                                    <span class="subject">
                                        <span class="from">Dan Rogers</span>
                                        <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="{{asset('img/ui-danro.jpg')}}"></span>
                                    <span class="subject">
                                        <span class="from">Dj Sherman</span>
                                        <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have 7 new notifications</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    Server Overloaded.
                                    <span class="small italic">4 mins.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                    Memory #2 Not Responding.
                                    <span class="small italic">30 mins.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    Disk Space Reached 85%.
                                    <span class="small italic">2 hrs.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-success"><i class="fa fa-plus"></i></span>
                                    New User Registered.
                                    <span class="small italic">3 hrs.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="{{url('adminhome')}}"><img src="{{Session::get('photo')}}" class="img-circle" width="80"></a></p>
                    <h5 class="centered">
                        @if (Session::has('user_name'))
                        {{Session::get('user_name')}}
                        @endif

                    </h5>

                    <li class="mt">
                        <a class="active" href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Order</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{url('order')}}">Order</a></li>
                            <li><a href="{{url('allorder')}}">All Order</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>POS</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{url('pos-product')}}">Products</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Role</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('role.add')}}">Add Role</a></li>
                            <li><a href="{{route('role')}}">All Role</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('cat.add')}}">Add Category</a></li>
                            <li><a href="{{route('cat')}}">All Category</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('product.add')}}">Add Product</a></li>
                            <li><a href="{{route('product')}}">All Product</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Cupon</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('cupon.add')}}">Add Cupon</a></li>
                            <li><a href="{{route('cupon')}}">All Cupon</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Slider</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('slider.add')}}">Add Slider</a></li>
                            <li><a href="{{route('slider')}}">All Slider</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Feature Slider</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{route('fslider.add')}}">Add Feature Slider</a></li>
                            <li><a href="{{route('fslider')}}">All Feature Slider</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    @yield('maincontent')
                </div>
            </section>
            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    <p>
                        &copy; Copyrights <strong><a href="https://shopmama.azonedev.com" target="_blank">SHOPMAMA</a></strong>. All Rights Reserved
                    </p>
                    <div class="credits">


                    </div>
                    <a href="index.html#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!--footer end-->
        </section>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>

        <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
        <script class="include" type="text/javascript" src="{{asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
        <script src="{{asset('lib/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery.sparkline.js')}}"></script>
        <script type="text/javascript" language="javascript" src="{{asset('lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>


        <!--common script for all pages-->
        <script src="{{asset('lib/common-scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/gritter/js/jquery.gritter.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/gritter-conf.js')}}"></script>
        <!--script for this page-->
        <script src="{{asset('lib/sparkline-chart.js')}}"></script>
        <script src="{{asset('lib/zabuto_calendar.js')}}"></script>
        <script type="text/javascript">

        $(document).ready(function() {
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: "Hi {{Session::get('user_name')}}",
                // (string | mandatory) the text inside the notification
                text: 'Welcome to SHOPMAMA',
                // (string | optional) the image to display on the left
                image: "{{Session::get('photo')}}",
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: 200,
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });

            return false;
        });
    </script>
        <script type="application/javascript">
            $(document).ready(function() {
                $("#date-popover").popover({
                    html: true,
                    trigger: "manual"
                });
                $("#date-popover").hide();
                $("#date-popover").click(function(e) {
                    $(this).hide();
                });

                $("#my-calendar").zabuto_calendar({
                    action: function() {
                        return myDateFunction(this.id, false);
                    },
                    action_nav: function() {
                        return myNavFunction(this.id);
                    },
                    ajax: {
                        url: "show_data.php?action=1",
                        modal: true
                    },
                    legend: [{
                            type: "text",
                            label: "Special event",
                            badge: "00"
                        },
                        {
                            type: "block",
                            label: "Regular event",
                        }
                    ]
                });
            });

            function myNavFunction(id) {
                $("#date-popover").hide();
                var nav = $("#" + id).data("navigation");
                var to = $("#" + id).data("to");
                console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
            }
        </script>
</body>

</html>