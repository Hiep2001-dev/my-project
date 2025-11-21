<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('shoe.signin');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Tài khoản không tồn tại!']);
    }

    if ($user->trang_thai !== 'hoat_dong') {
        return back()->withErrors(['email' => 'Tài khoản đã bị khóa hoặc chưa kích hoạt!']);
    }

    if (!\Hash::check($request->input('password'), $user->mat_khau)) {
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng!']);
    }

    Auth::login($user);
    return redirect()->route('shoe.index')->with('js_success', 'Đăng nhập thành công!');
}

public function index()
    {
        return view('shoe.index');
    }
}