<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('thu_tu')->paginate(10);
        return view('admin.posts.categories.index', compact('categories'));
    }

    public function create()
    {
        $allCategories = PostCategory::all();
        return view('admin.posts.categories.create', compact('allCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'cha_id' => 'nullable|integer',
            'thu_tu' => 'nullable|integer',
            'hoat_dong' => 'nullable|boolean',
        ]);
        PostCategory::create($request->only(['ten', 'mo_ta', 'cha_id', 'thu_tu', 'hoat_dong']));
        return redirect()->route('admin.post_categories.index')->with('success', 'Thêm chuyên mục thành công!');
    }


    public function edit($id)
    {
        $category = PostCategory::findOrFail($id);
        $allCategories = PostCategory::all();
        return view('admin.posts.categories.edit', compact('category', 'allCategories'));
    }

    public function update(Request $request, $id)
    {
        $category = PostCategory::findOrFail($id);
        $request->validate([
            'ten' => 'required|string|max:150',
            'mo_ta' => 'nullable|string',
            'cha_id' => 'nullable|integer',
            'thu_tu' => 'nullable|integer',
            'hoat_dong' => 'nullable|boolean',
        ]);
        $category->update($request->only(['ten', 'mo_ta', 'cha_id', 'thu_tu', 'hoat_dong']));
        return redirect()->route('admin.post_categories.index')->with('success', 'Cập nhật chuyên mục thành công!');
    }

    public function destroy($id)
    {
        $category = PostCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.post_categories.index')->with('success', 'Xóa chuyên mục thành công!');
    }
}