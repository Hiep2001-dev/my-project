<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageProduct;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ImageProductController extends Controller
{
    // Danh sách hình ảnh của biến thể sản phẩm
    public function index($productId, $variationId)
    {
        $variation = ProductVariation::where('san_pham_id', $productId)->findOrFail($variationId);
        $images = $variation->images()->orderBy('thu_tu')->get();
        return view('admin.products.images.index', [
            'product' => $variation->product,
            'variation' => $variation,
            'images' => $images
        ]);
    }

    // Hiển thị form thêm hình ảnh cho biến thể
    public function create($productId, $variationId,)
    {
        $variation = ProductVariation::where('san_pham_id', $productId)->findOrFail($variationId);
        return view('admin.products.images.create', [
            'product' => $variation->product,
            'variation' => $variation
        ]);
    }

    // Lưu hình ảnh mới cho biến thể
    public function store(Request $request, $productId, $variationId)
    {
        $variation = ProductVariation::where('san_pham_id', $productId)->findOrFail($variationId);

        $request->validate([
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mo_ta' => 'nullable|string|max:255',
            'mac_dinh' => 'nullable|boolean',
            'thu_tu' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('products', 'public');
            $duong_dan = 'storage/' . $path;
        } else {
            $duong_dan = null;
        }

        ImageProduct::create([
            'san_pham_id' => $productId,
            'bien_the_id' => $variationId,
            'duong_dan' => $duong_dan,
            'mo_ta' => $request->mo_ta,
            'mac_dinh' => $request->mac_dinh ?? 0,
            'thu_tu' => $request->thu_tu ?? 0,
        ]);

        return redirect()->route('admin.products.images.index', [$productId, $variationId])
            ->with('success', 'Thêm hình ảnh thành công!');
    }

    // Hiển thị chi tiết hình ảnh
    public function show($productId, $variationId, $id)
    {
        $variation = ProductVariation::where('san_pham_id', $productId)->findOrFail($variationId);
        $image = ImageProduct::where('bien_the_id', $variationId)->findOrFail($id);
        return view('admin.products.images.show', [
            'product' => $variation->product,
            'variation' => $variation,
            'image' => $image
        ]);
    }

    // Hiển thị form sửa hình ảnh
    public function edit($productId, $variationId, $id)
    {
        $variation = ProductVariation::where('san_pham_id', $productId)->findOrFail($variationId);
        $image = ImageProduct::where('bien_the_id', $variationId)->findOrFail($id);
        return view('admin.products.images.edit', [
            'product' => $variation->product,
            'variation' => $variation,
            'image' => $image
        ]);
    }

    // Cập nhật hình ảnh
    public function update(Request $request, $productId, $variationId, $id)
    {
        $variation = ProductVariation::where('san_pham_id', $productId)->findOrFail($variationId);
        $image = ImageProduct::where('bien_the_id', $variationId)->findOrFail($id);

        $request->validate([
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mo_ta' => 'nullable|string|max:255',
            'mac_dinh' => 'nullable|boolean',
            'thu_tu' => 'nullable|integer',
        ]);

        $data = [
            'mo_ta' => $request->mo_ta,
            'mac_dinh' => $request->mac_dinh ?? 0,
            'thu_tu' => $request->thu_tu ?? 0,
        ];

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('products', 'public');
            $data['duong_dan'] = 'storage/' . $path;
        }

        $image->update($data);

        return redirect()->route('admin.products.images.index', [$productId, $variationId])
            ->with('success', 'Cập nhật hình ảnh thành công!');
    }

    // Xóa hình ảnh
    public function destroy($productId, $variationId, $id)
    {
        $variation = ProductVariation::where('san_pham_id', $productId)->findOrFail($variationId);
        $image = ImageProduct::where('bien_the_id', $variationId)->findOrFail($id);
        $image->delete();
        return redirect()->route('admin.products.images.index', [$productId, $variationId])
            ->with('success', 'Xóa hình ảnh thành công!');
    }
}