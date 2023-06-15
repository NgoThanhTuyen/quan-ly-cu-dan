<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Shanmuga\LaravelEntrust\Traits\LaravelEntrustUserTrait;


class User extends Authenticatable
{
    use HasFactory, Notifiable, LaravelEntrustUserTrait;

    const GENDER = [
        1 => 'Nam',
        2 => 'Nữ',
        3 => 'Không xác định'
    ];

    const TYPES = [
        1 => 'Quản trị',
        2 => 'Cư Dân'
    ];

    const TROOPER = 2;
    const ADMIN = 1;

    const STATUS_USER = [
        1 => 'Hoạt động',
        2 => 'Đã khóa'
    ];

    const STATUS_TR00PER = [
        1 => 'Tham gia',
        2 => 'Giải ngũ'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'email',
        'password',
        'phone',
        'anh_the',
        'ma_cu_dan',
        'ten_tai_khoan',
        'ten_hien_tai',
        'ten_khai_sinh',
        'ten_khac',
        'bi_danh',
        'ngay_sinh',
        'noi_sinh',
        'que_quan',
        'tru_quan',
        'dia_chi_hien_tai',
        'dan_toc',
        'ton_giao',
        'thanh_phan_gia_dinh',
        'thanh_phan_ban_than',
        'tham_gia_cach_mang',
        'co_quan_tuyen_dung',
        'don_vi_nhap_ngu',
        'don_vi_xuat_ngu',
        'tai_nhap_ngu',
        'ket_nap_dang',
        'noi_tuyen_bo',
        'nguoi_gioi_thieu',
        'ngay_noi_vao_doan',
        'van_hoa_pho_thong',
        'hoc_ham_hoc_vi',
        'chi_huy_quan_ly',
        'ly_luan_chinh_tri',
        'chuyen_mon_ky_thuat',
        'ngoai_ngu',
        'tieng_dan_toc',
        'danh_hieu',
        'so_truong',
        'sinh_song_o_nuoc_ngoai',
        'chien_truong_da_qua',
        'suc_khoe_loai',
        'benh_chinh',
        'thuong_tat',
        'lien_he_bao_tin',
        'cao',
        'song_mui',
        'dau_vet_dac_biet',
        'cap_bac',
        'chuc_vu',
        'trang_thai',
        'gioi_tinh',
        'ban_than',
        'thanh_tich',
        'gia_dinh_noi',
        'gia_dinh_ngoai',
        'gia_dinh_vo',
        'ten_vo',
        'ngay_sinh_vo',
        'que_quan_vo',
        'tru_quan_vo',
        'dan_toc_vo',
        'quoc_tich_vo',
        'tu_nam_vo',
        'ton_giao_vo',
        'ngay_noi_dang_ky_ket_hon',
        'dang_vien_vo',
        'doan_vien_vo',
        'van_hoa_vo',
        'cho_o_hien_tai_vo',
        'nghe_nghiep_vo',
        'thong_tin_con',
        'type',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getInfoEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function userRole()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function admin ()
    {
        return $this->hasOne(self::class, 'id', 'c_parent_id')->select('id', 'ten_hien_tai');
    }

    public function families()
    {
        return $this->belongsToMany(Family::class, 'family_users');
    }
}

