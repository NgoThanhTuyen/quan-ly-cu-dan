<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if(isset($userInfo) && !empty($userInfo->anh_the))
                            <img src="{{ asset(pare_url_file($userInfo->anh_the)) }}" alt="" class=" margin-auto-div img-rounded profile-user-img img-fluid img-circle"  id="image_render" style="height: 150px; width:150px;">
                        @else
                            <img alt="" class="margin-auto-div img-rounded profile-user-img img-fluid img-circle" src="{{ asset('admin/dist/img/avatar5.png') }}" id="image_render" style="height: 150px; width:150px;">
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ $userInfo->ten_hien_tai }}</h3>

                    <p class="text-muted text-center">{{ $userInfo->ma_cu_dan }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        @if ($userInfo->bi_danh)
                            <li class="list-group-item">
                                <strong> Bí danh</strong>
                                <p style="margin: 0px;">{{ $userInfo->bi_danh }}</p>
                            </li>
                        @endif
                        @if ($userInfo->ngay_sinh)
                            <li class="list-group-item">
                                <strong> Ngày sinh</strong>
                                <p style="margin: 0px;">{{ $userInfo->ngay_sinh }}</p>
                            </li>
                        @endif
                        @if ($userInfo->phone)
                            <li class="list-group-item">
                                <strong> Phone </strong>
                                <p style="margin: 0px;">{{ $userInfo->phone }}</p>
                            </li>
                        @endif

                        @if ($userInfo->email)
                            <li class="list-group-item">
                                <strong> Email </strong>
                                <p style="margin: 0px;">{{ $userInfo->email }}</p>
                            </li>
                        @endif
                    </ul>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Giới thiệu</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if ($userInfo->que_quan)
                        <strong> Quê quán</strong>
                        <p class="text-muted">
                            {{ $userInfo->que_quan }}
                        </p>
                        <hr>
                    @endif
                    @if ($userInfo->tru_quan)
                        <strong>Trú quán</strong>
                        <p class="text-muted">{{ $userInfo->tru_quan }}</p>
                        <hr>
                    @endif

                    @if ($userInfo->dia_chi_hien_tai)
                    <strong>Địa chỉ hiện tại</strong>
                    <p class="text-muted">
                        <p class="text-muted">{{ $userInfo->dia_chi_hien_tai }}</p>
                    </p>
                    <hr>
                    @endif
                    @if ($userInfo->dan_toc)
                        <strong>Dân tộc</strong>
                        <p class="text-muted">{{ $userInfo->dan_toc }}</p>
                        <hr>
                    @endif
                    @if ($userInfo->ton_giao)
                        <strong>Tôn giáo</strong>
                        <p class="text-muted">{{ $userInfo->ton_giao }}</p>
                        <hr>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                @if (!isset($print))
                <div class="card-header p-2 text-right">
                    @if ($admin->hasPermission(['chinh-sua-cu-dan', 'toan-quyen-quan-ly']))
                    <a class="btn btn-primary" style="margin-right: 15px" href="{{ route('trooper.update', $userInfo->id) }}">Cập nhật thông tin</a>
                    @endif
                    <button type="button" class="btn bg-green pull-right mg-r-5"><a href="{{ route('trooper.print') }}" target="_blank"><i class="fa fa-fw fa-print"></i> Print (Xuất File)</a></button>

                </div><!-- /.card-header -->
                @endif
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <strong> Thành phần gia đình</strong>
                            <p class="text-muted">
                                {{ $userInfo->thanh_phan_gia_dinh }}
                            </p>
                            <hr>
                            <strong> Thành phần bản thân</strong>
                            <p class="text-muted">
                                {{ $userInfo->thanh_phan_ban_than }}
                            </p>
                            <hr>
                            <strong> Ngày và nơi kết nạp Đảng cộng sản Việt Nam</strong>
                            <p class="text-muted">
                                {{ $userInfo->ket_nap_dang }}
                            </p>
                            <hr>
                            <strong> Ngày và nơi vào đoàn TNCSHCM</strong>
                            <p class="text-muted">
                                {{ $userInfo->ngay_noi_vao_doan }}
                            </p>
                            <hr>
                            <div class="form-group form-group-trooper col-md-12" style="padding: 0px;margin-top: 15px;">
                                <h3 style="font-size: 23px; font-weight: bold;  text-decoration:underline;">Trình độ học vấn :</h3>
                            </div>
                            <strong> Văn hóa phổ thông</strong>
                            <p class="text-muted">
                                {{ $userInfo->van_hoa_pho_thong }}
                            </p>
                            <hr>

                            <strong> Học hàm, học vị cao nhất (thời gian chuyên ngành)</strong>
                            <p class="text-muted">
                                {{ $userInfo->hoc_ham_hoc_vi }}
                            </p>
                            <hr>
                            <div class="form-group form-group-trooper col-md-12">
                                <h3 style="font-size: 18px; font-weight: bold;  text-decoration:underline;">Nhận dạng ( ghi theo giấy CM) :</h3>
                            </div>

                            <strong> Cao </strong>
                            <p class="text-muted">
                                {!! $userInfo->cao !!}
                            </p>
                            <hr>
                            <strong> Sống mũi </strong>
                            <p class="text-muted">
                                {!! $userInfo->song_mui !!}
                            </p>
                            <hr>
                            <strong> Dấu vết đặc biệt </strong>
                            <p class="text-muted">
                                {!! $userInfo->dau_vet_dac_biet !!}
                            </p>
                            <hr>
                            <div class="col-md-12" style="margin-top: 50px">
                                <h3 class="text-center">I. BẢN THÂN</h3>
                            </div>

                            <strong> 1. Khai rõ từ nhỏ đến khi thoát ly tham gia cách mạng : đã làm gì? ở đâu? thời gian nào? những sự việc sảy ra trong gia đình và các mối tuan hệ xã hội ...; những ảnh hưởng tốt, xấu dến tư tưởng tình cảm, tác phong của bản thân. </strong>
                            <p class="text-muted">
                                {!! $userInfo->ban_than !!}
                            </p>
                            </br>


                            <div class="form-group form-group-trooper col-md-12" style="padding: 0px;margin-top: 15px;">
                                <h3 style="font-size: 23px; font-weight: bold;  text-decoration:underline;">Tình hình vợ (chồng) </h3>
                            </div>

                            <strong> Họ tên vợ (chồng)</strong>
                            <p class="text-muted">
                                {{ $userInfo->ten_vo }}
                            </p>
                            <hr>
                            <strong> Sinh ngày</strong>
                            <p class="text-muted">
                                {{ $userInfo->ngay_sinh_vo }}
                            </p>
                            <hr>
                            <strong> Quê quán</strong>
                            <p class="text-muted">
                                {{ $userInfo->que_quan_vo }}
                            </p>
                            <hr>
                            <strong> Trú quán trước khi kết hôn</strong>
                            <p class="text-muted">
                                {{ $userInfo->tru_quan_vo }}
                            </p>
                            <hr>

                            <div class="row">
                                <div class="col-md-3">
                                    <strong> Dân tộc</strong>
                                    <p class="text-muted">
                                        {{ $userInfo->dan_toc_vo }}
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <strong> Quốc tịch</strong>
                                    <p class="text-muted">
                                        {{ $userInfo->quoc_tich_vo }}
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <strong> Từ năm</strong>
                                    <p class="text-muted">
                                        {{ $userInfo->tu_nam_vo }}
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <strong> Tôn giáo </strong>
                                    <p class="text-muted">
                                        {{ $userInfo->ton_giao_vo }}
                                    </p>
                                    <hr>
                                </div>
                            </div>
                            <strong> Ngày và nơi đăng ký kết hôn</strong>
                            <p class="text-muted">
                                {{ $userInfo->ngay_noi_dang_ky_ket_hon }}
                            </p>
                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <strong> Đảng viên</strong>
                                    <p class="text-muted">
                                        {{ $userInfo->dang_vien_vo }}
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <strong> Đoàn viên</strong>
                                    <p class="text-muted">
                                        {{ $userInfo->doan_vien_vo }}
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <strong> Văn hóa</strong>
                                    <p class="text-muted">
                                        {{ $userInfo->van_hoa_vo }}
                                    </p>
                                    <hr>
                                </div>
                            </div>
                            <strong> Hiện nay làm gì? ở đâu?</strong>
                            <p class="text-muted">
                                {{ $userInfo->cho_o_hien_tai_vo }}
                            </p>
                            <hr>

                            <strong> Nghề nghiệp, thái độ chính trị từng thời kỳ và hiện nay </strong>
                            <p class="text-muted">
                                {!! $userInfo->nghe_nghiep_vo !!}
                            </p>
                            <hr>

                            <strong> Họ tên, giới tính, năm sinh, nghề nghiệp các con </strong>
                            <p class="text-muted">
                                {!! $userInfo->thong_tin_con !!}
                            </p>
                            <hr>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->