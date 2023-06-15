<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-info">
        <img src="{!! asset('admin/dist/img/AdminLTELogo.png') !!}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Quản lý cư dân</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        @php
            $user = Auth::user();
        @endphp
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="@if(isset($user) && !empty($user->anh_the)) {{ asset(pare_url_file($user->anh_the)) }} @else {{ asset('/admin/dist/img/avatar5.png') }} @endif" class="img-circle elevation-2" alt="User Image" style="height: 10px !important;">
            </div>
            <div class="info">
                <a href="{{ route('home')  }}" class="d-block">{!! isset($user->ten_hien_tai) ? $user->ten_hien_tai : '' !!}</a>
        </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if ($user->hasPermission(['danh-sach-loai-ho-gia-dinh', 'toan-quyen-quan-ly']))
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ isset($category_active) ? $category_active : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Loại hộ gia đình</p>
                    </a>
                </li>
                @endif
                @if ($user->hasPermission(['danh-sach-ho-gia-dinh', 'toan-quyen-quan-ly']))
                <li class="nav-item">
                    <a href="{{ route('family.index') }}" class="nav-link {{ isset($family_active) ? $family_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-users"></i>
                        <p>Quản lý hộ gia đình</p>
                    </a>
                </li>
                @endif
                @if ($user->hasPermission(['danh-sach-cu-dan', 'toan-quyen-quan-ly']))
                <li class="nav-item">
                    <a href="{{ route('trooper.index') }}" class="nav-link {{ isset($trooper_active) ? $trooper_active : '' }}">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Quản lý cư dân</p>
                    </a>
                </li>
                @endif
                @if ($user->hasPermission(['danh-sach-the-bao-hiem', 'toan-quyen-quan-ly']))
                <li class="nav-item">
                    <a href="{{ route('insurance.card.index') }}" class="nav-link {{ isset($insurance_card_active) ? $insurance_card_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-credit-card"></i>
                        <p>Quản lý thẻ bảo hiểm</p>
                    </a>
                </li>
                @endif
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ route('group.permission.index') }}" class="nav-link {{ isset($group_permission) ? $group_permission : '' }}">--}}
                        {{--<i class="nav-icon fa fa-hourglass" aria-hidden="true"></i>--}}
                        {{--<p>Nhóm quyền</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ route('permission.index') }}" class="nav-link {{ isset($permission_active) ? $permission_active : '' }}">--}}
                        {{--<i class="nav-icon fa fa-balance-scale"></i>--}}
                        {{--<p> Quyền </p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                @if ($user->hasPermission(['danh-sach-vai-tro', 'toan-quyen-quan-ly']))
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link {{ isset($role_active) ? $role_active : '' }}">
                        <i class="nav-icon fa fa-gavel" aria-hidden="true"></i>
                        <p> Vai trò </p>
                    </a>
                </li>
                @endif

                @if ($user->hasPermission(['danh-sach-nguoi-dung', 'toan-quyen-quan-ly']))
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ route('user.index') }}" class="nav-link {{ isset($user_active) ? $user_active : '' }}">--}}
                        {{--<i class="nav-icon fa fa-fw fa-user" aria-hidden="true"></i>--}}
                        {{--<p> Quản trị viên </p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                @endif
                @if ($user->hasPermission(['tim-kiem-cu-dan', 'toan-quyen-quan-ly']))
                <li class="nav-item has-treeview">
                    <a href="{{ route('trooper.search') }}" class="nav-link {{ isset($search_active) ? $search_active : '' }}">
                        <i class="nav-icon fas fa-search"></i>
                        <p>Tìm kiếm cư dân</p>
                    </a>
                </li>
                @endif
                <li class="nav-item has-treeview">
                    <a href="{{ route('auth.reset.password') }}" class="nav-link {{ isset($reset_password_active) ? $reset_password_active : '' }}">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Đổi mật khẩu</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
