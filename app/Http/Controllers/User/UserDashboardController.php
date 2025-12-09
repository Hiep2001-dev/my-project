<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Banner;

class UserDashboardController extends Controller
{
    public function index()
    {
        $banners = Banner::where('hoat_dong', 1)
            ->where('vi_tri', 'home_hero')
            ->orderBy('thu_tu')
            ->get();
        $sectionBanners = Banner::where('hoat_dong', 1)
            ->where('vi_tri', 'home_section')
            ->orderBy('thu_tu')
            ->take(3)
            ->get();
        $products = Product::where('hoat_dong', 1)
            ->where('noi_bat', 1)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->limit(8)
            ->get();
        $posts = Post::orderByDesc('ngay_xuat_ban')->limit(3)->get();
        $categories = Category::where('hoat_dong', 1)->get();
        $brands = Brand::where('hoat_dong', 1)->get();

        return view('shoe.index', compact('products', 'categories', 'brands', 'posts', 'banners', 'sectionBanners'));
    }
}
