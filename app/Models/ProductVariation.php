<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $table = 'bien_the_san_pham';

    protected $fillable = [
        'san_pham_id',
        'ma_bien_the',
        'hinh_anh_chinh',
        'mau_sac',
        'ma_mau',
        'size_cm',
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
        'ngay_tao',
        'ngay_cap_nhat'
    ];

    // Biến thể thuộc về một sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'san_pham_id');
    }
}