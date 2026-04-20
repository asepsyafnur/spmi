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

      <li class="{{ Route::is('periods.*') || Route::is('standards.*') || Route::is('indicators.*') ? 'active' : '' }}">
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
          <li>
            <a href="#">Indikator</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="javascript:void(0);" class="waves-effect">
          <i class="icon-list p-r-10"></i>
          <span class="hide-menu">Kuesioner<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level">
          <li><a href="#">Kuesioner</a></li>
          <li><a href="#">Pertanyaan</a></li>
          <li><a href="#">Opsi Jawaban</a></li>
        </ul>
      </li>

      <li>
        <a href="javascript:void(0);" class="waves-effect">
          <i class="icon-pencil p-r-10"></i>
          <span class="hide-menu">Pengisian<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level">
          <li><a href="#">Respons</a></li>
          <li><a href="#">Jawaban Respons</a></li>
        </ul>
      </li>

      <li>
        <a href="javascript:void(0);" class="waves-effect">
          <i class="icon-magnifier p-r-10"></i>
          <span class="hide-menu">Audit<span class="fa arrow"></span></span>
        </a>
        <ul class="nav nav-second-level">
          <li><a href="#">Audit</a></li>
          <li><a href="#">Temuan Audit</a></li>
          <li><a href="#">Tindak Lanjut</a></li>
        </ul>
      </li>

    </ul>
  </div>
</div>