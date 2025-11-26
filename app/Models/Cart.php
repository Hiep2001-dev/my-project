<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'gio_hang';
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    protected $fillable = [
        'nguoi_dung_id',
        'session_id',
        'trang_thai',
        'ghi_chu',
        'ngay_tao',
        'ngay_cap_nhat'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id');
    }

    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class, 'gio_hang_id');
    }
}