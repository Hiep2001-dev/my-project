<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserRegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:150',
            'email' => 'required|email|unique:nguoi_dung,email',
            'ngay_sinh' => 'nullable|date',
            'mat_khau' => 'required|confirmed|min:6',
        ],[
        'email.email' => 'Email không đúng định dạng.',
        'mat_khau.confirmed' => 'Mật khẩu nhập lại không khớp.',
        'mat_khau.required' => 'Vui lòng nhập mật khẩu.',
        'mat_khau_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',]);

        User::create([
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh' => $request->ngay_sinh,
            'gioi_tinh' => $request->gioi_tinh,
            'mat_khau' => Hash::make($request->mat_khau),
            'vai_tro' => 'khach_hang',
            'trang_thai' => 'hoat_dong',
        ]);

       return redirect()->route('shoe.signin')->with('js_success', 'Tạo tài khoản thành công!');

    }
}