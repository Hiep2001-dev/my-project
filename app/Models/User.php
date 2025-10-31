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

    // Thay bằng tên bảng thực tế của bạn (ví dụ 'nguoi_dung')
    protected $table = 'nguoi_dung';

    // Khóa chính (mặc định 'id')
    protected $primaryKey = 'id';

    // Nếu cột password không tên 'password' mà là 'mat_khau'
    protected $hidden = [
        'mat_khau',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'ngay_tao' => 'datetime',
        'ngay_cap_nhat' => 'datetime',
    ];

    // Các trường có thể gán hàng loạt (tùy chỉnh theo cột trong DB)
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
        // không thêm mat_khau vào $fillable nếu bạn dùng mass-assignment cho password
    ];

    // Nếu cột password tên khác (ví dụ 'mat_khau'), Laravel auth cần biết:
    public function getAuthPassword()
    {
        return $this->mat_khau; // đổi nếu tên cột khác
    }
}