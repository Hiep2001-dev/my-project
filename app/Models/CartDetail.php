<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'chi_tiet_gio_hang';
    const CREATED_AT = 'ngay_them';
    protected $fillable = [
        'gio_hang_id',
        'bien_the_id',
        'so_luong',
        'don_gia',
        'ghi_chu',
        'hinh_anh',
        'ngay_them'
    ];

    public $timestamps = false;

    public function Cart()
    {
        return $this->belongsTo(Cart::class, 'gio_hang_id');
    }

    public function bienTheSanPham()
    {
        return $this->belongsTo(ProductVariation::class, 'bien_the_id');
    }
}