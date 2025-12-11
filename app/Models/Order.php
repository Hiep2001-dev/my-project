<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'don_hang';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'ma_don',
        'nguoi_dung_id',
        'ma_giam_gia_id',
        'trang_thai',
        'trang_thai_tt',
        'phuong_thuc_tt',
        'phuong_thuc_vc',
        'ma_van_chuyen',
        'tam_tinh',
        'giam_gia',
        'diem_su_dung',
        'phi_vc',
        'tong_tien',
        'ghi_chu',
        'ly_do_huy',
        'thoi_gian_dat',
        'ngay_giao_du_kien',
        'ngay_hoan_thanh',
        'ngay_tao',
        'ngay_cap_nhat',
        'ten_nguoi_nhan',
        'sdt_nguoi_nhan',
        'dia_chi_1',
        'dia_chi_2',
        'xa_phuong',
        'quan_huyen',
        'tinh_thanh',
        'quoc_gia',
    ];

    // Quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id');
    }

    // Quan hệ với mã giảm giá
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'ma_giam_gia_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'don_hang_id');
    }
}