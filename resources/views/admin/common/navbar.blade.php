<nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            @php
                $user = Auth::user();
            @endphp
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="@if(isset($user) && !empty($user->anh_the)) {{ asset(pare_url_file($user->anh_the)) }} @else {{ asset('/admin/dist/img/avatar5.png') }} @endif" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{!! $user->ten_tai_khoan !!}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="@if(isset($user) && !empty($user->anh_the)) {{ asset(pare_url_file($user->anh_the)) }} @else {{ asset('/admin/dist/img/avatar5.png') }} @endif" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {!! isset($user->ten_hien_tai) ? $user->ten_hien_tai : '' !!}
                        <small>{!! isset($user->email) ? $user->email : '' !!}</small>
                        <small>{!! isset($user->phone) ? $user->phone : '' !!}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('home') }}" class="btn btn-default btn-flat">Thông tin tài khoản</a>
                    <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat float-right">Đăng xuất</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>