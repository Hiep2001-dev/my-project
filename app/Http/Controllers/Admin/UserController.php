<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $admins = User::where('vai_tro', 'quan_li')->get();
        $nhanviens = User::where('vai_tro', 'nhan_vien')->get();
        return view('admin.index', compact('admins', 'nhanviens'));
    }
    public function getuser()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }
}