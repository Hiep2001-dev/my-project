<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'dia_chi';
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    protected $fillable = [
        'nguoi_dung_id',
        'loai_dia_chi',
        'ho_ten',
        'so_dien_thoai',
        'dia_chi_1',
        'dia_chi_2',
        'xa_phuong',
        'quan_huyen',
        'tinh_thanh',
        'quoc_gia',
        'ma_buu_dien',
        'ghi_chu',
        'mac_dinh'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id');
    }
}