<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->first('user_id') ? 'has-error' : '' }}">
                                <label for="inputEmail3" class="control-label default">Cư dân <sup class="text-danger">(*)</sup></label>
                                <div>
                                    <select name="user_id" class="form-control custom-select select2" id="">
                                        <option value="">Chọn cư dân</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id', isset($insuranceCard) ? $insuranceCard->user_id : '') == $user->id ? 'selected="selected"' : '' }}>
                                                {{ $user->ma_cu_dan .'-'. $user->ten_hien_tai }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('user_id') }}</p></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6 {{ $errors->first('code_card') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="control-label default">Mã thẻ bảo hiểm <sup class="text-danger">(*)</sup></label>
                                <div>
                                    <input type="text" maxlength="100" class="form-control"  placeholder="Mã thẻ bảo hiểm" name="code_card" value="{{ old('code_card',isset($insuranceCard) ? $insuranceCard->code_card : '') }}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('code_card') }}</p></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->first('start_date') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="control-label default">Thời hạn đăng ký thẻ <sup class="text-danger">(*)</sup></label>
                                <div>
                                    <select name="time_card" id="" class="form-control">
                                        @foreach($time_card as $key => $time)
                                            <option value="{{ $key }}" {{ old('time_card', isset($insuranceCard) ? $insuranceCard->time_card : '') == $key ? 'selected="selected"' : '' }}>{{ $time }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('time_card') }}</p></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 {{ $errors->first('register_place') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="control-label default">Nơi đăng ký khám  <sup class="text-danger">(*)</sup></label>
                                <div>
                                    <input type="text" class="form-control"  placeholder="Nơi đăng ký khám" name="register_place" value="{{ old('register_place',isset($insuranceCard) ? $insuranceCard->register_place : '') }}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('register_place') }}</p></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Xuất bản</h3>
                    </div>
                    <div class="card-body">
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
