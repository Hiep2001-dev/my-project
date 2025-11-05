<?php
// app/Http/Controllers/Admin/DanhMucController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        $parents = Category::whereNull('cha_id')->get();
        return view('admin.categories.create', compact('parents'));
    }

    public function store(Request $request) {
        $request->validate([
            'ten' => 'required|string|max:150',
            'loai' => 'required',
            'mo_ta' => 'nullable|string',
        ]);
        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        $parents = Category::whereNull('cha_id')->get();
        return view('admin.categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy($id) {
        Category::destroy($id);
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}