<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id';

    const CREATED_AT = 'ngay_tao';
    public $timestamps = false;

    protected $fillable = [
        'tieu_de',
        'mo_ta',
        'hinh_anh',
        'link',
        'vi_tri',
        'thu_tu',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'hoat_dong',
        'nguoi_tao_id',
    ];
}