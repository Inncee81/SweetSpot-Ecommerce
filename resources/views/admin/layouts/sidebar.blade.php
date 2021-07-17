@section('sidebar')
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary position-fixed elevation-4" style="">
    <!-- Brand Logo -->
    <a href="{{url('admin/')}}" class="brand-link" style="background: #359dc9">
      <img src="{{asset('public/dashboard_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SWEETSPOT</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>Dashboard<span class="right badge badge-danger"></span></p>
            </a>
          </li>
      
          <li class="nav-item">
            <a href="{{url('admin/statistics')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i><p>Statistici<span class="right badge badge-danger"></span></p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/users')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i><p>Utilizatori<span class="right badge badge-danger"></span></p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{url('admin/categories')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i><p>Categorii<span class="right badge badge-danger"></span></p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/subcategory')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i><p>Subcategorii<span class="right badge badge-danger"></span></p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/product')}}" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i><p>Produse<span class="right badge badge-danger"></span></p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a href="{{url('admin/orders')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i><p>Comenzi<span class="right badge badge-danger"></span></p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/slides')}}" class="nav-link">
              <i class="nav-icon far fa-image"></i><p>Setări main slide<span class="right badge badge-danger"></span></p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/footer-settings')}}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i><p>Setări footer<span class="right badge badge-danger"></span></p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection('sidebar')