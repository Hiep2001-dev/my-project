<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'danh_gia_san_pham';
    public $timestamps = false;

    protected $fillable = [
        'san_pham_id',
        'bien_the_id',
        'nguoi_dung_id',
        'don_hang_id',
        'da_mua_hang',
        'diem',
        'tieu_de',
        'noi_dung',
        'hinh_anh',
        'luot_thich',
        'tra_loi',
        'ngay_tra_loi',
        'trang_thai',
        'ngay_tao',
    ];

    // N-1 với người dùng
    public function nguoiDung()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id');
    }

    // N-1 với biến thể sản phẩm
    public function bienThe()
    {
        return $this->belongsTo(ProductVariation::class, 'bien_the_id');
    }

    
}