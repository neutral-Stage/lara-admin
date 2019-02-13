

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome Icons -->
<link rel="stylesheet" href="/css/app.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-align-justify"></i></a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Lara Start</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <p style="color:whitesmoke;">{{Auth::user()->type}}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
                <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                <p>
                    Dashboard
                    
                </p>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/profile" class="nav-link">
                <i class="nav-icon fas fa-user cyan"></i>
                <p>
                    Profile
                    
                </p>
                </router-link>
            </li>

            @can('isAdmin')
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog green"></i>
                <p>
                    Management
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/users" class="nav-link">
                    <i class="fas fa-users nav-icon purple"></i>
                    <p>Users</p>
                    </router-link>
                </li>
                
                
                </ul>
            </li>

            
            <li class="nav-item">
                <router-link to="/developer" class="nav-link">
                <i class="nav-icon fas fa-cogs indigo"></i>
                <p>
                    Developer
                    
                </p>
                </router-link>
            </li>

            @endcan

            <li class="nav-item">
               
                  <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-power-off red"></i>
                                        <p>
                                              {{ __('Logout') }}
                                        </p>
                                        
                                        
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                  </form>
                </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <div class="content-header">
      <div class="container-fluid">
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
      </div>
    </div>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth
<script src="/js/app.js"></script>
</body>
</html>
