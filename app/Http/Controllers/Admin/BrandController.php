<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;

class BrandController extends Controller
{
    public function index() {
        
        $categories= Category::all();
        // dd($categories);
        $brands = Brand::orderBy('id', 'desc')->paginate(10);
        return view('admin.brands.index', compact('brands', 'categories'));
    }

    public function create() {
        return view('admin.brands.create');
    }

    public function store(Request $request) {
        $request->validate([
            'ten' => 'required|string|max:150',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mo_ta' => 'nullable|string',
            'hoat_dong' => 'nullable|boolean',
            'danh_muc_id' => 'nullable|exists:danh_muc,id',
        ]);

        $data = $request->only(['ten', 'mo_ta', 'hoat_dong', 'danh_muc_id']);
        $data['duong_dan'] = \Str::slug($request->ten);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('brands', 'public');
            $data['logo'] = 'storage/' . $path;
        }

        Brand::create($data);
        return redirect()->route('admin.brands.index')->with('success', 'Thêm thương hiệu thành công!');
    }

    public function edit($id) {
        $brand = Brand::findOrFail($id);
        $categories= Category::all();
        return view('admin.brands.edit', compact('brand'));
    }
    public function update(Request $request, $id) {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'ten' => 'required|string|max:150',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mo_ta' => 'nullable|string',
            'hoat_dong' => 'nullable|boolean',
            'danh_muc_id' => 'nullable|exists:danh_muc,id',
        ]);

        $data = $request->only(['ten', 'mo_ta', 'hoat_dong', 'danh_muc_id']);
        $data['duong_dan'] = \Str::slug($request->ten);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('brands', 'public');
            $data['logo'] = 'storage/' . $path;
        }

        $brand->update($data);
        return redirect()->route('admin.brands.index')->with('success', 'Cập nhật thương hiệu thành công!');
    }

    public function destroy($id) {
        Brand::destroy($id);
        return redirect()->route('admin.brands.index')->with('success', 'Xóa thương hiệu thành công!');
    }
}