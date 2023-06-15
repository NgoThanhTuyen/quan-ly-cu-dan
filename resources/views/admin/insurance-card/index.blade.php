@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('insurance.card.index') }}">Quản lý thẻ bảo hiểm</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    @if ($admin->hasPermission(['them-moi-the-bao-hiem', 'toan-quyen-quan-ly']))
                                    <a href="{{ route('insurance.card.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
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
                                        <th>Họ và tên</th>
                                        <th>Mã thẻ</th>
                                        <th>Ngày đăng ký</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Nơi đăng ký</th>
                                        <th>Ngày tạo</th>
                                        @if ($admin->hasPermission(['xoa-the-bao-hiem', 'chinh-sua-the-bao-hiem', 'toan-quyen-quan-ly']))
                                        <th class=" text-center">Hành động</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$insuranceCards->isEmpty())
                                        @php $i = $insuranceCards->firstItem(); @endphp
                                        @foreach($insuranceCards as $insuranceCard)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td>{{ isset($insuranceCard->user) ? $insuranceCard->user->ten_hien_tai : ''}}</td>
                                                <td>{{ $insuranceCard->code_card }}</td>
                                                <td>{{ $insuranceCard->start_date }}</td>
                                                <td>{{ $insuranceCard->end_date }}</td>
                                                <td>{{ $insuranceCard->register_place }}</td>
                                                <td>{{ !empty($insuranceCard->created_at) ? date('Y-m-d', strtotime($insuranceCard->created_at)) : '' }}</td>
                                                @if ($admin->hasPermission(['xoa-the-bao-hiem', 'chinh-sua-the-bao-hiem', 'toan-quyen-quan-ly']))
                                                <td class="text-center">
                                                    @if ($admin->hasPermission(['chinh-sua-the-bao-hiem', 'toan-quyen-quan-ly']))
                                                    <a class="btn btn-primary btn-sm" href="{{ route('insurance.card.update', $insuranceCard->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    @endif

                                                    @if ($admin->hasPermission(['xoa-the-bao-hiem', 'toan-quyen-quan-ly']))
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('insurance.card.delete', $insuranceCard->id) }}">
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
                            @if($insuranceCards->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $insuranceCards->appends($query = '')->links() }}
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
@stop
