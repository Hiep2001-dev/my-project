<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('shoe.forgot-password');
    }

    public function sendNewPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('status', 'Email không tồn tại!');
        }

        $newPassword = Str::random(8);
        $user->mat_khau = Hash::make($newPassword);
        $user->save();

        Mail::raw("Mật khẩu mới của bạn là: $newPassword", function($message) use ($user) {
            $message->to($user->email)
                    ->subject('Mật khẩu mới từ Footstore');
        });

        return back()->with('status', 'Mật khẩu mới đã được gửi về email của bạn!');
    }
}