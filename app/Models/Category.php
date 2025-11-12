<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'danh_muc';
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    protected $fillable = [
        'ten', 'mo_ta', 'loai', 'hoat_dong'
    ];
    public function brand()
    {
        return $this->hasMany(Brand::class, 'danh_muc_id');
    }
    public function products()
{
    return $this->hasManyThrough(Product::class, Brand::class, 'danh_muc_id', 'thuong_hieu_id');
}
}