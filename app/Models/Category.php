<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'danh_muc';
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    protected $fillable = [
        'ten', 'mo_ta', 'cha_id','loai', 'hoat_dong'
    ];
    public function brand()
    {
        return $this->hasMany(Brand::class, 'danh_muc_id');
    }
    public function products()
{
    return $this->hasManyThrough(Product::class, Brand::class, 'danh_muc_id', 'thuong_hieu_id');
}
public function parent()
{
    return $this->belongsTo(Category::class, 'cha_id');
}

public function children()
{
    return $this->hasMany(Category::class, 'cha_id');
}
}