@extends('admin.layouts.main')
@section('title', 'Quản lý cư dân')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('trooper.index') }}">Quản lý cư dân</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="card-title">From tìm kiếm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="ma_cu_dan" class="form-control mg-r-15" placeholder="Mã cư dân">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="ten_hien_tai" class="form-control mg-r-15" placeholder="Tên">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control mg-r-15" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="input-group-append">
                                    <button type="submit" name="search" value="true" class="btn btn-success " style="margin-right: 10px"><i class="fas fa-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    @if ($admin->hasPermission(['them-moi-cu-dan','toan-quyen-quan-ly']))
                                    <a href="{{ route('trooper.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Mã số (CCCD)</th>
                                        <th>Họ tên</th>
                                        <th>Thuộc hộ</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Giới tính</th>
                                        <th>Vai trò</th>
                                        <th>Trạng thái</th>
                                        @if ($admin->hasPermission(['xoa-cu-dan', 'chinh-sua-cu-dan', 'toan-quyen-quan-ly']))
                                        <th class=" text-center">Hành động</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @if (!$users->isEmpty())
                                    @php $i = $users->firstItem(); @endphp
                                    @foreach($users as $user)
                                        <tr>
                                            <td class=" text-center">{{ $i }}</td>
                                            <td>{{ $user->ma_cu_dan }}</td>
                                            <td><a href="{{ route('preview.trooper', $user->id) }}" class="preview-trooper">{{ $user->ten_hien_tai }}</a></td>
                                            <td>
                                                @php
                                                    if ($user->families) {
                                                        foreach ($user->families as $key => $family) {
                                                            if ($key == 0)
                                                            echo $family->name;
                                                        }
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ isset($genders[$user->gioi_tinh]) ? $genders[$user->gioi_tinh] : '' }}</td>
                                            <td>
                                                @if($user->userRole != null)
                                                    @foreach($user->userRole as $role)
                                                        <span class="label label-success">{{$role->display_name}}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ isset($status[$user->trang_thai]) ? $status[$user->trang_thai] : '' }}</td>
                                            @if ($admin->hasPermission(['xoa-cu-dan', 'chinh-sua-cu-dan', 'toan-quyen-quan-ly']))
                                            <td class="text-center">
                                                @if ($admin->hasPermission(['chinh-sua-cu-dan', 'toan-quyen-quan-ly']))
                                                <a class="btn btn-primary btn-sm" href="{{ route('trooper.update', $user->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                @endif
                                                @if ($admin->hasPermission(['xoa-cu-dan', 'toan-quyen-quan-ly']))
                                                <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('user.delete', $user->id) }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                @endif
                                            </td>
                                            @endif
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if($users->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $users->appends($query = '')->links() }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

    <div class="modal preview fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row" style="margin: auto;">
                        <div class="col-md-12 text-center">
                            <h4 class="modal-title" style="text-transform: uppercase; font-weight: bold; ">Thông Tin Cư Dân</h4>
                        </div>
                    </div>

                </div>
                <div class="modal-body" id="preview">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-green pull-right mg-r-5"><a href="{{ route('trooper.print') }}" target="_blank"><i class="fa fa-fw fa-print"></i> Print (Xuất File)</a></button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Đóng</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.mod -->
    </div>
@stop
