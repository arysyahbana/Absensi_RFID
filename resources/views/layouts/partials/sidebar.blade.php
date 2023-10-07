    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('dist/dist/img/Tilkam.png') }}" alt="SMKN 1 TILKAM Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SMKN 1 TilKam</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('dist/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Hai, {{ Auth::guard()->user()->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ Request::is('absensi') || Request::is('absensi/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Absensi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('absen_dpib') }}"
                                    class="nav-link {{ Request::is('absensi/dpib') ? 'active' : '' }} ml-2">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Absensi DPIB
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('absen_titl') }}"
                                    class="nav-link {{ Request::is('absensi/titl') ? 'active' : '' }} ml-2">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Absensi TITL
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('absen_tkj') }}"
                                    class="nav-link {{ Request::is('absensi/tjkt') ? 'active' : '' }} ml-2">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Absensi TJKT
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('absen_tkr') }}"
                                    class="nav-link {{ Request::is('absensi/tkr') ? 'active' : '' }} ml-2">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Absensi TKR
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('absen') }}"
                                    class="nav-link {{ Request::is('absensi/all') ? 'active' : '' }} ml-2">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Absensi Semua Siswa
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student') }}"
                            class="nav-link {{ Request::is('siswa') || Request::is('siswa/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bk') }}"
                            class="nav-link {{ Request::is('bk') || Request::is('bk/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Bimbingan Konseling
                            </p>
                            @if ($notif = App\Models\Student::where('alfa', 3)->orWhere('terlambat', 3)->count())
                                <span class="badge badge-danger sidebar-badge">
                                    {{ $notif }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-header">
                        <hr>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
