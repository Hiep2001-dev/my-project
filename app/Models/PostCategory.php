<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'chuyen_muc';
    const CREATED_AT = 'ngay_tao';
    
    const UPDATED_AT = 'ngay_cap_nhat';

    protected $fillable = [
        'ten','mo_ta', 'cha_id', 'thu_tu', 'hoat_dong'
    ];
}