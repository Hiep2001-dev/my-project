<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\UserRegisterController;
use App\Models\User;
use App\Http\Controllers\User\UserLoginController;
use Illuminate\Http\Request;
//Admin Routes
Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
Route::get('/admin/users', [UserController::class, 'getuser'])->name('admin.users.index');

// Authentication Routes
Route::get('/admin/auth/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/admin/auth/login', [LoginController::class, 'handleLogin'])->name('login.handle');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//USER ROUTES

Route::get('/shoe/index', function () {
    return view('shoe.index');
});
Route::get('/shoe/introduce', function () {
    return view('shoe.introduce');
})->name('shoe.introduce');
Route::get('/shoe/signin', function () {
    return view('shoe.signin');
})->name('shoe.signin');

Route::get('/shoe/signup', function () {
    return view('shoe.signup');
})->name('shoe.signup');
//Login and Register
Route::get('/shoe/signin', [UserLoginController::class, 'showLoginForm'])->name('shoe.signin');
Route::post('/shoe/signin', [UserLoginController::class, 'login'])->name('shoe.login');
Route::post('/user/register', [UserRegisterController::class, 'register'])->name('user.register');
Route::get('/shoe/index', [UserLoginController::class, 'index'])->name('shoe.index');
Route::post('/shoe/logout', function () {
    Auth::logout();
    return redirect()->route('shoe.index');
})->name('shoe.logout');
Route::get('/check-email', function(Request $request) {
    $exists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});