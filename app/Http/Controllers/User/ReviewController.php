<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($productId, $variationId = null)
    {
        $product = Product::findOrFail($productId);
        $variation = $variationId ? ProductVariation::find($variationId) : null;
        return view('shoe.review.create', compact('product', 'variation'));
    }

    public function store(Request $request, $productId, $variationId = null)
    {
        $request->validate([
            'diem' => 'required|integer|min:1|max:5',
            'noi_dung' => 'required|string|max:1000',
            'tieu_de' => 'nullable|string|max:200',
        ]);

        Review::create([
            'san_pham_id' => $productId,
            'bien_the_id' => $variationId,
            'nguoi_dung_id' => Auth::id(),
            'diem' => $request->diem,
            'tieu_de' => $request->tieu_de,
            'noi_dung' => $request->noi_dung,
            'trang_thai' => 'chap_nhan',
            'ngay_tao' => now(),
        ]);

        return redirect()->route('shoe.detailproduct', $productId)->with('success', 'Đánh giá của bạn đã được gửi !');
    }

    public function list($productId)
    {
        $product = Product::findOrFail($productId);
        $reviews = Review::where('san_pham_id', $productId)
            ->where('trang_thai', 'chap_nhan')
            ->with('nguoiDung', 'bienThe')
            ->orderByDesc('ngay_tao')
            ->get();

        return view('shoe.review.list', compact('product', 'reviews'));
    }
}