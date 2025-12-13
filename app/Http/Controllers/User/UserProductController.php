<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('hoat_dong', 1);

        if ($request->has('colors')) {
            $query->whereHas('variations', function ($q) use ($request) {
                $q->whereIn('mau_sac', $request->input('colors'));
            });
        }

        if ($request->has('sizes')) {
            $query->whereHas('variations', function ($q) use ($request) {
                $q->whereIn('size_eu', $request->input('sizes'));
            });
        }

        if ($request->has('brands')) {
            $query->where('thuong_hieu_id', $request->input('brands'));
        }


        $products = $query->with(['variations.images'])->paginate(20);

        $categories = Category::where('hoat_dong', 1)->get();
        $brands = Brand::where('hoat_dong', 1)->get();

        return view('shoe.product', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $product = Product::where('hoat_dong', 1)
            ->with(['variations.images'])
            ->findOrFail($id);



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
    public function getSizesByColor(Request $request, $productId)
    {
        $color = $request->get('color');
        
        $product = Product::findOrFail($productId);
        
        // Lấy danh sách size và giá theo màu
        $variations = $product->variations()
            ->where('trang_thai', 'hien')
            ->where('mau_sac', $color)
            ->orderBy('size_eu')
            ->get();
        
        $sizesData = [];
        foreach ($variations as $variation) {
            $sizesData[] = [
                'size' => $variation->size_eu,
                'price' => $variation->gia_ban,
                'stock' => $variation->so_luong_ton ?? 0
            ];
        }
        
        return response()->json([
            'success' => true,
            'sizes' => $sizesData
        ]);
    }
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $products = Product::where('ten', 'like', '%' . $keyword . '%')->paginate(20);
        $categories = Category::where('hoat_dong', 1)->get();
        $brands = Brand::where('hoat_dong', 1)->get();
        return view('shoe.product', compact('products','categories','brands','keyword'));
    }
    
}