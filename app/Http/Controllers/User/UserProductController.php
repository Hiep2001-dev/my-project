<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
 
    public function index()
    {
       $products = Product::where('hoat_dong', 1)
            ->where('noi_bat', 1)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->paginate(20);
       return view('shoe.index', compact('products')); 
    }
    public function show($id){
         $product = Product::where('hoat_dong', 1)
            ->with(['variations.images'])
            ->findOrFail($id);

       
        $relatedProducts = Product::where('hoat_dong', 1)
            ->where('id', '!=', $id)
            ->with(['variations.images'])
            ->orderBy('ngay_tao', 'desc')
            ->limit(4)
            ->get();

        return view('shoe.detailproduct', compact('product', 'relatedProducts'));
    }
   
}