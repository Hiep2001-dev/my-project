<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->orderBy('id', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ma_sku' => 'nullable|string|max:80|unique:san_pham,ma_sku',
            'ten' => 'required|string|max:255',
            'duong_dan' => 'nullable|string|max:255|unique:san_pham,duong_dan',
            'thuong_hieu_id' => 'nullable|exists:thuong_hieu,id',
            'mo_ta' => 'nullable|string',
            'video' => 'nullable|string|max:500',
            'thong_tin_ky_thuat' => 'nullable|json',
            'huong_dan_bao_quan' => 'nullable|string',
            'loai_san' => 'nullable|in:TF,AG,FG,IC,NA',
            'gioi_tinh' => 'nullable|in:nam,nu,unisex',
            'thue' => 'nullable|numeric',
            'noi_bat' => 'nullable|boolean',
            'hoat_dong' => 'nullable|boolean',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function show($id)
    {
        $product = Product::with(['brand', 'variations'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'ma_sku' => 'nullable|string|max:80|unique:san_pham,ma_sku,' . $id,
            'ten' => 'required|string|max:255',
            'duong_dan' => 'nullable|string|max:255|unique:san_pham,duong_dan,' . $id,
            'thuong_hieu_id' => 'nullable|exists:thuong_hieu,id',
            'mo_ta' => 'nullable|string',
            'video' => 'nullable|string|max:500',
            'thong_tin_ky_thuat' => 'nullable|json',
            'huong_dan_bao_quan' => 'nullable|string',
            'loai_san' => 'nullable|in:TF,AG,FG,IC,NA',
            'gioi_tinh' => 'nullable|in:nam,nu,unisex',
            'thue' => 'nullable|numeric',
            'noi_bat' => 'nullable|boolean',
            'hoat_dong' => 'nullable|boolean',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}