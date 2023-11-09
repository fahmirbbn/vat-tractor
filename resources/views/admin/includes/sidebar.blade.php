<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/img/thunder.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if ($logged_in_user->can('admin.access.index'))
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                @endif
                @if ($logged_in_user->can('admin.access.news'))
                    <li class="nav-item">
                        <a href="{{ route('admin.news.index') }}"
                            class="nav-link {{ Route::is('admin.news.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                News
                            </p>
                        </a>
                    </li>
                @endif
                @if ($logged_in_user->can('admin.access.rencana_kerja'))
                    <li class="nav-item">
                        <a href="{{ route('admin.rencana_kerja.index') }}"
                            class="nav-link {{ Route::is('admin.rencana_kerja.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i> <!-- Icon for Rencana Kerja -->
                            <p>
                                Rencana Kerja
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-header">System</li>
                <li
                    class="nav-item {{ Route::is('admin.user.*') || Route::is('admin.profile.*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Access
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if ($logged_in_user->can('admin.access.user'))
                            <li class="nav-item">
                                <a href="{{ route('admin.user.index') }}"
                                    class="nav-link {{ Route::is('admin.user.*') ? 'active' : '' }}">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        @endif
                        @if ($logged_in_user->can('admin.access.profile'))
                            <li class="nav-item">
                                <a href="{{ route('admin.profile.index') }}"
                                    class="nav-link {{ Route::is('admin.profile.*') ? 'active' : '' }}">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-right-from-bracket nav-icon"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
