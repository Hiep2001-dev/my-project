<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;

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

        // Tạo đơn hàng mới
        $order = new Order();
        $order->nguoi_dung_id = auth()->id();
        $order->ten_nguoi_nhan = $request->ten_nguoi_nhan;
        $order->sdt_nguoi_nhan = $request->sdt_nguoi_nhan;
        $order->dia_chi_1 = $request->dia_chi_1;
        $order->ghi_chu = $request->ghi_chu;
        $order->trang_thai = 'cho_xu_ly';
        $order->thoi_gian_dat = now();
        $order->tong_tien = $cart->cartDetails->sum(function($i) {
            return ($i->bienTheSanPham->gia_ban ?? 0) * $i->so_luong;
        });
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

        // Xóa giỏ hàng sau khi đặt
        $cart->cartDetails()->delete();
        $cart->delete();


    return redirect()->route('order.payment', ['id' => $order->id]);
    }

    // Hiển thị chi tiết đơn hàng
    public function detail($id)
    {
        $order = Order::with('orderDetails.productVariation')->findOrFail($id);
        return view('shoe.orderdetailview', compact('order'));
    }

    // Hiển thị lịch sử đơn hàng
    public function history()
    {
        $orders = Order::where('nguoi_dung_id', auth()->id())->orderByDesc('thoi_gian_dat')->get();
        return view('shoe.orderhistory', compact('orders'));
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
            $vnp_TmnCode = "YOUR_TEST_TMNCODE"; 
            $vnp_HashSecret = "YOUR_TEST_HASHSECRET"; 

            $vnp_TxnRef = $order->id;
            $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $order->id;
            $vnp_Amount = $order->tong_tien * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'VNPAYQR';
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
                "vnp_BankCode" => $vnp_BankCode
            );

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url .= "?" . $query;
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;

            // Chuyển hướng sang VNPay
            return redirect($vnp_Url);
        }

        // Các phương thức khác
        return redirect()->route('order.detail', $order->id)->with('success', 'Đã chọn phương thức thanh toán!');
    }
}