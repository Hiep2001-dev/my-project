<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\Discount;

class ShoeOrderController extends Controller
{
    // Hiển thị trang xác nhận thông tin và tiến hành đặt hàng
    public function checkout()
    {
        $cart = Cart::with('cartDetails.bienTheSanPham.product')
            ->where('nguoi_dung_id', auth()->id())
            ->first();

        return view('shoe.checkout', compact('cart'));
    }

    // Xử lý đặt hàng từ giỏ hàng
    public function placeOrder(Request $request)
    {
        $cart = Cart::with('cartDetails.bienTheSanPham.product')
            ->where('nguoi_dung_id', auth()->id())
            ->firstOrFail();

        // Tính tổng tiền ban đầu
        $tong_tien = $cart->cartDetails->sum(function($i) {
            return ($i->bienTheSanPham->gia_ban ?? 0) * $i->so_luong;
        });

        // Xử lý mã giảm giá
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
                    $giam_gia = min($tong_tien * $discount->gia_tri / 100, $discount->giam_toi_da);
                } else {
                    $giam_gia = min($discount->gia_tri, $discount->giam_toi_da);
                }
            }
        }

        // Tạo đơn hàng mới
        $order = new Order();
        $order->nguoi_dung_id = auth()->id();
        $order->ten_nguoi_nhan = $request->ten_nguoi_nhan;
        $order->sdt_nguoi_nhan = $request->sdt_nguoi_nhan;
        $order->dia_chi_1 = $request->dia_chi_1;
        $order->ghi_chu = $request->ghi_chu;
        $order->trang_thai = 'cho_xu_ly';
        $order->thoi_gian_dat = now();
        $order->tong_tien = $tong_tien - $giam_gia;
        $order->giam_gia = $giam_gia;
        $order->ma_giam_gia_id = $ma_giam_gia_id;
        $order->save();

        $order->ma_don = 'DH' . date('Ymd') . str_pad($order->id, 5, '0', STR_PAD_LEFT);
        $order->save();

        // Thêm chi tiết đơn hàng
        foreach($cart->cartDetails as $item){
            OrderDetail::create([
                'don_hang_id'   => $order->id,
                'bien_the_id'   => $item->bien_the_id,
                'ten_san_pham'  => $item->bienTheSanPham->product->ten ?? '',
                'thuoc_tinh'    => $item->bienTheSanPham->mau_sac . ' / ' . $item->bienTheSanPham->size_eu,
                'hinh_anh'      => $item->bienTheSanPham->hinh_anh_chinh ?? ($item->bienTheSanPham->images->first()->duong_dan ?? ''),
                'so_luong'      => $item->so_luong,
                'don_gia'       => $item->bienTheSanPham->gia_ban ?? 0,
                'gia_goc'       => $item->bienTheSanPham->gia_goc ?? 0,
                'giam_gia'      => $item->bienTheSanPham->giam_gia ?? 0,
                'thanh_tien'    => ($item->bienTheSanPham->gia_ban ?? 0) * $item->so_luong,
                'trang_thai_danh_gia' => 0,
            ]);
        }

        $cart->cartDetails()->delete();
        $cart->delete();

        return redirect()->route('order.payment', ['id' => $order->id]);
    }


    public function detail($id, Request $request)
    {
        $order = Order::with('orderDetails.productVariation')->findOrFail($id);

        if ($request->has('vnp_ResponseCode') && $request->input('vnp_ResponseCode') == '00') {
            // Thành công
            $order->trang_thai = 'da_thanh_toan';
            $order->trang_thai_tt = 'da_tt';
            $order->save();
            $message = 'Thanh toán VNPay thành công!';
        } elseif ($request->has('vnp_ResponseCode')) {
            // Thất bại
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
        $order->phuong_thuc_tt = $request->phuong_thuc_tt;
        $order->save();

        if ($request->phuong_thuc_tt === 'vnpay') {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('order.detail', $order->id);
            $vnp_TmnCode = "SK9HVW4P"; 
            $vnp_HashSecret = "NQ7E3K8U4UN5I5RNVNMM2XOJ4L9EQWLV"; 

            $vnp_TxnRef = $order->id;
            $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $order->id;
            $vnp_Amount = $order->tong_tien * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = request()->ip();

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_BankCode" => $vnp_BankCode,

                
            );

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
             return redirect()->away($vnp_Url);
            }

        // Các phương thức khác
        return redirect()->route('order.detail', $order->id)->with('success', 'Đã chọn phương thức thanh toán!');
    }
}