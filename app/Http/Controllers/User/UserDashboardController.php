<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class UserDashboardController extends Controller
{
    public function index()
    {
    $products = Product::where('hoat_dong', 1)
            ->where('noi_bat', 1)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->limit(8) // chỉ lấy 8 sản phẩm nổi bật cho trang chủ
            ->get();
    $posts = Post::orderByDesc('ngay_xuat_ban')->limit(3)->get();
    $categories = Category::where('hoat_dong', 1)->get();
    $brands = Brand::where('hoat_dong', 1)->get();
    return view('shoe.index', compact('products', 'categories', 'brands', 'posts'));
    }
}