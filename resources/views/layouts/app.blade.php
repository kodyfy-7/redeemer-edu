<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') ::: {{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{ asset('panel/assets/img/favicon.png') }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/fontawesome/css/all.min.css') }}">

        @yield('style')
        <link rel="stylesheet" href="{{ asset('panel/assets/css/style.css') }}">
    </head>
    <body>
        <div class="main-wrapper">
            <div class="header">
                <div class="header-left">
                    @if (Auth::guard('administrator')->check()) 
                    <a href="{{ route('administrator.dashboard') }}" class="logo">
                        <img src="{{ asset('panel/assets/img/logo.png') }}" alt="Logo">
                    </a>
                    <a href="{{ route('administrator.dashboard') }}" class="logo logo-small">
                        <img src="{{ asset('panel/assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
                    </a>
                    @elseif (Auth::guard('teacher')->check()) 
                        <a href="{{ route('teacher.dashboard') }}" class="logo">
                            <img src="{{ asset('panel/assets/img/logo.png') }}" alt="Logo">
                        </a>
                        <a href="{{ route('teacher.dashboard') }}" class="logo logo-small">
                            <img src="{{ asset('panel/assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
                        </a>
                    @else 
                    <a href="" class="logo">
                        <img src="{{ asset('panel/assets/img/logo.png') }}" alt="Logo">
                    </a>
                    <a href="" class="logo logo-small">
                        <img src="{{ asset('panel/assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
                    </a>
                    @endif
                        
                </div>

                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-align-left"></i>
                </a>

                <div class="top-nav-search">
                    {{-- <form>
                        <input type="text" class="form-control" placeholder="Search here">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </form> --}}
                </div>

                <a class="mobile_btn" id="mobile_btn">
                    <i class="fas fa-bars"></i>
                </a>

                <ul class="nav user-menu">
                    <li class="nav-item dropdown noti-dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <i class="far fa-bell"></i> <span class="badge badge-pill">3</span>
                        </a>
                        <div class="dropdown-menu notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                                <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                    <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                                </span>
                                                 <div class="media-body flex-grow-1">
                                                    <p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
                                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="topnav-dropdown-footer">
                                <a href="#">View all Notifications</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown has-arrow">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img"><img class="rounded-circle" src="{{ asset('panel/assets/img/profiles/figure/admin.jpg') }}" width="31" alt="image"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="{{ asset('panel/assets/img/profiles/figure/admin.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>{{ auth()->user()->name ?? 'Defualt Name' }}</h6>
                                    <p class="text-muted mb-0">
                                        @if (Auth::guard('administrator')->check()) 
                                            Administrator
                                        @elseif (Auth::guard('teacher')->check()) 
                                            Teacher
                                        @else 
                                            Student
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="">My Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div> 
                    </li>
                </ul>
            </div>

            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main Menu</span>
                            </li>
                            @if (Auth::guard('administrator')->check())
                                <li>
                                    <a href="{{ route('administrator.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                                </li>

                                <li class="submenu">
                                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('administrator.employees.index') }}">Employee List</a></li>
                                        <li><a href="{{ route('administrator.employees.create') }}">Add new employee</a></li>
                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="#"><i class="fas fa-building"></i> <span> Classrooms</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('administrator.classrooms.index') }}">Classroom List</a></li>
                                        <li><a href="{{ route('administrator.classrooms.create') }}">Add new classroom</a></li>
                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('administrator.subjects.index') }}">Subject List</a></li>
                                        <li><a href="{{ route('administrator.subjects.create') }}">Add new subject </a></li>
                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="{{ route('administrator.students.index') }}">Students List</a></li>
                                        <li><a href="{{ route('administrator.students.create') }}">Add new student(s) </a></li>
                                    </ul>
                                </li>
                            @elseif(Auth::guard('teacher')->check())
                                <li>
                                    <a href="{{ route('teacher.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                                </li>

                                @if(isset(Auth::user()->employee->classroom_id))
                                    <li>
                                        <a href="{{ route('teacher.class.attendance') }}"><i class="fas fa-calendar"></i> <span> Attendance</span></a>
                                    </li>
                                @endif

                                <li>
                                    <a href="{{ route('teacher.students.index') }}"><i class="fas fa-user-graduate"></i> <span> Students</span></a>
                                </li>

                                <li>
                                    <a href="{{ route('teacher.results.index') }}"><i class="fas fa-clipboard-list"></i> <span> Results</span></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>


            <div class="page-wrapper">
                <div class="content container-fluid">

                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">@yield('title')</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item active">@yield('breadcrumb')</li> --}}
                            </ul>
                        </div>
                        <div class="col-auto text-end float-end ms-auto">
                            @yield('page_action')
                        </div>
                    </div>
                    

                    @yield('content')
                </div>
            </div>

            <footer>
            <p>Copyright © 2020 Dreamguys.</p>
            </footer>

            </div>

        </div>


        <script src="{{ asset('panel/assets/js/jquery-3.6.0.min.js') }}"></script>

        <script src="{{ asset('panel/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('panel/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

        <script src="{{ asset('panel/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
        <script src="{{ asset('panel/assets/plugins/apexchart/chart-data.js') }}"></script>

        
        <script src="{{ asset('panel/assets/js/script.js') }}"></script>
        @yield('script')
    </body>
</html>