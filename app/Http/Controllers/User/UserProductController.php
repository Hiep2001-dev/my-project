<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    // Hiển thị danh sách sản phẩm cho người dùng
    public function index()
    {
       $products = Product::where('hoat_dong', 1)
            ->where('noi_bat', 1)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->paginate(20);
       return view('shoe.index', compact('products')); // Đúng là shoe.index
    }
    public function show($id){
         $product = Product::where('hoat_dong', 1)
            ->with(['variations.images'])
            ->findOrFail($id);

        // Lấy sản phẩm liên quan (ví dụ: cùng loại, trừ sản phẩm hiện tại)
        $relatedProducts = Product::where('hoat_dong', 1)
            ->where('id', '!=', $id)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->limit(4)
            ->get();

        return view('shoe.detailproduct', compact('product', 'relatedProducts'));
    }
   
}