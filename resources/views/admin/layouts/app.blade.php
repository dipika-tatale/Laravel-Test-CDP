<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Test-Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('css/font_css.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <!-- Theme style -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <!-- ./wrapper -->
    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown user user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{ config('app.url') }}/images/default.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="width: 160px;">
                  <a href="{{ config('app.url') }}/admin/logout" class="dropdown-item dropdown-footer"><i class="fa fa-sign-out-alt" style="padding: 5px 8px 5px;"></i>Logout</a>
                </div>
              </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ config('app.url') }}/admin" class="brand-link">
          <img src="{{ config('app.url') }}/images/laravel_icon512.png" alt="Laravel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Laravel Test-Admin</span>
        </a>
        
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              
              <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/list') != false){ echo 'menu-open'; } ?>">
                <a href="#" class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/list') != false){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Admin Users
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ config('app.url') }}/admin/list" class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/list') != false){ echo 'active'; } ?>">
                      <i class="fa fa-stream nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/product') != false){ echo 'menu-open'; } ?>">
                <a href="#" class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/product') != false){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                    Product Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ config('app.url') }}/admin/product/add" class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/product/add') != false){ echo 'active'; } ?>">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ config('app.url') }}/admin/product/list" class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/product/list') != false){ echo 'active'; } ?>">
                      <i class="fa fa-stream nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/customer') != false){ echo 'menu-open'; } ?>">
                <a href="#" class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/customer') != false){ echo 'active'; } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Customers
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ config('app.url') }}/admin/customer/list" class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'admin/customer/list') != false){ echo 'active'; } ?>">
                      <i class="fa fa-stream nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021.</strong>
    </footer>
    </div>
    <!-- ./wrapper -->
</body>

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('js/bs-custom-file-input.js') }}"></script>
</html>
