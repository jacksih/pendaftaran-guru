<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NICK_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

            </ul>
            {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @canany(['periods', 'users', 'divisions', 'programs', 'supports'])
                    <li class="nav-header">Settings</li>
                    @role('kadis')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.setting.seeding.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.setting.seeding.*') ? 'active' : '' }}">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Mass Upload</p>
                            </a>
                        </li>
                    @endrole

                    @can('users')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.setting.user.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.setting.user.*') ? 'active' : '' }}">
                                <i class="fas fa-users nav-icon"></i>
                                <p>List User</p>
                            </a>
                        </li>
                    @endcan
                    @canany('divisions.index')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.setting.division.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.setting.division.*') ? 'active' : '' }}">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>Bidang</p>
                            </a>
                        </li>
                    @endcan
                    @can('programs')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.setting.program.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.setting.program.*') ? 'active' : '' }}">
                                <i class="fas fa-scroll nav-icon"></i>
                                <p>Program Pengadaan</p>
                            </a>
                        </li>
                    @endcan
                    @can('supports')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.setting.proposalDictionary.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.setting.proposalDictionary.*') ? 'active' : '' }}">
                                <i class="fas fa-scroll nav-icon"></i>
                                <p>Kamus Usulan</p>
                            </a>
                        </li>
                    @endcan
                @endcanany

                @canany(['districts', 'villages', 'farmers'])
                    <li class="nav-header">Daerah</li>
                    @can('districts')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.district.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.district.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-city"></i>
                                <p>
                                    Kecamatan
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('villages')
                        @unlessrole('koor')
                            <li class="nav-item">
                                <a href="{{ route('dashboard.village.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.village.*') ? 'active' : '' }}">
                                    <i class="nav-icon fa fa-home"></i>
                                    <p>
                                        Desa
                                    </p>
                                </a>
                            </li>
                        @endunlessrole
                    @endcan
                    @can('farmers')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.farmer.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.farmer.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>
                                    Kelompok Tani
                                </p>
                            </a>
                        </li>
                    @endcan
                @endcanany
                <li class="nav-header">Pengajuan</li>
                @can('requests.read')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.request.index') }}"
                            class="nav-link {{ request()->routeIs('dashboard.request.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Proposal Bantuan
                            </p>
                        </a>
                    </li>
                @endcan
                @if (archivePeriodIsExists())
                    @can('archives.*')
                        <li class="nav-header">Arsip</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.archive.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.archive.index') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Arsip
                                </p>
                            </a>
                        </li>
                        @if (request()->routeIs('dashboard.archive.period.*'))
                            <li class="nav-item {{ request()->routeIs('dashboard.archive.*') ? 'active menu-open' : '' }}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-box-open"></i>
                                    <p>
                                        Data Arsip
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                @can('archives.requests')
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('dashboard.archive.period.request.index', ['period' => request()->route()->parameter('period')]) }}"
                                                class="nav-link {{ request()->routeIs('dashboard.archive.period.request.*') ? 'active' : '' }}">
                                                <i class="fas fa-file-archive nav-icon"></i>
                                                <p>Pengajuan</p>
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </li>
                        @else
                        @endif
                    @endcan
                @endif
            </ul> --}}
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
