<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('anh_the', 255)->nullable();
            $table->string('ma_cu_dan')->unique();
            $table->string('ten_tai_khoan')->nullable()->unique();
            $table->string('ten_hien_tai')->nullable();
            $table->string('ten_khai_sinh')->nullable();
            $table->string('ten_khac')->nullable();
            $table->string('bi_danh')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('noi_sinh')->nullable();
            $table->string('que_quan')->nullable();
            $table->string('tru_quan')->nullable();
            $table->string('dia_chi_hien_tai', 255)->nullable();
            $table->string('dan_toc', 255)->nullable();
            $table->string('ton_giao', 255)->nullable();
            $table->string('thanh_phan_gia_dinh', 255)->nullable();
            $table->string('thanh_phan_ban_than', 255)->nullable();
            $table->string('tham_gia_cach_mang', 255)->nullable();
            $table->string('co_quan_tuyen_dung', 255)->nullable();
            $table->string('don_vi_nhap_ngu', 255)->nullable();
            $table->string('don_vi_xuat_ngu', 255)->nullable();
            $table->string('tai_nhap_ngu', 255)->nullable();
            $table->string('ket_nap_dang', 255)->nullable();
            $table->string('noi_tuyen_bo', 255)->nullable();
            $table->longText('nguoi_gioi_thieu')->nullable();
            $table->string('ngay_noi_vao_doan', 255)->nullable();
            $table->string('van_hoa_pho_thong', 255)->nullable();
            $table->string('hoc_ham_hoc_vi', 255)->nullable();
            $table->string('chi_huy_quan_ly', 255)->nullable();
            $table->string('ly_luan_chinh_tri', 255)->nullable();
            $table->string('chuyen_mon_ky_thuat', 255)->nullable();
            $table->string('ngoai_ngu', 255)->nullable();
            $table->string('tieng_dan_toc', 255)->nullable();
            $table->string('danh_hieu', 255)->nullable();
            $table->string('so_truong', 255)->nullable();
            $table->longText('sinh_song_o_nuoc_ngoai')->nullable();
            $table->string('chien_truong_da_qua', 255)->nullable();
            $table->string('suc_khoe_loai', 255)->nullable();
            $table->string('benh_chinh', 255)->nullable();
            $table->string('thuong_tat', 255)->nullable();
            $table->longText('lien_he_bao_tin')->nullable();
            $table->tinyInteger('cap_bac')->nullable();
            $table->string('chuc_vu')->nullable();
            $table->tinyInteger('trang_thai')->default(1);
            $table->tinyInteger('gioi_tinh')->default(1)->nullable();
            $table->longText('ban_than')->nullable();
            $table->longText('thanh_tich')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('type')->default(1)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
