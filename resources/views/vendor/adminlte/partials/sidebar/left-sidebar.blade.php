<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:rgb(14, 117, 104)">
    {{-- Brand Logo --}}
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light text-white">
            <i class="nav-icon fas fa-heartbeat"></i>
            <b>INIKLINIK</b>
        </span>
    </a>

    {{-- Sidebar --}}
    <div class="sidebar">
        {{-- User Panel --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="{{ asset('img/user-default.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">
                    {{ auth()->user()->name ?? 'User' }}
                </a>
            </div>
        </div>

        {{-- Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                {{-- ADMIN --}}
                @if(auth()->check() && auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-success">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.dokter') }}" class="nav-link {{ request()->is('admin/dokter*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Dokter
                            <span class="right badge badge-success">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pasien') }}" class="nav-link {{ request()->is('admin/pasien*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>
                            Pasien
                            <span class="right badge badge-success">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('poli.index') }}" class="nav-link {{ request()->is('admin/poli*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>
                            Poli
                            <span class="right badge badge-success">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.obat') }}" class="nav-link {{ request()->is('admin/obat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>
                            Obat
                            <span class="right badge badge-success">Admin</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item mt-2">
                    <a href="{{ route('logout') }}" class="nav-link text-white"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                {{-- DOKTER --}}
                @elseif(auth()->user()->role == 'dokter')
                <li class="nav-item">
                    <a href="{{ url('/dokter') }}" class="nav-link {{ request()->is('dokter') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jadwal.index') }}" class="nav-link">
                        <i class="fas fa-calendar-alt nav-icon"></i>
                        <p>Jadwal Periksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/dokter/periksa') }}" class="nav-link {{ request()->is('dokter/periksa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>Pemeriksaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('riwayat.index') }}" class="nav-link">
                        <i class="fas fa-history nav-icon"></i>
                        <p>Riwayat Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/dokter/obat') }}" class="nav-link {{ request()->is('dokter/obat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>Obat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil.index') }}" class="nav-link {{ request()->is('admin/dokter*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            profil
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a href="{{ route('logout') }}" class="nav-link text-white"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

                {{-- PASIEN --}}
                @else
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pasien/periksa" class="nav-link {{ request()->is('pasien/periksa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Periksa</p>
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
