<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $products = Product::with(['brand', 'variations'])
                ->where('ten', 'LIKE', '%' . $keyword . '%') // Tìm kiếm theo tên sản phẩm
                ->orWhere('ma_sku', 'LIKE', '%' . $keyword . '%') // Tìm kiếm theo mã SKU
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            $products = Product::with(['brand', 'variations'])
                ->orderBy('id', 'desc')
                ->paginate(10);
            
        }
        

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
            'thuong_hieu_id' => 'nullable|exists:thuong_hieu,id',
            'mo_ta' => 'nullable|string',
            'gioi_tinh' => 'nullable|in:nam,nu,unisex',
            'thue' => 'nullable|numeric',
            'noi_bat' => 'nullable|boolean',
            'hoat_dong' => 'nullable|boolean',
        ]);
        $data = $request->all();

        Product::create($data);

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
            'thuong_hieu_id' => 'nullable|exists:thuong_hieu,id',
            'mo_ta' => 'nullable|string',
            'gioi_tinh' => 'nullable|in:nam,nu,unisex',
            'thue' => 'nullable|numeric',
            'noi_bat' => 'nullable|boolean',
            'hoat_dong' => 'nullable|boolean',
        ]);
        $data = $request->all();

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công!');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

}