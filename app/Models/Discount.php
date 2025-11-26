<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'ma_giam_gia';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'ma_code',
        'ten_chuong_trinh',
        'mo_ta',
        'loai',
        'gia_tri',
        'gia_tri_don_hang_toi_thieu',
        'giam_toi_da',
        'ap_dung_cho',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'gioi_han_tong',
        'gioi_han_user',
        'so_lan_da_dung',
        'hoat_dong',
        'ngay_tao',
    ];

    // Một mã giảm giá có thể được dùng cho nhiều đơn hàng
    public function orders()
    {
        return $this->hasMany(Order::class, 'ma_giam_gia_id');
    }
}