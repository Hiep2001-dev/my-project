<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Hiển thị danh sách danh mục
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // Hiển thị form tạo mới
    public function create()
    {
        return view('admin.categories.create');
    }

    // Lưu danh mục mới
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'loai' => 'nullable|in:giay_chay_bo,giay_tap_gym,giay_bong_ro',
            'hoat_dong' => 'nullable|boolean',
        ]);

        $data = $request->only(['ten', 'mo_ta', 'loai', 'hoat_dong']);
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công!');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'ten' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'loai' => 'nullable|in:giay_chay_bo,giay_tap_gym,giay_bong_ro',
            'hoat_dong' => 'nullable|boolean',
        ]);

        $data = $request->only(['ten', 'mo_ta', 'loai', 'hoat_dong']);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}