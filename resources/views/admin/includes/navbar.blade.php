<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img @if (auth()->user()->role == 'author') src={{ auth()->user()->picture ?? asset('assets/admin/dist/img/avatar2.png') }}
                @else
                src={{ asset('assets/admin/dist/img/avatar2.png') }} @endif
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        {{-- <i class="fas fa-blog nav-icon"></i> --}}
                        <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="fas fa-list-ul nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-plus-square"></i>
                            <p>
                                Category
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('categories.create') }}" class="nav-link">
                                    <i class="fas fa-layer-group nav-icon"></i>
                                    <p>Add</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    <p>Category List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-blog nav-icon"></i>
                        <p>
                            Blogs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blogs.add') }}" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blogs.list') }}" class="nav-link">
                                <i class="fas fa-list-ul nav-icon"></i>
                                <p>Blog List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.list') }}" class="nav-link">
                        <i class="far fa-address-book nav-icon"></i>
                        <p>
                            Contact
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
