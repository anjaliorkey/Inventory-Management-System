
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          </li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.Category.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-list"></i>
              <p>
               Categories

              </p>
            </a>
          </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Vendors
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.supplier.index') }}" class="nav-link">
                            <i class="fas fa-list mr-1"></i>
                            <p>All Vendors</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.supplier.trash') }}" class="nav-link">
                          <i class="fas fa-trash-alt nav-icon"></i>
                            <p>Vendor Trash</p>
                        </a>
                    </li>
                </ul>
            </li>
             <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                      Products
                        <i class="right fas fa-angle-left"></i>

                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link">
                            <i class="fas fa-box mr-1"></i>
                            <p>Products List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.product.trash') }}" class="nav-link">
                          <i class="fas fa-trash-alt mr-1"></i>
                            <p>Products Trash</p>
                        </a>
                    </li>
                </ul>
            </li>



          <li class="nav-item">
                <a href=" " class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Purchase</p>
                </a>
          </li>

           <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-share-square"></i>
                    <p>Item Issue</p>
                </a>
            </li>

            <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-warehouse"></i>
            <p>Stock</p>
        </a>
    </li>




    <!-- Reports -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    Reports
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Purchase Report</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Stock Report</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Item Issue Report</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>Settings</p>
            </a>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
