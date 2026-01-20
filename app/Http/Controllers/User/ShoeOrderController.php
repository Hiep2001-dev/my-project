<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Discount;
use App\Models\Order;
use App\Models\ProductVariation;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail;

class ShoeOrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = null;
        $cartItems = collect([]);
        $hasSessionItems = false;
        $hasDbItems = false;
        $user = auth()->user();
        $defaultAddress = null;

        if ($user) {
            $cart = Cart::with('cartDetails.ProductVariation.product')
                ->where('nguoi_dung_id', $user->id)
                ->first();
            $hasDbItems = $cart && $cart->cartDetails && $cart->cartDetails->count() > 0;
            $defaultAddress = $user->diaChis->where('mac_dinh', 1)->first();
        } else {
            $cartSession = session('cart', []);
            $cartItems = collect($cartSession)->map(function ($item) {
                return (object)[
                    'ten' => $item['name'] ?? '',
                    'image' => $item['image'] ?? '',
                    'mau_sac' => $item['color'] ?? '',
                    'size_eu' => $item['size'] ?? '',
                    'gia_ban' => $item['price'] ?? 0,
                    'so_luong' => $item['quantity'] ?? 1,
                ];
            });
            $hasSessionItems = $cartItems->count() > 0;
        }

        return view('shoe.checkout', [
            'cart' => $cart,
            'cartItems' => $cartItems,
            'user' => $user,
            'defaultAddress' => $defaultAddress,
            'hasSessionItems' => $hasSessionItems,
            'hasDbItems' => $hasDbItems,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $tinh_thanh = $request->input('tinh_thanh');
            $hcm_names = ['TP.HCM', 'Thành phố Hồ Chí Minh', 'Hồ Chí Minh', 'Ho Chi Minh', 'TP HCM', 'Tp Hồ Chí Minh', 'TpHCM', 'Thành phố HCM'];
            if (in_array(trim(mb_strtolower($tinh_thanh)), array_map('mb_strtolower', $hcm_names))) {
                $phi_ship = 30000;
                $ngay_giao_du_kien = now()->addDays(3) ;
            } else {
                $phi_ship = 50000;
                $ngay_giao_du_kien = now()->addDays(7) ;
            }
        if (auth()->check()) {
            $cart = Cart::with('cartDetails.productVariation.product')
                ->where('nguoi_dung_id', auth()->id())
                ->firstOrFail();

            $tong_tien = $cart->cartDetails->sum(function ($i) {
                return ($i->productVariation->gia_ban ?? 0) * $i->so_luong ;
            });

            $giam_gia = 0;
            $ma_giam_gia_id = null;
            if ($request->filled('ma_giam_gia')) {
                $discount = Discount::where('ma_code', $request->ma_giam_gia)
                    ->where('hoat_dong', 1)
                    ->where('ngay_bat_dau', '<=', now())
                    ->where('ngay_ket_thuc', '>=', now())
                    ->first();

                if ($discount) {
                    $ma_giam_gia_id = $discount->id;
                    if ($discount->loai == 'phan_tram') {
                        $giam_gia = $tong_tien * $discount->gia_tri / 100;
                    } else {
                        $giam_gia = $discount->gia_tri;
                    }
                }
            }

            $order = new Order;
            $order->nguoi_dung_id = auth()->id();
            $order->ten_nguoi_nhan = $request->ten_nguoi_nhan;
            $order->sdt_nguoi_nhan = $request->sdt_nguoi_nhan;
            $order->dia_chi_1 = $request->dia_chi_1;
            $order->ghi_chu = $request->ghi_chu;
            $order->trang_thai = 'cho_xu_ly';
            $order->phuong_thuc_tt = $request->phuong_thuc_tt;
            // $order->trang_thai_tt = 'chua_tt';
            $order->thoi_gian_dat = now();
            $order->tong_tien = $tong_tien - $giam_gia + $phi_ship;
            $order->phi_ship = $phi_ship;
            $order->giam_gia = $giam_gia;
            $order->ngay_giao_du_kien= $ngay_giao_du_kien;
            $order->ma_giam_gia_id = $ma_giam_gia_id;
            $order->save();

            $order->ma_don = 'DH'.date('Ymd').str_pad($order->id, 5, '0', STR_PAD_LEFT);
            $order->save();

            foreach ($cart->cartDetails as $item) {
                OrderDetail::create([
                    'don_hang_id' => $order->id,
                    'bien_the_id' => $item->bien_the_id,
                    'ten_san_pham' => $item->productVariation->product->ten ?? '',
                    'thuoc_tinh' => $item->productVariation->mau_sac.' / '.$item->productVariation->size_eu,
                    'hinh_anh' => $item->productVariation->hinh_anh_chinh ?? ($item->productVariation->images->first()->duong_dan ?? ''),
                    'so_luong' => $item->so_luong,
                    'don_gia' => $item->productVariation->gia_ban ?? 0,
                    'gia_goc' => $item->productVariation->gia_goc ?? 0,
                    'giam_gia' => $item->productVariation->giam_gia ?? 0,
                    'thanh_tien' => ($item->productVariation->gia_ban ?? 0) * $item->so_luong,
                    'trang_thai_danh_gia' => 0,
                ]);
                $bienThe = $item->productVariation;
                $bienThe->so_luong -= $item->so_luong;
                $bienThe->save();
            }
            $userEmail = auth()->user()->email ?? null;
            if ($userEmail) {
                Mail::to($userEmail)->send(new OrderPlacedMail($order));
            }
            $cart->cartDetails()->delete();
            $cart->delete();

            return redirect()->route('order.detail', ['id' => $order->id]);
        } else {
 
            $cartSession = session('cart', []);
            if (empty($cartSession)) {
                return redirect()->back()->with('error', 'Giỏ hàng trống!');
            }

            $tong_tien = collect($cartSession)->sum(function ($item) {
                return ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
            });

            $giam_gia = 0;
            $ma_giam_gia_id = null;
            if ($request->filled('ma_giam_gia')) {
                $discount = Discount::where('ma_code', $request->ma_giam_gia)
                    ->where('hoat_dong', 1)
                    ->where('ngay_bat_dau', '<=', now())
                    ->where('ngay_ket_thuc', '>=', now())
                    ->first();

                if ($discount) {
                    $ma_giam_gia_id = $discount->id;
                    if ($discount->loai == 'phan_tram') {
                        $giam_gia = $tong_tien * $discount->gia_tri / 100;
                    }
                    else if($discount->loai == 'tien_mat' ){
                        $giam_gia = $tong_tien-$discount->gia_tri;
                    } 
                    else
                     {
                        $giam_gia = $discount->gia_tri;
                    }
                }
            }
            
            $order = new Order;
            $order->nguoi_dung_id = null;
            $order->ten_nguoi_nhan = $request->ten_nguoi_nhan;
            $order->sdt_nguoi_nhan = $request->sdt_nguoi_nhan;
            $order->dia_chi_1 = $request->dia_chi_1;
            $order->ghi_chu = $request->ghi_chu;
            $order->trang_thai = 'cho_xu_ly';
            // $order->trang_thai_tt = 'chua_tt';
            $order->phuong_thuc_tt = $request->phuong_thuc_tt;
            $order->thoi_gian_dat = now();
            $order->tong_tien = $tong_tien - $giam_gia + $phi_ship;
            $order->giam_gia = $giam_gia;
            $order->phi_ship = $phi_ship;
            $order->ngay_giao_du_kien= $ngay_giao_du_kien;
            $order->ma_giam_gia_id = $ma_giam_gia_id;
            $order->save();

            $order->ma_don = 'DH'.date('Ymd').str_pad($order->id, 5, '0', STR_PAD_LEFT);
            $order->save();

            foreach ($cartSession as $item) {
                $bienThe = ProductVariation::where('san_pham_id', $item['product_id'] ?? null)
                    ->where('mau_sac', $item['color'] ?? '')
                    ->where('size_eu', $item['size'] ?? '')
                    ->first();

                OrderDetail::create([
                    'don_hang_id' => $order->id,
                    'bien_the_id' => $bienThe->id ?? null,
                    'ten_san_pham' => $item['name'] ?? '',
                    'thuoc_tinh' => ($item['color'] ?? '') . ' / ' . ($item['size'] ?? ''),
                    'hinh_anh' => $item['image'] ?? '',
                    'so_luong' => $item['quantity'] ?? 1,
                    'don_gia' => $item['price'] ?? 0,
                    'gia_goc' => $bienThe->gia_goc ?? 0,
                    'giam_gia' => $bienThe->giam_gia ?? 0,
                    'thanh_tien' => ($item['price'] ?? 0) * ($item['quantity'] ?? 1),
                    'trang_thai_danh_gia' => 0,
                ]);
                if ($bienThe) {
                    $bienThe->so_luong -= ($item['quantity'] ?? 1);
                    $bienThe->save();
                }
            }
            session()->forget('cart');

            return redirect()->route('order.payment', ['id' => $order->id]);
        }
    }

    public function detail($id, Request $request)
    {
        $order = Order::with('orderDetails.productVariation')->findOrFail($id);

        if ($request->has('vnp_ResponseCode') && $request->input('vnp_ResponseCode') == '00') {
            // thanhcong
            $order->trang_thai = 'da_thanh_toan';
            $order->trang_thai_tt = 'da_tt';
            $order->save();
            $message = 'Thanh toán VNPay thành công!';
        } elseif ($request->has('vnp_ResponseCode')) {
            // thatba
            $order->trang_thai = 'cho_xu_ly';
            $order->trang_thai_tt = 'chua_tt';
            $order->save();
            $message = 'Thanh toán VNPay thất bại!';
        } else {
            $message = null;
        }

        return view('shoe.orderdetailview', compact('order', 'message'));
    }

    public function history()
    {
        $orders = Order::where('nguoi_dung_id', auth()->id())->orderByDesc('thoi_gian_dat')->get();

        return view('shoe.profile.orderhistory', compact('orders'));
    }

    public function payment($id)
    {
        $order = Order::findOrFail($id);

        return view('shoe.payment', compact('order'));
    }

    public function processPayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        if ($order->trang_thai_tt == 'chua_tt' && $order->trang_thai == 'cho_xu_ly') {
        $order->phuong_thuc_tt = $request->phuong_thuc_tt;
        $order->trang_thai_tt = 'da_tt'; 
        
        $order->save();

        if ($request->phuong_thuc_tt === 'vnpay') {
            $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
            $vnp_Returnurl = route('order.detail', $order->id);
            $vnp_TmnCode = 'SK9HVW4P';
            $vnp_HashSecret = 'NQ7E3K8U4UN5I5RNVNMM2XOJ4L9EQWLV';

            $vnp_TxnRef = $order->id;
            $vnp_OrderInfo = 'Thanh toán đơn hàng '.$order->id;
            $vnp_Amount = $order->tong_tien * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = request()->ip();

            $inputData = [
                'vnp_Version' => '2.1.0',
                'vnp_TmnCode' => $vnp_TmnCode,
                'vnp_Amount' => $vnp_Amount,
                'vnp_Command' => 'pay',
                'vnp_CreateDate' => date('YmdHis'),
                'vnp_CurrCode' => 'VND',
                'vnp_IpAddr' => $vnp_IpAddr,
                'vnp_Locale' => $vnp_Locale,
                'vnp_OrderInfo' => $vnp_OrderInfo,
                'vnp_OrderType' => 'other',
                'vnp_ReturnUrl' => $vnp_Returnurl,
                'vnp_TxnRef' => $vnp_TxnRef,
                'vnp_BankCode' => $vnp_BankCode,

            ];

            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&'.urlencode($key).'='.urlencode($value);
                } else {
                    $hashdata .= urlencode($key).'='.urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key).'='.urlencode($value).'&';
            }

            $vnp_Url = $vnp_Url.'?'.$query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;
            }
            $returnData = ['code' => '00', 'message' => 'success', 'data' => $vnp_Url];
            if (isset($_POST['redirect'])) {
                header('Location: '.$vnp_Url);
                exit();
            } else {
                echo json_encode($returnData);
            }

            return redirect()->away($vnp_Url);
        }

        return redirect()->route('order.detail', $order->id)->with('success', 'Đã chọn phương thức thanh toán!');
        }
    }

    public function cancel($id)
    {
        $order = Order::where('id', $id)
            ->where('nguoi_dung_id', auth()->id())
            ->where('trang_thai', 'cho_xu_ly')
            ->firstOrFail();

        $order->trang_thai = 'huy';
        $order->save();

        foreach ($order->orderDetails as $detail) {
        $bienThe = $detail->productVariation; 
        if ($bienThe) {
            $bienThe->so_luong += $detail->so_luong;
            $bienThe->save();
        }
    }

        return redirect()->route('order.detail', $order->id)->with('success', 'Đơn hàng đã được hủy thành công!');
    }
}
