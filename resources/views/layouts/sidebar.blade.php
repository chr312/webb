 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block text-bold">{{ auth()->user()->name }}</a>
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
          <li class="nav-item">
            <a href="/dashboard" class="nav-link active" id="sidebar1">
              <i class="nav-icon fas ion-ios-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" id="sidebar2">
              <i class="nav-icon fas ion-ios-email"></i>
              <p>
                Manages Email
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewEmails" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>View Emails</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="/createemail" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>Create New Email</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" id="sidebar3">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Manages Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewListAdmin" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>View List Admin</p>
                </a>
              </li>
              @can('adminho')
              <li class="nav-item">
                <a href="/createadmin" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>Create New Admin</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" id="sidebar4">
              <i class="nav-icon fas ion-ios-people"></i>
              <p>
                Manages Member
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewListMember" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>View List Member</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/monitoringjob" class="nav-link" id="sidebar5">
              <i class="nav-icon fas ion-android-calendar"></i>
              <p>
                Monitoring Job
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" id="sidebar6">
              <i class="nav-icon fas ion-key"></i>
              <p>
                Manages Ongkir
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewListOngkir" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>View List Ongkir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/createkendaraan" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>Create Kendaraan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/createongkir" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>Create Ongkir</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" id="sidebar7">
              <i class="nav-icon fas ion-calculator"></i>
              <p>
                Free Ongkir
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewListFreeOngkir" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>View List Free Ongkir</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" id="sidebar8">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Set Distance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewDistance" class="nav-link">
                  <i class="far ion-android-remove nav-icon"></i>
                  <p>View Distance</p>
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