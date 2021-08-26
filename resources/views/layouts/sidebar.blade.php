<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ Route::is('product.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-compass"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('exhibitor.guideline') }}"
                        class="nav-link {{ Route::is('exhibitor.guideline') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-compass"></i>
                        <p>
                            Guideline
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('exhibitor.company') }}"
                        class="nav-link {{ Route::is('exhibitor.company') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-compass"></i>
                        <p>
                            Company
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('appointment.index') }}"
                        class="nav-link {{ Route::is('appointment.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-compass"></i>
                        <p>
                            Appointment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('exhibitor.certificate') }}"
                        class="nav-link {{ Route::is('exhibitor.certificate') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-compass"></i>
                        <p>
                            Certificate
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" class="nav-link" onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
