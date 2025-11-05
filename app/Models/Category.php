<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'danh_muc';
    protected $fillable = [
        'ten', 'loai', 'mo_ta', 'cha_id'
    ];
    public function brand()
    {
        return $this->hasMany(Brand::class, 'danh_muc_id');
    }
}