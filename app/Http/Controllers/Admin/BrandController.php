<?php
// app/Http/Controllers/Admin/ThuongHieuController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create() {
        return view('admin.brands.create');
    }

    public function store(Request $request) {
        $request->validate([
            'ten' => 'required|string|max:150',
            'logo' => 'nullable|string|max:500',
            'mo_ta' => 'nullable|string',
        ]);
        Brand::create($request->all());
        return redirect()->route('admin.brands.index')->with('success', 'Thêm thương hiệu thành công!');
    }

    public function edit($id) {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id) {
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect()->route('admin.brands.index')->with('success', 'Cập nhật thương hiệu thành công!');
    }

    public function destroy($id) {
        Brand::destroy($id);
        return redirect()->route('admin.brands.index')->with('success', 'Xóa thương hiệu thành công!');
    }
}