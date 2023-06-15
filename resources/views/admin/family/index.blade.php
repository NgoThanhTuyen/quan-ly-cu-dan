@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('family.index') }}">Quản lý hộ gia đình</a></li>
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
                                    <input type="text" name="name" class="form-control mg-r-15" placeholder="Tên chủ hộ">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Chọn hộ gia đình</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="culture" id="" class="form-control">
                                    <option value="">Chọn gia đình văn hóa</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="policy" id="" class="form-control">
                                    <option value="">Chọn gia đình chính sách</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="business" id="" class="form-control">
                                    <option value="">Hộ kinh doanh</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="export" id="" class="form-control">
                                    <option value="">Có người đi xuất khẩu</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
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
                                    @if ($admin->hasPermission(['them-moi-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                    <a href="{{ route('family.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
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
                                        <th>Tên chủ hộ gia đình</th>
                                        <th>Loại hộ GĐ</th>
                                        <th>Gia đình văn hóa</th>
                                        <th>Gia đình chính sách</th>
                                        <th>Hộ kinh doanh</th>
                                        <th>Có thành viên đi XKLD</th>
                                        <th>Ngày tạo</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$families->isEmpty())
                                        @php $i = $families->firstItem(); @endphp
                                        @foreach($families as $family)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td>{{ $family->name }}</td>
                                                <td>{{ isset($family->category) ? $family->category->name : '' }}</td>
                                                <td>{{ isset($types[$family->culture]) ? $types[$family->culture] : '' }}</td>
                                                <td>{{ isset($types[$family->policy]) ? $types[$family->policy] : '' }}</td>
                                                <td>{{ isset($types[$family->business]) ? $types[$family->business] : '' }}</td>
                                                <td>{{ isset($types[$family->export]) ? $types[$family->export] : '' }}</td>
                                                <td>{{ !empty($family->created_at) ? date('Y-m-d', strtotime($family->created_at)) : '' }}</td>
                                                <td class="text-center">

                                                    <a href="{{ route('family.preview', $family->id) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-eye"></i></a>
                                                    @if ($admin->hasPermission(['xoa-ho-gia-dinh', 'chinh-sua-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                                        @if ($admin->hasPermission(['chinh-sua-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                                        <a class="btn btn-primary btn-sm" href="{{ route('family.update', $family->id) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        @endif
                                                        @if ($admin->hasPermission(['xoa-ho-gia-dinh', 'toan-quyen-quan-ly']))
                                                        <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('family.delete', $family->id) }}">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($families->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $families->appends($query = '')->links() }}
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
