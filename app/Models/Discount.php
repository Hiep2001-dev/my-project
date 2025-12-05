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
        'giam_toi_da',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'so_lan_da_dung',
        'hoat_dong',
        'ngay_tao',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'ma_giam_gia_id');
    }
}