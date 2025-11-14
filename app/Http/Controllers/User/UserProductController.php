<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class UserProductController extends Controller
{
    public function index()
    {
        
       $products = Product::where('hoat_dong', 1)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->paginate(20);
        
        $categories = Category::where('hoat_dong', 1)->get();
        $brands = Brand::where('hoat_dong', 1)->get();

        // Trả về view danh sách sản phẩm
        return view('shoe.product', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $product = Product::where('hoat_dong', 1)
            ->with(['variations.images'])
            ->findOrFail($id);

        // Debug để xem dữ liệu variations
        // dd($product->variations->toArray());

        $relatedProducts = Product::where('hoat_dong', 1)
            ->where('id', '!=', $id)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->limit(4)
            ->get();
            
        $categories = Category::where('hoat_dong', 1)->get();
    
        return view('shoe.detailproduct', compact('product', 'relatedProducts', 'categories'));
    }
    public function category($id)
    {
        $products = Product::where('hoat_dong', 1)
            ->where('danh_muc_id', $id)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->paginate(20);

        $categories = Category::where('hoat_dong', 1)->get();
        $currentCategory = Category::findOrFail($id);

        return view('shoe.product', compact('products', 'categories', 'currentCategory'));
    }
}