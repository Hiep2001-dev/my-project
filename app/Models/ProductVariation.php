<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $table = 'bien_the_san_pham';
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    protected $fillable = [
        'san_pham_id',
        'ma_bien_the',
        'hinh_anh_chinh',
        'mau_sac',
        'ma_mau',
        'size_eu',
        'ma_vach',
        'trong_luong_g',
        'trong_luong_dong_goi',
        'kich_thuoc_dong_goi',
        'gia_nhap',
        'gia_ban',
        'gia_goc',
        'so_luong',
        'canh_bao_ton_kho',
        'trang_thai',
    ];

    // Biến thể thuộc về một sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'san_pham_id');
    }
    public function images() 
    { 
        return $this->hasMany(ImageProduct::class, 'bien_the_id'); 
    }
}