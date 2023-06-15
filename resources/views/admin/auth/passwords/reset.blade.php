@extends('admin.layouts.main')
@section('title', 'Đổi mật khẩu')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đổi mật khẩu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form role="form" action="{{ route('post.auth.reset.password') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group {{ $errors->first('current_password') ? 'has-error' : '' }} ">
                                    <label for="inputEmail3" class="control-label default">Mật khẩu hiện tại <sup class="text-danger">(*)</sup></label>
                                    <div>
                                        <input type="password" class="form-control" name="current_password" value="">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('current_password') }}</p></span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }} ">
                                    <label for="inputEmail3" class="control-label default">Mật khẩu mới <sup class="text-danger">(*)</sup></label>
                                    <div>
                                        <input type="password" class="form-control" name="password" value="">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('password') }}</p></span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->first('r_password') ? 'has-error' : '' }} ">
                                    <label for="inputEmail3" class="control-label default">Nhập lại mật khẩu <sup class="text-danger">(*)</sup></label>
                                    <div>
                                        <input type="password" class="form-control" name="r_password" value="">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('r_password') }}</p></span>
                                    </div>
                                </div>

                                <div class="btn-set">
                                    <button type="submit" name="submit" class="btn btn-info">
                                        <i class="fa fa-save"></i> Lưu dữ liệu
                                    </button>
                                    <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                        <i class="fa fa-undo"></i> Reset
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
@stop
