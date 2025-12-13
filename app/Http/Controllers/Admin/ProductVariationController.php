<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductVariationsExport;

class ProductVariationController extends Controller
{
    public function index($productId)
    {
        $product = Product::findOrFail($productId);
        $variations = ProductVariation::where('san_pham_id', $productId)->orderBy('id', 'desc')->get();
        return view('admin.products.variations.index', compact('product', 'variations'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('admin.products.variations.create', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'ma_bien_the' => 'nullable|string|max:80|unique:bien_the_san_pham,ma_bien_the',
            'mau_sac' => 'nullable|string|max:100',
            'size_cm' => 'nullable|numeric',
            'size_eu' => 'nullable|string|max:10',
            'gia_ban' => 'required|numeric',
            'gia_nhap' => 'nullable|numeric',
            'so_luong' => 'nullable|integer',
            'trang_thai' => 'nullable|in:hien,an,ngung_kinh_doanh',
        ]);

        $data = $request->all();
        $data['san_pham_id'] = $productId;

        ProductVariation::create($data);

        return redirect()->route('admin.products.variations.index', $productId)
            ->with('success', 'Thêm biến thể thành công!');
    }

    public function show($productId, $id)
    {
        $product = Product::findOrFail($productId);
        $variation = ProductVariation::findOrFail($id);
        return view('admin.products.variations.show', compact('product', 'variation'));
    }

    public function edit($productId, $id)
    {
        $product = Product::findOrFail($productId);
        $variation = ProductVariation::findOrFail($id);
        return view('admin.products.variations.edit', compact('product', 'variation'));
    }

    public function update(Request $request, $productId, $id)
    {
        $variation = ProductVariation::findOrFail($id);

        $request->validate([
            'ma_bien_the' => 'nullable|string|max:80|unique:bien_the_san_pham,ma_bien_the,' . $id,
            'mau_sac' => 'nullable|string|max:100',
            'size_eu' => 'nullable|string|max:10',
            'gia_ban' => 'required|numeric',
            'gia_nhap' => 'nullable|numeric',
            'so_luong' => 'nullable|integer',
            'trang_thai' => 'nullable|in:hien,an,ngung_kinh_doanh',
        ]);

        $variation->update($request->all());

        return redirect()->route('admin.products.variations.index', $productId)
            ->with('success', 'Cập nhật biến thể thành công!');
    }

    public function destroy($productId, $id)
    {
        ProductVariation::destroy($id);
        return redirect()->route('admin.products.variations.index', $productId)
            ->with('success', 'Xóa biến thể thành công!');
    }
    public function exportProductVariationsExcel($productId)
    {
        return Excel::download(
            new ProductVariationsExport($productId),
            "product_variations_{$productId}.xlsx"
        );
    }
}