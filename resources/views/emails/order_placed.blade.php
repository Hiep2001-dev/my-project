<h2>Xin chào {{ $order->ten_nguoi_nhan }},</h2>
<p>Bạn đã đặt hàng thành công tại Footstore!</p>
<p>Mã đơn hàng: <strong>{{ $order->ma_don }}</strong></p>
<p>Tổng tiền: <strong>{{ number_format($order->tong_tien) }}₫</strong></p>
<p>Cảm ơn bạn đã mua sắm!</p>