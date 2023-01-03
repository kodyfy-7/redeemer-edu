<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title') ::: {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('panelv2/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('panelv2/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('panelv2/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('panelv2/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('panelv2/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('panelv2/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('panelv2/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    @yield('style')
    <!-- Custom Theme Style -->
    <link href="{{ asset('panelv2/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('home') }}" class="site_title"><i class="fa fa-institution"></i> <span>{{ config('app.name', 'Laravel') }}</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('panelv2/images/user.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ auth()->user()->username ?? 'Default' }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home </a></li>
                  @if (auth()->user()->role->role_slug == 'admin')
                  <li><a><i class="fa fa-edit"></i> Classrooms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('classrooms.index') }}">All classrooms</a></li>
                      <li><a href="{{ route('classrooms.create') }}">Add new classroom</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Employees <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('employees.index') }}">All employees</a></li>
                      <li><a href="{{ route('employees.create') }}">Add new employee</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('students.index') }}">All students</a></li>
                      <li><a href="{{ route('students.create') }}">Add new student</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ route('results.index') }}"><i class="fa fa-folder-o"></i> Result Upload </a></li>
                  @endif
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" href="{{ route('logout') }}"onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out pull-right"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <div class="right_col" role="main">
            <div class="">
        @hasSection('pageStatus')
       
        @else
            
            <div class="page-title">
              <div class="title_left">
                  <h3>@yield('title')</h3>
              </div>

              <div class="title_right">
                  <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                      <div class="pull-right">
                          @yield('page_action')
                      </div>
                  </div>
              </div>
            </div>

            <div class="clearfix"></div>
            
        @endif
            @yield('content')
            </div>
        </div>
       

        <!-- footer content -->
        <footer>
            <div class="pull-right">
              Redeemers 
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>
  
      <!-- jQuery -->
      <script src="{{ asset('panelv2/vendors/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('panelv2/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset('panelv2/vendors/fastclick/lib/fastclick.js') }}"></script>
      <!-- NProgress -->
      <script src="{{ asset('panelv2/vendors/nprogress/nprogress.js') }}"></script>
      <!-- Chart.js -->
      <script src="{{ asset('panelv2/vendors/Chart.js/dist/Chart.min.js') }}"></script>
      <!-- gauge.js -->
      <script src="{{ asset('panelv2/vendors/gauge.js/dist/gauge.min.js') }}"></script>
      <!-- bootstrap-progressbar -->
      <script src="{{ asset('panelv2/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
      <!-- iCheck -->
      <script src="{{ asset('panelv2/vendors/iCheck/icheck.min.js') }}"></script>
      <!-- Skycons -->
      <script src="{{ asset('panelv2/vendors/skycons/skycons.js') }}"></script>
      <!-- Flot -->
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.pie.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.time.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.stack.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/Flot/jquery.flot.resize.js') }}"></script>
      <!-- Flot plugins -->
      <script src="{{ asset('panelv2/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/flot.curvedlines/curvedLines.js') }}"></script>
      <!-- DateJS -->
      <script src="{{ asset('panelv2/vendors/DateJS/build/date.js') }}"></script>
      <!-- JQVMap -->
      <script src="{{ asset('panelv2/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="{{ asset('panelv2/vendors/moment/min/moment.min.js') }}"></script>
      <script src="{{ asset('panelv2/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
      
      @yield('script')
      <!-- Custom Theme Scripts -->
      <script src="{{ asset('panelv2/build/js/custom.min.js') }}"></script>
      
    </body>
  </html>