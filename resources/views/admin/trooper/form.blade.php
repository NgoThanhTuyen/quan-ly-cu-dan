<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills trooper">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Lý lịch</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Bản thân</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Gia đình</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <div class="row">
                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName" class="col-form-label">Họ tên thường dùng  <sup class="title-sup">(*)</sup></label>
                                        <input type="text" class="form-control" placeholder="Họ tên thường dùng" name="ten_hien_tai" value="{{old('ten_hien_tai', isset($user->ten_hien_tai) ? $user->ten_hien_tai : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ten_hien_tai') }}</p></span>
                                    </div>
                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName" class="col-form-label">Mã căn cước công dân  <sup class="title-sup">(*)</sup></label>
                                        <input type="text" class="form-control" placeholder="Mã căn cước công dân" name="ma_cu_dan" value="{{old('ma_cu_dan', isset($user->ma_cu_dan) ? $user->ma_cu_dan : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ma_cu_dan') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Họ tên khai sinh <sup class="title-sup">(*)</sup></label>
                                        <input type="text" class="form-control" placeholder="Họ tên khai sinh" name="ten_khai_sinh" value="{{old('ten_khai_sinh', isset($user->ten_khai_sinh) ? $user->ten_khai_sinh : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ten_khai_sinh') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Ngày sinh <sup class="title-sup">(*)</sup></label>
                                        <input type="date" class="form-control" name="ngay_sinh" value="{{old('ngay_sinh', isset($user->ngay_sinh) ? $user->ngay_sinh : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ngay_sinh') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Bí danh</label>
                                        <input type="text" class="form-control" placeholder="Bí danh" name="bi_danh" value="{{old('bi_danh', isset($user->bi_danh) ? $user->bi_danh : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('bi_danh') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Tên khác </label>
                                        <input type="text" class="form-control" placeholder="Tên khác" name="ten_khac" value="{{old('ten_khac', isset($user->ten_khac) ? $user->ten_khac : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ten_khac') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Nơi sinh </label>
                                        <input type="text" class="form-control" placeholder="Nơi sinh" name="noi_sinh" value="{{old('noi_sinh', isset($user->noi_sinh) ? $user->noi_sinh : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('noi_sinh') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Nguyên quán </label>
                                        <input type="text" class="form-control" placeholder="Nguyên quán" name="que_quan" value="{{old('que_quan', isset($user->que_quan) ? $user->que_quan : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('que_quan') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Trú quán </label>
                                        <input type="text" class="form-control" placeholder="Trú quán" name="tru_quan" value="{{old('tru_quan', isset($user->tru_quan) ? $user->tru_quan : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('tru_quan') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Nơi ở hiện nay </label>
                                        <input type="text" class="form-control" placeholder="Nơi ở hiện nay" name="dia_chi_hien_tai" value="{{old('dia_chi_hien_tai', isset($user->dia_chi_hien_tai) ? $user->dia_chi_hien_tai : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('dia_chi_hien_tai') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Dân tộc </label>
                                        <input type="text" class="form-control" placeholder="Dân tộc" name="dan_toc" value="{{old('dan_toc', isset($user->dan_toc) ? $user->dan_toc : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('dan_toc') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Tôn giáo </label>
                                        <input type="text" class="form-control" placeholder="Tôn giáo" name="ton_giao" value="{{old('ton_giao', isset($user->ton_giao) ? $user->ton_giao : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ton_giao') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Thành phần gia đình </label>
                                        <input type="text" class="form-control" placeholder="Thành phần gia đình" name="thanh_phan_gia_dinh" value="{{old('thanh_phan_gia_dinh', isset($user->thanh_phan_gia_dinh) ? $user->thanh_phan_gia_dinh : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('thanh_phan_gia_dinh') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Thành phần bản thân </label>
                                        <input type="text" class="form-control" placeholder="Thành phần bản thân" name="thanh_phan_ban_than" value="{{old('thanh_phan_ban_than', isset($user->thanh_phan_ban_than) ? $user->thanh_phan_ban_than : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('thanh_phan_ban_than') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Ngày và nơi kết nạp Đảng cộng sản Việt Nam </label>
                                        <input type="text" class="form-control" placeholder="Ngày và nơi kết nạp Đảng cộng sản Việt Nam" name="ket_nap_dang" value="{{old('ket_nap_dang', isset($user->ket_nap_dang) ? $user->ket_nap_dang : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ket_nap_dang') }}</p></span>
                                    </div>
                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Ngày và nơi vào đoàn TNCSHCM </label>
                                        <input type="text" class="form-control" placeholder="Ngày và nơi vào đoàn TNCSHCM" name="ngay_noi_vao_doan" value="{{old('ngay_noi_vao_doan', isset($user->ngay_noi_vao_doan) ? $user->ngay_noi_vao_doan : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ngay_noi_vao_doan') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <label for="inputName2" class="col-form-label">Họ tên, cấp bậc, chức vụ, đơn vị của người giới thiệu vào Đảng </label>
                                        <textarea class="form-control" id="nguoi_gioi_thieu" name="nguoi_gioi_thieu" placeholder="Họ tên, cấp bậc, chức vụ, đơn vị của người giới thiệu vào Đảng">{{old('nguoi_gioi_thieu', isset($user->nguoi_gioi_thieu) ? $user->nguoi_gioi_thieu : '')}}</textarea>
                                        <script>
                                            ckeditor(nguoi_gioi_thieu);
                                        </script>
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('nguoi_gioi_thieu') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <h3 style="font-size: 18px; font-weight: bold;  text-decoration:underline;">Trình độ học vấn :</h3>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Văn hóa phổ thông </label>
                                        <input type="text" class="form-control" placeholder="Văn hóa phổ thông" name="van_hoa_pho_thong" value="{{old('van_hoa_pho_thong', isset($user->van_hoa_pho_thong) ? $user->van_hoa_pho_thong : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('van_hoa_pho_thong') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Học hàm, học vị cao nhất (thời gian chuyên ngành) </label>
                                        <input type="text" class="form-control" placeholder="Học hàm, học vị cao nhất (thời gian chuyên ngành)" name="hoc_ham_hoc_vi" value="{{old('hoc_ham_hoc_vi', isset($user->hoc_ham_hoc_vi) ? $user->hoc_ham_hoc_vi : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('hoc_ham_hoc_vi') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <h3 style="font-size: 18px; font-weight: bold;  text-decoration:underline;">Nhận dạng ( ghi theo giấy CM) :</h3>
                                    </div>
                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Cao </label>
                                        <input type="text" class="form-control" placeholder="Chiều cao" name="cao" value="{{old('cao', isset($user->cao) ? $user->cao : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('cao') }}</p></span>
                                    </div>
                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Sống mũi </label>
                                        <input type="text" class="form-control" placeholder="Sống mũi" name="song_mui" value="{{old('song_mui', isset($user->song_mui) ? $user->song_mui : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('song_mui') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <label for="inputName2" class="col-form-label">Dấu vết đặc biệt </label>
                                        <input type="text" class="form-control" placeholder="Dấu vết đặc biệt" name="dau_vet_dac_biet" value="{{old('dau_vet_dac_biet', isset($user->dau_vet_dac_biet) ? $user->dau_vet_dac_biet : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('dau_vet_dac_biet') }}</p></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <div class="form-group form-group-trooper col-md-12">
                                    <label for="inputName2" class="col-form-label">1. Khai rõ từ nhỏ đến khi thoát ly tham gia cách mạng : đã làm gì? ở đâu? thời gian nào? những sự việc sảy ra trong gia đình và các mối tuan hệ xã hội ...; những ảnh hưởng tốt, xấu dến tư tưởng tình cảm, tác phong của bản thân.</label>
                                    <textarea class="form-control" id="ban_than" name="ban_than" placeholder="Họ tên, địa chỉ của những người cần báo tin :">{{old('ban_than', isset($user->ban_than) ? $user->ban_than : '')}}</textarea>
                                    <script>
                                        ckeditor(ban_than);
                                    </script>
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ban_than') }}</p></span>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">

                                <div class="form-group form-group-trooper col-md-12">
                                    <h3 style="font-size: 18px; font-weight: bold;  text-decoration:underline;">Tình hình vợ (chồng)</h3>
                                </div>
                                <div class="row">
                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Họ tên vợ (chồng) </label>
                                        <input type="text" class="form-control" placeholder="" name="ten_vo" value="{{old('ten_vo', isset($user->ten_vo) ? $user->ten_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ten_vo') }}</p></span>
                                    </div>
                                    <div class="form-group form-group-trooper col-md-6">
                                        <label for="inputName2" class="col-form-label">Sinh ngày </label>
                                        <input type="date" class="form-control" placeholder="" name="ngay_sinh_vo" value="{{old('ngay_sinh_vo', isset($user->ngay_sinh_vo) ? $user->ngay_sinh_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ngay_sinh_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <label for="inputName2" class="col-form-label">Quê quán </label>
                                        <input type="text" class="form-control" placeholder="" name="que_quan_vo" value="{{old('que_quan_vo', isset($user->que_quan_vo) ? $user->que_quan_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('que_quan_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <label for="inputName2" class="col-form-label">Trú quán trước khi kết hôn </label>
                                        <input type="text" class="form-control" placeholder="" name="tru_quan_vo" value="{{old('tru_quan_vo', isset($user->tru_quan_vo) ? $user->tru_quan_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('tru_quan_vo') }}</p></span>
                                    </div>
                                    <div class="form-group form-group-trooper col-md-3">
                                        <label for="inputName2" class="col-form-label">Dân tộc </label>
                                        <input type="text" class="form-control" placeholder="" name="dan_toc_vo" value="{{old('dan_toc_vo', isset($user->dan_toc_vo) ? $user->dan_toc_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('dan_toc_vo') }}</p></span>
                                    </div>
                                    <div class="form-group form-group-trooper col-md-3">
                                        <label for="inputName2" class="col-form-label">Quốc tịch </label>
                                        <input type="text" class="form-control" placeholder="" name="quoc_tich_vo" value="{{old('quoc_tich_vo', isset($user->quoc_tich_vo) ? $user->quoc_tich_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('quoc_tich_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-3">
                                        <label for="inputName2" class="col-form-label">Từ năm </label>
                                        <input type="text" class="form-control" placeholder="" name="tu_nam_vo" value="{{old('tu_nam_vo', isset($user->tu_nam_vo) ? $user->tu_nam_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('tu_nam_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-3">
                                        <label for="inputName2" class="col-form-label">Tôn giáo </label>
                                        <input type="text" class="form-control" placeholder="" name="ton_giao_vo" value="{{old('ton_giao_vo', isset($user->ton_giao_vo) ? $user->ton_giao_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ton_giao_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <label for="inputName2" class="col-form-label">Ngày và nơi đăng ký kết hôn </label>
                                        <input type="text" class="form-control" placeholder="" name="ngay_noi_dang_ky_ket_hon" value="{{old('ngay_noi_dang_ky_ket_hon', isset($user->ngay_noi_dang_ky_ket_hon) ? $user->ngay_noi_dang_ky_ket_hon : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('ngay_noi_dang_ky_ket_hon') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-4">
                                        <label for="inputName2" class="col-form-label">Đảng viên </label>
                                        <input type="text" class="form-control" placeholder="" name="dang_vien_vo" value="{{old('dang_vien_vo', isset($user->dang_vien_vo) ? $user->dang_vien_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('dang_vien_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-4">
                                        <label for="inputName2" class="col-form-label">Đoàn viên </label>
                                        <input type="text" class="form-control" placeholder="" name="doan_vien_vo" value="{{old('doan_vien_vo', isset($user->doan_vien_vo) ? $user->doan_vien_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('doan_vien_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-4">
                                        <label for="inputName2" class="col-form-label">Văn hóa </label>
                                        <input type="text" class="form-control" placeholder="" name="van_hoa_vo" value="{{old('van_hoa_vo', isset($user->van_hoa_vo) ? $user->van_hoa_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('van_hoa_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-trooper col-md-12">
                                        <label for="inputName2" class="col-form-label">Hiện nay làm gì? ở đâu? </label>
                                        <input type="text" class="form-control" placeholder="" name="cho_o_hien_tai_vo" value="{{old('cho_o_hien_tai_vo', isset($user->cho_o_hien_tai_vo) ? $user->cho_o_hien_tai_vo : '')}}">
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('cho_o_hien_tai_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-ranks col-md-12">
                                        <label for="inputName2" class="col-form-label">Nghề nghiệp, thái độ chính trị từng thời kỳ và hiện nay</label>
                                        <textarea class="form-control" id="nghe_nghiep_vo" name="nghe_nghiep_vo" placeholder="">{{old('nghe_nghiep_vo', isset($user->nghe_nghiep_vo) ? $user->nghe_nghiep_vo : '')}}</textarea>
                                        <script>
                                            ckeditor(nghe_nghiep_vo);
                                        </script>
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('nghe_nghiep_vo') }}</p></span>
                                    </div>

                                    <div class="form-group form-group-ranks col-md-12">
                                        <label for="inputName2" class="col-form-label">Họ tên, giới tính, năm sinh, nghề nghiệp các con</label>
                                        <textarea class="form-control" id="thong_tin_con" name="thong_tin_con" placeholder="">{{old('thong_tin_con', isset($user->thong_tin_con) ? $user->thong_tin_con : '')}}</textarea>
                                        <script>
                                            ckeditor(thong_tin_con);
                                        </script>
                                        <span class="text-danger "><p class="mg-t-5">{{ $errors->first('thong_tin_con') }}</p></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Xuất bản</h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-set">
                            <button type="submit" name="submit" class="btn btn-info" value="{{ isset($user) ? 'update' : 'create' }}">
                                <i class="fa fa-save"></i> Lưu dữ liệu
                            </button>
                            <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                <i class="fa fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                        <div class="form-group form-group-trooper">
                            <label for="inputEmail" class="col-form-label">Email  <sup class="title-sup">(*)</sup></label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{old('email', isset($user->email) ? $user->email : '')}}">
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('email') }}</p></span>
                        </div>
                        @if( !isset($user->password) && empty($user->password) || isset($admin) && $admin->hasPermission(['cap-nhat-mat-khau-va-trang-thai', 'toan-quyen-quan-ly']))
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="inputName2" class="col-form-label">Mật khẩu  <sup class="title-sup">(*)</sup></label>
                                <input type="text" name="password" class="form-control" value="" id="exampleInputEmail1" placeholder="Mật khẩu">
                                <span class="text-danger"><p class="mg-t-5">{{ $errors->first('password') }}</p></span>
                            </div>
                        @endif

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Phone  <sup class="title-sup">(*)</sup></label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{old('phone', isset($user->phone) ? $user->phone : '')}}">
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('phone') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Giới tính <sup class="title-sup">(*)</sup></label>
                            <select name="gioi_tinh" id="" class="form-control">
                                @foreach($genders as $key => $gender)
                                    <option value="{{ $key }}">{{ $gender }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('bi_danh') }}</p></span>
                        </div>

                        <div class="form-group" >
                            <label for="inputName2" class="col-form-label">Vai trò  <sup class="title-sup">(*)</sup></label>
                            <select name="role" class="form-control">
                                <option value="">Chọn vai trò</option>
                                @if($roles)
                                    @foreach($roles as $role)
                                        <option  {{old('role', isset($listRoleUser->role_id) ? $listRoleUser->role_id : '') == $role->id ? 'selected=selected' : '' }}  value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="text-danger"><p class="mg-t-5">{{ $errors->first('role') }}</p></span>
                        </div>

                        <div class="form-group">
                            <label for="inputName2" class="col-form-label">Hình ảnh  </label>
                            <div class="text-center">
                                @if(isset($user) && !empty($user->anh_the))
                                    <img src="{{ asset(pare_url_file($user->anh_the)) }}" alt="" class=" margin-auto-div img-rounded profile-user-img img-fluid img-circle"  id="image_render" style="height: 150px; width:150px;">
                                @else
                                    <img alt="" class="margin-auto-div img-rounded profile-user-img img-fluid img-circle" src="{{ asset('admin/dist/img/avatar5.png') }}" id="image_render" style="height: 150px; width:150px;">
                                @endif
                            </div>
                            <div class="input-group input-file" name="images">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-choose" type="button">Chọn tệp</button>
                                    </span>
                                <input type="text" class="form-control" placeholder='Không có tệp nào ...'/>
                                <span class="input-group-btn"></span>
                            </div>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('images') }}</p></span>

                        </div>
                        @if ($admin->hasPermission(['cap-nhat-mat-khau-va-trang-thai', 'toan-quyen-quan-ly']))
                        <div class="form-group">
                            <label for="inputName2" class="col-form-label">Trạng thái  </label>
                            <div class="col-sm-12">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="status" value="1" @if (isset($user)) {{ isset($user) && $user->trang_thai == 1 ? 'checked' : '' }} @else checked @endif>
                                    <label for="radioPrimary1">
                                        Hoạt động
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline" style="margin-left: 30px;">
                                    <input type="radio" id="radioPrimary2" name="status" value="2" @if (isset($user)) {{ isset($user) && $user->trang_thai == 2 ? 'checked' : '' }} @endif>
                                    <label for="radioPrimary2">
                                        Đã khóa
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
