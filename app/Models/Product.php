<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'san_pham';
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    protected $fillable = [
        'ma_sku',
        'ten',
        'duong_dan',
        'thuong_hieu_id',
        'mo_ta',
        'gioi_tinh',
        'thue',
        'noi_bat',
        'luot_xem',
        'luot_ban',
        'diem_trung_binh',
        'so_luong_danh_gia',
        'hoat_dong',    
    ];

    // Quan hệ với thương hiệu
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'thuong_hieu_id');
    }

    // Một sản phẩm có nhiều biến thể
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'san_pham_id');
    }
}