<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'bai_viet';
    protected $fillable = [
        'tieu_de', 'tom_tat', 'noi_dung', 'hinh_anh_dai_dien',
        'tac_gia_id', 'chuyen_muc_id', 'trang_thai', 'ngay_xuat_ban'
    ];

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';

    public function chuyenMuc()
    {
        return $this->belongsTo(PostCategory::class, 'chuyen_muc_id');
    }

    public function tacGia()
    {
        return $this->belongsTo(User::class, 'tac_gia_id');
    }
}