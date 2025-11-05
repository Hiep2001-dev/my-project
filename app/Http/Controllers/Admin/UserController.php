<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $admins = User::where('vai_tro', 'quan_li')->get();
        $nhanviens = User::where('vai_tro', 'nhan_vien')->get();
        return view('admin.users.index', compact('users', 'admins', 'nhanviens'));
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'ho_ten' => 'required|string|max:255',
        'email' => 'required|email|unique:nguoi_dung,email',
        'so_dien_thoai' => 'nullable|string|max:20',
        'gioi_tinh' => 'required',
        'vai_tro' => 'required',
        'mat_khau' => 'required|min:6',
        ]);

        User::create([
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'gioi_tinh' => $request->gioi_tinh,
            'vai_tro' => $request->vai_tro,
            'mat_khau' => \Hash::make($request->mat_khau),
            'trang_thai' => 'hoat_dong', // hoặc giá trị mặc định khác
        ]);
        return redirect()->route('admin.users.index')->with('success', 'Thêm người dùng thành công!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
         $user = User::findOrFail($id);

        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'so_dien_thoai' => 'nullable|string|max:20',
            'gioi_tinh' => 'required',
            'vai_tro' => 'required',
            // Email không cho sửa, nên không cần validate unique
            'mat_khau' => 'nullable|min:6',
        ]);

        $user->ho_ten = $request->ho_ten;
        $user->so_dien_thoai = $request->so_dien_thoai;
        $user->gioi_tinh = $request->gioi_tinh;
        $user->vai_tro = $request->vai_tro;
        $user->trang_thai = $request->trang_thai;

        // Nếu nhập mật khẩu mới thì cập nhật
        if ($request->filled('mat_khau')) {
            $user->mat_khau = \Hash::make($request->mat_khau);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật người dùng thành công!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'Xóa thành công!');
    }
}