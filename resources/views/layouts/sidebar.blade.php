<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> @guest @else {{ Auth::user()->name }}   @endguest</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>


             <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Website Module
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display:block;">
              <li class="nav-item">
                <a href="{{ route('basic-detail.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Basic Detail</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('slider.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('testimonial.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About-us Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contact-enquiries.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Enquiries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('newsletters')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Newsletter Enquiries</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('size.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Size
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('color.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Color
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product List
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('customer.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Customers List
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('order.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Orders List
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
