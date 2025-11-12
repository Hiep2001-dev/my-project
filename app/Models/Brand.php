<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'thuong_hieu';
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    protected $fillable = [
        'ten', 'logo', 'duong_dan', 'mo_ta', 'hoat_dong', 'danh_muc_id'
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'thuong_hieu_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'danh_muc_id');
    }
}