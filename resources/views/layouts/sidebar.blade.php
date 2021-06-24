<aside class="main-sidebar elevation-4 " style="position: fixed;">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-center">
    <img src="{{asset('img/cms.svg')}}" alt="Laravel CMS" class="brand w-50 mt-5">
    <!--   <h5 class="d-inline-flex">UNITED <br> CREATIVE</h5> -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="height: 480px; overflow-x : scroll;">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" id="nav-active" data-widget="treeview" role="menu" data-accordion="true">

          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-item mt-3">
            <a href="{{url('admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item parent-li">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Branch
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/sub-branch')}}" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Sub Branch</p>
                </a>
              </li>
            </ul>
          </li>

          @foreach($menu as $m)
            @if($m->dropdown == 'Ya' AND $m->placement == 'Superadmin')
            <li class="nav-item parent-li">
              <a href="#" class="nav-link">
                <i class="nav-icon {{$m->icon}}"></i>
                <p>
                  {{$m->title}}
                  <i class="right fas fa-angle-left mt-5"></i>
                </p>
              </a>
                @foreach($submenu as $sm)
                @if($m->id == $sm->menu_id AND $sm->placement == 'Superadmin')
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url($sm->link)}}" class="nav-link">
                      <i class="far nav-icon"></i>
                      <p>{{$sm->title}}</p>
                    </a>
                  </li>
                </ul>
                @endif
                @endforeach
            </li>
            @elseif($m->dropdown == 'Tidak' AND $m->placement == 'Superadmin')
            <li class="nav-item parent-li">
              <a href="{{url($m->link)}}" class="nav-link">
                <i class="nav-icon {{$m->icon}}"></i>
                <p>
                  {{$m->title}}
                </p>
              </a>
            </li>
            @endif
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
