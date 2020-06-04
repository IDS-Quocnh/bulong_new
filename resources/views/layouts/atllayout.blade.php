<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> | UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/UBold/images/favicon.ico') }}">

	    <!-- App css -->
	    <link href="{{ asset('public/assets/UBold/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
	    <link href="{{ asset('public/assets/UBold/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

	    <link href="{{ asset('public/assets/UBold/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
	    <link href="{{ asset('public/assets/UBold/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

	    <!-- icons -->
	    <link href="{{ asset('public/assets/UBold/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ asset('public/assets/css/layout.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('public/assets/css/components.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/iapp.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link rel='stylesheet' href="{{ asset('public/assets/spectrum/spectrum.css') }}" />
        <link href="{{ asset('public/assets/chartjs/Chart.min.css') }}" rel="stylesheet">

        <script src="{{ asset('public/assets/js/main/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/loaders/blockui.min.js') }}"></script>

        <script src="{{ asset('public/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>


        <script src="{{ asset('public/assets/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('public/assets/spectrum/spectrum.js') }}"></script>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul id="usernameDiv" class="list-unstyled topnav-menu float-right mb-0">
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                     {{ Auth::user()->username }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div id="userMenuBox" class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                                {{ csrf_field() }}
                                                                            </form>
                                    <span>Log out</span>
                                </a>
                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{ asset('public/assets/UBold/images/logo-sm.png') }}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('public/assets/UBold/images/logo-dark.png') }}" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>

                        <a href="{{ route('home') }}" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{ asset('public/assets/UBold/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <h3 style="color:white; margin-top : 20px"> BULONG</h3>
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>


                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="width: 270px">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{ asset('public/assets/UBold/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-toggle="dropdown">Geneva Kennedy</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{ route('admincp') }}">
                                    <i data-feather="airplay"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Dashboards </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('site-setting') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Site Setting </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('poll-management') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Poll Management </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('category-management') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Category Management </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('hashtag-management') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Hashtag Management </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('popup-message') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Popup Message </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('bg-management') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Background Management </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('bg-management-colors') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Background Colors </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user-management') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> User Management </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('manage-report-confession') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Manage Report Confession </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('manage-ads') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Manage Ads </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('statistic') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Statistic </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('automation') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Automation </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('info-page') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Info Page </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('edit-my-profile') }}">
                                    <i data-feather="cpu"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Edit My Profile </span>
                                </a>
                            </li>




                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                            <li class="breadcrumb-item active">{{$title}}</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">{{$title}}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield('content')
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Deeplaude</a>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link py-2" data-toggle="tab" href="#chat-tab" role="tab">
                            <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2" data-toggle="tab" href="#tasks-tab" role="tab">
                            <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-0">
                    <div class="tab-pane" id="chat-tab" role="tabpanel">
                    </div>

                    <div class="tab-pane" id="tasks-tab" role="tabpanel">
                    </div>
                    <div class="tab-pane active" id="settings-tab" role="tabpanel">
                        <h6 class="font-weight-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                            <span class="d-block py-1">Theme Settings</span>
                        </h6>

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                            </div>

                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Allow user to custom their theme</h6>
                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('user_config','yes');">
                                <input type="radio" class="custom-control-input" name="allow-user" value="yes"
                                    id="allow-user-yes-check"  />
                                <label class="custom-control-label" for="allow-user-yes-check">Yes</label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('user_config','no');">
                                <input type="radio" class="custom-control-input"  name="allow-user" value="no"
                                    id="allow-user-no-check" checked />
                                <label class="custom-control-label" for="allow-user-no-check">No</label>
                            </div>

                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Header Color</h6>
                            <div class="">
                                <input type='text' id="header_color" />
                            </div>
                            <script>
                                $("#header_color").spectrum({
                                    color: "#f00",
                                });

                                $("#header_color").spectrum({
                                    change: function(color) {
                                        color.toHexString(); // #ff0000
                                        $(".bg-primary").attr('style', 'background-color: ' + color.toHexString() +' !important');
                                        configUpdate("header_color",color.toHexString());
                                    }
                                });

                            </script>
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('scheme_color','light');">
                                <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                                    id="light-mode-check"   />
                                <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('scheme_color','dark');">
                                <input type="radio" class="custom-control-input"  name="color-scheme-mode" value="dark"
                                    id="dark-mode-check"  />
                                <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                            </div>

                            <!-- Width -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('width','fluid');">
                                <input type="radio" class="custom-control-input"  name="width" value="fluid" id="fluid-check"  />
                                <label class="custom-control-label" for="fluid-check">Fluid</label>
                            </div>
                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('with','boxed');">
                                <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                                <label class="custom-control-label" for="boxed-check" checked>Boxed</label>
                            </div>

                            <!-- Menu positions -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('menus_position','fixed');">
                                <input type="radio" class="custom-control-input" name="menus-position" value="fixed" id="fixed-check"
                                    checked />
                                <label class="custom-control-label" for="fixed-check">Fixed</label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('menus_position','scrollable');">
                                <input type="radio" class="custom-control-input" name="menus-position" value="scrollable"
                                    id="scrollable-check" />
                                <label class="custom-control-label" for="scrollable-check">Scrollable</label>
                            </div>

                            <!-- Left Sidebar-->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('left_size_bar_color','light');">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="light" id="light-check" checked />
                                <label class="custom-control-label" for="light-check">Light</label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('left_size_bar_color','dark');">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="dark" id="dark-check" />
                                <label class="custom-control-label" for="dark-check">Dark</label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('left_size_bar_color','brand');">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="brand" id="brand-check" />
                                <label class="custom-control-label" for="brand-check">Brand</label>
                            </div>

                            <div class="custom-control custom-switch mb-3" onclick="configUpdate('left_size_bar_color','gradient');">
                                <input type="radio" class="custom-control-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                                <label class="custom-control-label" for="gradient-check">Gradient</label>
                            </div>

                            <!-- size -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('left_size_bar_size','default');">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="default"
                                    id="default-size-check" checked />
                                <label class="custom-control-label" for="default-size-check">Default</label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('left_size_bar_size','condensed');">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="condensed"
                                    id="condensed-check" />
                                <label class="custom-control-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('left_size_bar_size','compact');">
                                <input type="radio" class="custom-control-input" name="leftsidebar-size" value="compact"
                                    id="compact-check" />
                                <label class="custom-control-label" for="compact-check">Compact <small>(Small size)</small></label>
                            </div>

                            <!-- User info -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('side_bar_user_info','enable');">
                                <input type="checkbox" class="custom-control-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                                <label class="custom-control-label" for="sidebaruser-check">Enable</label>
                            </div>


                            <!-- Topbar -->
                            <h6 class="font-weight-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('top_bar','dark');">
                                <input type="radio" class="custom-control-input" name="topbar-color" value="dark" id="darktopbar-check"
                                    checked />
                                <label class="custom-control-label" for="darktopbar-check">Dark</label>
                            </div>

                            <div class="custom-control custom-switch mb-1" onclick="configUpdate('top_bar','light');">
                                <input type="radio" class="custom-control-input" name="topbar-color" value="light" id="lighttopbar-check" />
                                <label class="custom-control-label" for="lighttopbar-check">Light</label>
                            </div>


                            <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>
                        </div>

                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <script src="{{ asset('public/assets/UBold/js/vendor.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('public/assets/UBold/js/app.js') }}"></script>

        <script src="{{ asset('public/assets/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
            $( "#sandbox-container" ).datepicker();
        </script>
    </body>
<style>
    .dataTables_length>label{
        display : flex;
    }
    .select2-selection__rendered{
        line-height : 24px !important;
    }
    .dataTables_length label select2-selection--single{
        width : 45px;
    }
    .page-title{
        line-height: 75px !important;
    }

    .footer {
        bottom: 0;
        padding: 19px 15px 20px;
        position: absolute;
        right: 0;
        color: #98a6ad;
        left: 270px;
        background-color: #eeeff3;
    }
</style>

</html>
