<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm cho người dùng
    public function index()
    {
        $products = Product::where('hoat_dong', 1)->orderBy('ngay_tao', 'desc')->paginate(20);
        return view('shoe.product', compact('products'));
    }

    // Hiển thị chi tiết một sản phẩm
    public function show($id)
    {
        $product = Product::where('hoat_dong', 1)->findOrFail($id);
        return view('shoe.detailproduct', compact('product'));
    }
}