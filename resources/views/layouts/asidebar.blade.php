 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">

            <a href="" class="logo">
                <img src="{{asset('assets/img/kaiadmin/logo.png')}}" style="height: 100%;widht:300px" alt="navbar brand" class="navbar-brand"
                    height="20">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>

        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                @if(auth()->user()->role == 1)
                <li class="nav-item {{ request()->is('dashboard*') ? 'active' : ''}}">
                    <a href="{{route('staff.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        {{-- <span class="badge badge-success">4</span> --}}
                    </a>
                </li>
                @elseif(auth()->user()->role == 2)
                <li class="nav-item {{ request()->is('dashboard*') ? 'active' : ''}}">
                    <a href="{{route('ks.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        {{-- <span class="badge badge-success">4</span> --}}
                    </a>
                </li>
                @elseif(auth()->user()->role == 0)
                 <li class="nav-item {{ request()->is('dashboard*') ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        {{-- <span class="badge badge-success">4</span> --}}
                    </a>
                </li>
                @endif
                <li class="nav-item {{ request()->is('Transaksi*') ? 'active' : ''}}">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-folder-open"></i>
                        <p>Transaksi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('Transaksi/uang-masuk*') ? 'active' : ''}}">
                                <a href="{{route('admin.uangmasuk.index')}}">
                                    <span class="sub-item">Uang Masuk</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('Transaksi/uang-keluar*') ? 'active' : ''}}" >
                                <a href="{{route('admin.uangkeluar.index')}}">
                                    <span class="sub-item">Uang Keluar</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('Transaksi/uang-sekolah*') ? 'active' : ''}}">
                                <a href="{{route('admin.uangsekolah.index')}}">
                                    <span class="sub-item">Uang Sekolah</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('Kelola-Data-Siswa*') ? 'active' : ''}}">
                    <a href="{{route('admin.kelola-siswa.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Kelola Data Siswa</p>
                        {{-- <span class="badge badge-success">4</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ request()->is('Laporan*') ? 'active' : ''}}">
                    <a href="{{route('admin.laporan.index')}}">
                        <i class="fas fa-grip-vertical"></i>
                        <p>Laporan</p>
                        {{-- <span class="badge badge-success">4</span> --}}
                    </a>
                </li>
                @if(Auth::user()->role == 1)
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item {{ request()->is('Kelola-kategori*') ? 'active' : ''}}">
                    <a href="{{route('admin.kategori.index')}}">
                        <i class="fas fa-building"></i>
                        <p>Kelola Kategori</p>
                        {{-- <span class="badge badge-success">4</span> --}}
                    </a>
                </li>
                <li class="nav-item {{ request()->is('Kelola-pengguna*') ? 'active' : ''}}">
                    <a href="{{route('admin.kelola-pengguna.index')}}">
                        <i class="fas fa-user"></i>
                        <p>Kelola Pengguna</p>
                        {{-- <span class="badge badge-success">4</span> --}}
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
