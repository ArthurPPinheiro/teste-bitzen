{{-- <!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('adm/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Route::current()->getName() == 'Admin.Dashboard' ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            @can('product.view')
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'Admin.Product' ? 'active' : '' }}" href="{{ url('admin/product') }}">
                        <i class="ni ni-tv-2 text-primary"></i>
                        <span class="nav-link-text">Produtos</span>
                    </a>
                </li>
            @endcan
            @can('productcategories.view')
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'Admin.ProductCategories' ? 'active' : '' }}" href="{{ url('admin/productcategories') }}">
                        <i class="ni ni-tv-2 text-primary"></i>
                        <span class="nav-link-text">Categorias</span>
                    </a>
                </li>
            @endcan
            @can('users.view')
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'Admin.Users' ? 'active' : '' }}" href="{{ url('admin/users') }}">
                        <i class="ni ni-tv-2 text-primary"></i>
                        <span class="nav-link-text">Users</span>
                    </a>
                </li>
            @endcan
            @can('users.view')
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'Admin.Roles' ? 'active' : '' }}" href="{{ url('admin/roles') }}">
                    <i class="ni ni-tv-2 text-primary"></i>
                    <span class="nav-link-text">Roles</span>
                    </a>
                </li>
            @endcan
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                    </div>
                </li>
                <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                    <i class="ni ni-zoom-split-in"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="https://via.placeholder.com/150">
                        </span>
                        <div class="media-body  ml-2  d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold">Arthur</span>
                        </div>
                    </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Meu Perfil</h6>
                        </div>
                        <form action="{{ route('Logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
	</div> --}}

