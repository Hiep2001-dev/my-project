<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        // Nếu có từ khóa, thực hiện tìm kiếm
        if ($keyword) {
            $categories = Category::where('ten', 'LIKE', '%' . $keyword . '%') 
                ->with('children', 'parent') 
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            // Nếu không có từ khóa, lấy tất cả danh mục
            $categories = Category::with('children', 'parent')->paginate(10);
        }

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $allCategories = Category::whereNull('cha_id')->get();
        return view('admin.categories.create', compact('allCategories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'cha_id' => 'nullable|integer',
            'hoat_dong' => 'nullable|boolean',
        ]);

        $data = $request->only(['ten', 'mo_ta', 'cha_id', 'hoat_dong']);
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $allCategories = Category::all();
        return view('admin.categories.edit', compact('category', 'allCategories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'ten' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'cha_id' => 'nullable|integer',
            'hoat_dong' => 'nullable|boolean',
        ]);

        $data = $request->only(['ten', 'mo_ta', 'cha_id', 'hoat_dong']);
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