<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';


    protected $table = 'nguoi_dung';
    protected $primaryKey = 'id';

    protected $hidden = [
        'mat_khau',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'email',
        'so_dien_thoai',
        'ho_ten',
        'avatar',
        'ngay_sinh',
        'gioi_tinh',
        'vai_tro',
        'trang_thai',
        'diem_tich_luy',
        'remember_token',
        'mat_khau',
        
    ];

  
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    public function diaChis()
    {
        return $this->hasMany(Address::class, 'nguoi_dung_id');
    }
}