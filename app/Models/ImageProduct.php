<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'hinh_anh_san_pham';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;
    protected $fillable = [
        'bien_the_id',
        'duong_dan',
        'mo_ta',
        'mac_dinh',
        'thu_tu',
        // 'ngay_tao'
    ];

    public function variation()
    {
        return $this->belongsTo(ProductVariation::class, 'bien_the_id');
    }
}