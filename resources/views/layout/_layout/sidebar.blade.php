<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse slimscrollsidebar">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search hidden-sm hidden-md hidden-lg"></li>
      
      <li>
        <a href="{{ route('home') }}" class="waves-effect {{ Route::is('home') ? 'active' : '' }}">
          <i class="ti-dashboard p-r-10"></i>
          <span class="hide-menu">Dashboard</span>
        </a>
      </li>

      <li class="{{ Route::is('users.*') || Route::is('roles.*') || Route::is('units.*') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="waves-effect">
          <i class="icon-settings p-r-10"></i>
          <span class="hide-menu">Master Data<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level">
          <li class="{{ Route::is('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">Pengguna</a>
          </li>
          <li class="{{ Route::is('roles.*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}">Role</a>
          </li>
          <li class="{{ Route::is('units.*') ? 'active' : '' }}">
            <a href="{{ route('units.index') }}">Unit</a>
          </li>
        </ul>
      </li>

      <li class="{{ Route::is('periods.*') || Route::is('standards.*') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="waves-effect">
          <i class="icon-note p-r-10"></i>
          <span class="hide-menu">Pengaturan SPMI<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level">
          <li class="{{ Route::is('periods.*') ? 'active' : '' }}">
            <a href="{{ route('periods.index') }}">Periode</a>
          </li>
          <li class="{{ Route::is('standards.*') ? 'active' : '' }}">
            <a href="{{ route('standards.index') }}">Standar</a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</div>