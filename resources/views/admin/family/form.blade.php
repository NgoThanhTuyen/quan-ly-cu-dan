<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
                            <label for="inputEmail3" class="control-label default">Tên chủ hộ gia đình <sup class="text-danger">(*)</sup></label>
                            <div>
                                <input type="text" maxlength="100" class="form-control"  placeholder="Tên chủ hộ gia đình" name="name" value="{{ old('name',isset($family) ? $family->name : '') }}">
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('name') }}</p></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="control-label default">Thành viên trong gia đình <sup class="text-danger">(*)</sup></label>
                            <div>
                                <select name="family_users[]" class="form-control custom-select select2" multiple id="">
                                    <option value="">Chọn thành viên trong gia đình</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if (in_array($user->id, old('family_users', isset($familyUsers) ? $familyUsers : []))) selected="selected" @endif >
                                            {{ $user->ma_cu_dan .'-'. $user->ten_hien_tai }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('family_users') }}</p></span>
                            </div>
                        </div>

                        <div class="form-group form-group-ranks col-md-12">
                            <label for="inputName2" class="col-form-label">Mô tả về hộ gia đình</label>
                            <textarea class="form-control" id="note" name="note" placeholder="">{{old('note', isset($family->note) ? $family->note : '')}}</textarea>
                            <script>
                                ckeditor(note);
                            </script>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('note') }}</p></span>
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
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Loại hộ gia đình <sup class="title-sup">(*)</sup></label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Chọn hộ gia đình</option>
                                @foreach($categories as $key => $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', isset($family) ? $family->category_id : '') == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('category_id') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Gia đình văn hóa <sup class="title-sup">(*)</sup></label>
                            <select name="culture" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('culture', isset($family) ? $family->culture : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('culture') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">GĐ chính sách có công với CM <sup class="title-sup">(*)</sup></label>
                            <select name="policy" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('policy', isset($family) ? $family->policy : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('policy') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Hộ kinh doanh <sup class="title-sup">(*)</sup></label>
                            <select name="business" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('business', isset($family) ? $family->business : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('business') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Xuất khẩu lao động <sup class="title-sup">(*)</sup></label>
                            <select name="export" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('export', isset($family) ? $family->export : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('export') }}</p></span>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
