<header class="main-header">
    <!-- Logo -->
    <a class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <i class="fa fa-bars"></i>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('uploads/'.Auth::user()->avatar)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->username}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('uploads/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                            <p>
                               {{Auth::user()->job}}
                                <small>Thành viên từ năm {{date('Y', strtotime(Auth::user()->created_at))}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('profileFrm')}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                               
                                {{-- logout --}}
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">LAOYOUT ADMIN</li>

            <li>
                <a href="{{route('category.index')}}">
                    <i class="fa fa-th"></i> <span>Quản lý danh mục</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li>
                <a href="{{route('product.index')}}">
                    <i class="fa fa-code"></i> <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li>
                <a href="{{route('search')}}">
                    <i class="fas fa-search"></i> <span>Search</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li>
                <a href="{{route('order.index')}}">
                    <i class="fas fa-clipboard-list"></i><span>&nbsp;&nbsp;Order</span>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Breadcrumd Wrapper. Contains breadcrumb -->
<div class="breadcrumb-wrap content-wrap content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
</div>

<!-- Messaeg Wrapper. Contains messaege error and success -->
<div class="message-wrap content-wrap content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--        <div class="alert alert-danger">Lỗi validate</div>-->
        <!--        <p class="alert alert-success">Thành công</p>-->
        @if (session('message')!=null)
        <div class="alert alert-success">
            {{session('message')}}
         </div> 
        @endif
       
    </section>
</div>