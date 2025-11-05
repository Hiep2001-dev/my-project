<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'thuong_hieu';
    protected $fillable = [
        'ten', 'logo', 'mo_ta'
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'thuong_hieu_id');
    }
}