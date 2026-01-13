<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ShoeUserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('shoe.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|unique:nguoi_dung,email,' . $user->id,
            'ngay_sinh' => 'nullable|date',
            'so_dien_thoai' => 'nullable|string|max:20',
        ]);

        $user->update([
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'ngay_sinh' => $request->ngay_sinh,
            'so_dien_thoai' => $request->so_dien_thoai,
        ]);

        return redirect()->route('shoe.profile')->with('success', 'Cập nhật thông tin thành công!');
    }

    public function showChangePasswordForm()
    {
        return view('shoe.profile.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        if (!\Hash::check($request->current_password, $user->mat_khau)) {
            return back()->with('error', 'Mật khẩu hiện tại không đúng!');
        }

        $user->mat_khau = bcrypt($request->new_password);
        $user->save();

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('shoe.index')->with('success', 'Đã đăng xuất thành công!');
    }
    
}