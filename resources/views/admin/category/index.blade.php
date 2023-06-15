@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Loại hộ gia đình</a></li>
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
                                    @if ($admin->hasPermission(['them-moi-loai-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                    <a href="{{ route('category.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
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
                                        <th>Tên loại hộ gia đình</th>
                                        <th>Ngày tạo</th>
                                        @if ($admin->hasPermission(['xoa-loai-ho-gia-dinh', 'chinh-sua-loai-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                        <th class=" text-center">Hành động</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$categories->isEmpty())
                                        @php $i = $categories->firstItem(); @endphp
                                        @foreach($categories as $category)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                @if ($admin->hasPermission(['xoa-loai-ho-gia-dinh', 'chinh-sua-loai-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                                <td class="text-center">
                                                    @if ($admin->hasPermission(['chinh-sua-loai-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                                    <a class="btn btn-primary btn-sm" href="{{ route('category.update', $category->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    @endif

                                                    @if ($admin->hasPermission(['xoa-loai-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('category.delete', $category->id) }}">
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
                            @if($categories->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $categories->appends($query = '')->links() }}
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
