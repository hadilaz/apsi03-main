<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Blog</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="/dasboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('main-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#main" aria-expanded="true"
            aria-controls="main">
            <i class="fas fa-fw fa-folder"></i>
            <span>Main</span>
        </a>
        <div id="main" class="collapse @yield('main')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @role('koordinator')
                <a class="collapse-item @yield('rekap')" href="/rekap">Rekaptulasi</a>
                @endrole
                @role('penguji|pebimbing')
                <a class="collapse-item @yield('penilaian')" href="/penilaian">Penilaian</a>
                <a class="collapse-item @yield('validasi')" href="/validasi">Validasi</a>
                @endrole
                <a class="collapse-item @yield('Jadwal')" href="/jadwal">Jadwal Seminar</a>
                @role('mahasiswa|penguji|pebimbing')
                <a class="collapse-item @yield('messages')" href="{{ route('messages') }}">pesan @include('messenger.unread-count')</a>
                <a class="collapse-item @yield('rekaptulasi')" href="/rekaptulasi">Form Upload Laporan</a>
                <a class="collapse-item @yield('revisi')" href="/revisi">Revisi</a>
                 @endrole
            </div>
        </div>
    </li>

    @role('koordinator')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('user-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true"
            aria-controls="user">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
        <div id="user" class="collapse @yield('user')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @yield('users')" href="{{ route('users.index') }}">Managemen User</a>
                <a class="collapse-item @yield('roles')" href="{{ route('roles.index') }}">Managemen Role</a>
            </div>
        </div>
    </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-arrow-left"></i>
            <span>Halaman Depan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
