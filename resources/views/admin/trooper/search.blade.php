@extends('admin.layouts.main')
@section('title', 'Quản lý cư dân')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('trooper.search') }}">Tìm kiếm cư dân</a></li>
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
                                    <input type="text" name="ma_cu_dan" class="form-control mg-r-15" placeholder="Mã căn cước công dân">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="ten_hien_tai" class="form-control mg-r-15" placeholder="Tên">
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th width="4%" class=" text-center">STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Mã số (CCCD)</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Quê quán</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($users)
                                    @php $i = $users->firstItem(); @endphp
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle;">{{ $i }}</td>
                                            <td style="vertical-align: middle;">
                                                @if(isset($user) && !empty($user->anh_the))
                                                <img src="{{ asset(pare_url_file($user->anh_the)) }}" alt="" class="img-fluid" style="height: 80px; width:80px;">
                                                @else
                                                    <img alt="" class="img-fluid" src="{{ asset('admin/dist/img/avatar5.png') }}" id="image_render" style="height: 80px; width:80px;">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{ $user->ma_cu_dan }}</td>
                                            <td style="vertical-align: middle;" ><a href="{{ route('preview.trooper', [$user->id, 'search' => 'search']) }}" class="preview-trooper">{{ $user->ten_hien_tai }}</a></td>
                                            <td style="vertical-align: middle;">{{ $user->ngay_sinh }}</td>
                                            <td style="vertical-align: middle;">{{ $user->que_quan }}</td>
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if($users && $users->hasPages())
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
