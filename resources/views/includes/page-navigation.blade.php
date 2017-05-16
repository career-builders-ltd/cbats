<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
      <li class='nav-item <?php echo ($nav_pos =="_dashboard") ? "start active open" : ""; ?>'>
        <a href="{{asset('dashboard')}}" class="nav-link nav-toggle">
          <i class="fa fa-home"></i>
          <span class="title">Dashboard</span>
          <span class="selected"></span>
          <span class="arrow"></span>
        </a>
      </li>
      <li class='nav-item <?php echo ($nav_pos =="_jobs") ? "start active open" : ""; ?>'>
        <a href="{{asset('jobs')}}" class="nav-link nav-toggle">
          <i class="fa fa-calendar"></i>
          <span class="title">Job Openings</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
        </a>
      </li>
      <li class='nav-item <?php echo ($nav_pos =="_candidates") ? "start active open" : ""; ?>'>
        <a href="{{asset('candidates')}}" class="nav-link nav-toggle">
          <i class="fa fa-users"></i>
          <span class="title">Candidates</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
        </a>
      </li>
      <li class='nav-item <?php echo ($nav_pos =="_clients") ? "start active open" : ""; ?>'>
        <a href="{{asset('clients')}}" class="nav-link nav-toggle">
          <i class="fa fa-building"></i>
          <span class="title">Clients</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
        </a>
      </li>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
  <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
