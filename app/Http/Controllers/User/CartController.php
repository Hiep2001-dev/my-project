<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index()
    {
        $cart = Cart::with('cartDetails.bienTheSanPham')
            ->where('nguoi_dung_id', Auth::id())
            ->where('trang_thai', 'dang_mua')
            ->first();

        return view('shoe.cartdetail', compact('cart'));
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            $cart = Cart::firstOrCreate(
                [
                    'nguoi_dung_id' => Auth::id(),
                    'trang_thai' => 'dang_mua'
                ],
                [
                    'ngay_tao' => now(),
                    'ngay_cap_nhat' => now()
                ]
            );

            $bienThe = ProductVariation::where('san_pham_id', $request->product_id)
                ->where('mau_sac', $request->color)
                ->where('size_eu', $request->size)
                ->first();

            if (!$bienThe) {
                return back()->with('error', 'Không tìm thấy biến thể sản phẩm!');
            }

            $bienTheId = $bienThe->id;
            $soLuong = $request->input('quantity', 1);
            $donGia = $bienThe->gia_ban ?? $request->price ?? 0;

            $chiTiet = CartDetail::where('gio_hang_id', $cart->id)
                ->where('bien_the_id', $bienTheId)
                ->first();

            if ($chiTiet) {
                $chiTiet->so_luong += $soLuong;
                $chiTiet->ngay_them = now();
                $chiTiet->save();
            } else {
                CartDetail::create([
                    'gio_hang_id' => $cart->id,
                    'bien_the_id' => $bienTheId,
                    'so_luong' => $soLuong,
                    'don_gia' => $donGia,
                    'ngay_them' => now(),
                ]);
            }
        } else {
            $cart = session('cart', []);
            $found = false;
            foreach ($cart as &$item) {
                if (
                    $item['san_pham_id'] == $request->product_id &&
                    $item['color'] == $request->color &&
                    $item['size'] == $request->size
                ) {
                    $item['quantity'] += (int)$request->quantity;
                    $found = true;
                    break;
                }
            }
            unset($item);

            if (!$found) {
                $cart[] = [
                    'san_pham_id' => $request->product_id,
                    'name' => $request->product_name,
                    'image' => $request->image,
                    'price' => $request->price,
                    'color' => $request->color,
                    'size' => $request->size,
                    'quantity' => (int)$request->quantity,
                ];
            }
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
        
    }

    public function remove($id)
    {
        if (Auth::check()) {
        $chiTiet = CartDetail::findOrFail($id);
        $chiTiet->delete();
        } else {
            $cart = session('cart', []);
            $cart = array_filter($cart, function($item) use ($id) {
                return $item['san_pham_id'] != $id;
            });
            session(['cart' => array_values($cart)]);
        }

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function update(Request $request, $id)
    {
        $detail = CartDetail::findOrFail($id);
        $quantity = max(1, (int)$request->input('quantity', 1));
        $detail->so_luong = $quantity;
        $detail->save();

        $cart = $detail->Cart;
        $total = $cart->CartDetails->sum(function($i){
            $gia = $i->bienTheSanPham->gia_ban ?? 0;
            return $gia * $i->so_luong;
        });
        $item_total = ($detail->bienTheSanPham->gia_ban ?? 0) * $detail->so_luong;

        return response()->json([
            'success' => true,
            'total' => number_format($total),
            'item_total' => number_format($item_total)
        ]);
    }
    public function checkout()
    {
        $cart = Cart::with('cartDetails.bienTheSanPham.product')
            ->where('nguoi_dung_id', Auth::id())
            ->where('trang_thai', 'dang_mua')
            ->first();

        return view('shoe.checkout', compact('cart'));
    }
   
}