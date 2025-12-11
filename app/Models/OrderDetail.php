<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'chi_tiet_don_hang';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'don_hang_id',
        'bien_the_id',
        'ten_san_pham',
        'thuoc_tinh',
        'hinh_anh',
        'so_luong',
        'don_gia',
        'gia_goc',
        'giam_gia',
        'thanh_tien',
        'trang_thai_danh_gia',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'don_hang_id');
    }

    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class, 'bien_the_id');
    }
}