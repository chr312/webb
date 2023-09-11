<!-- Navbar -->
<nav class="main-header navbar navbar-expand text-white navbar-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- Brand Logo -->
      <li>
        <img 
            src="https://b2b.klikindogrosir.com/img/cmslogo.png"
            class="mt-2"
            height="30"
        />
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link text-white" data-toggle="dropdown" href="#">
        Selamat Datang {{ auth()->user()->name }}  <i class="far fa-user ml-2"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Account</span>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="GET">
            @CSRF
            <button type="submit" class="dropdown-item">
              <i class="fas ion-log-out mr-2"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->