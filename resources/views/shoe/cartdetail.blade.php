{{-- filepath: c:\Users\admin\my-project\resources\views\shoe\orderdetail.blade.php --}}
@extends('shoe.layouts.master')

@section('title', 'Giỏ hàng của bạn')

@section('content')
@include('shoe.layouts.header')
@include('shoe.layouts.sidebar')

<div class="spacer" style="height:32px;"></div>
<div class="cart-page">
    
    <div class="cart-container">
        <div class="cart-header">
            <h1>Giỏ hàng</h1>
            <p>{{ $cart && $cart->cartDetails->count() ? $cart->cartDetails->count() . ' sản phẩm' : '0 sản phẩm' }}</p>
        </div>

        @if($cart && $cart->cartDetails->count())
            <div class="cart-table">
                <div class="cart-row cart-row--head">
                    <div class="cart-col cart-col--product">Sản phẩm</div>
                    <div class="cart-col cart-col--variant">Phân loại</div>
                    <div class="cart-col cart-col--price">Đơn giá</div>
                    <div class="cart-col cart-col--qty">Số lượng</div>
                    <div class="cart-col cart-col--total">Thành tiền</div>
                    <div class="cart-col cart-col--action"></div>
                </div>

                @foreach($cart->cartDetails as $item)
                <div class="cart-row">
                    <div class="cart-col cart-col--product">
                        <img src="{{ asset($item->bienTheSanPham->hinh_anh_chinh ?? $item->bienTheSanPham->images->first()->duong_dan ?? 'images/no-image.png') }}" alt="" class="cart-thumb">
                        <div>
                            <p class="cart-name">{{ $item->bienTheSanPham->product->ten ?? 'Sản phẩm' }}</p>
                            <p class="cart-sku">SKU: {{ $item->bienTheSanPham->sku ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="cart-col cart-col--variant">
                        <span class="badge badge--color">{{ $item->bienTheSanPham->mau_sac ?? '—' }}</span>
                        <span class="badge badge--size">{{ $item->bienTheSanPham->size_eu ?? '—' }}</span>
                    </div>
                    <div class="cart-col cart-col--price">
                        {{ number_format($item->bienTheSanPham->gia_ban) }}₫
                    </div>
                    <div class="cart-col cart-col--qty">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="qty-box" style="display:flex;" onsubmit="return false;">
                            @csrf
                            @method('PUT')
                            <button type="button" class="qty-box__btn" onclick="changeQty(this, -1)">−</button>
                            <span style="width:50px;text-align:center;display:inline-block;font-weight:600;line-height:38px;" class="qty-show">{{ $item->so_luong }}</span>
                            <input type="hidden" name="quantity" value="{{ $item->so_luong }}">
                            <button type="button" class="qty-box__btn" onclick="changeQty(this, 1)">+</button>
                            <button type="submit" style="display:none"></button>
                        </form>
                    </div>
                    <div class="cart-col cart-col--total">
                        {{ number_format(($item->bienTheSanPham->gia_ban ?? 0) * $item->so_luong) }}₫
                    </div>
                    <div class="cart-col cart-col--action">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-remove" type="submit">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="cart-footer">
                <div class="cart-total">
                    <div class="cart-total__line">
                        <span>Tạm tính</span>
                        <strong>{{ number_format($cart->cartDetails->sum(fn($i) => ($i->bienTheSanPham->gia_ban ?? 0) * $i->so_luong)) }}₫</strong>
                    </div>
                    <p class="cart-total__desc">Phí vận chuyển sẽ được tính ở bước thanh toán.</p>
                    <a href="{{ route('cart.checkout') }}" class="btn-checkout">Tiến hành thanh toán</a>
                </div>
            </div>
        @else
            <div class="cart-empty">
                <img src="{{ asset('images/cart-empty.svg') }}" alt="">
                <p>Giỏ hàng của bạn đang trống.</p>
                <a href="{{ route('shoe.product') }}" class="btn-outline">Tiếp tục mua sắm</a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
.cart-page {background:#f5f5f5;padding:40px 0;font-family:'Montserrat',sans-serif;}
.cart-container {max-width:1100px;margin:0 auto;background:#fff;border-radius:16px;padding:32px;box-shadow:0 20px 60px rgba(15,23,42,.08);}
.cart-header {display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;}
.cart-header h1 {font-size:26px;font-weight:700;margin:0;}
.cart-header p {color:#64748b;margin:0;}
.cart-table {border:1px solid #e2e8f0;border-radius:12px;overflow:hidden;}
.cart-row {display:flex;align-items:center;padding:18px 24px;border-bottom:1px solid #e2e8f0;}
.cart-row:last-child {border-bottom:none;}
.cart-row--head {background:#f8fafc;font-weight:600;text-transform:uppercase;font-size:12px;color:#475569;}
.cart-col {display:flex;align-items:center;}
.cart-col--product {flex:2;gap:16px;}
.cart-col--variant {flex:1;gap:8px;}
.cart-col--price,.cart-col--qty,.cart-col--total,.cart-col--action {flex:.8;}
.cart-col--action {justify-content:flex-end;}
.cart-thumb {width:70px;height:70px;object-fit:cover;border-radius:12px;border:1px solid #e2e8f0;}
.cart-name {font-size:15px;font-weight:600;margin:0;}
.cart-sku {font-size:12px;color:#94a3b8;margin:4px 0 0;}
.badge {display:inline-block;padding:6px 12px;border-radius:999px;font-size:12px;font-weight:600;}
.badge--color {background:#e0f2fe;color:#0284c7;}
.badge--size {background:#fef3c7;color:#d97706;}
.qty-box {display:flex;border:1px solid #cbd5f5;border-radius:999px;overflow:hidden;width:110px;}
.qty-box input {width:50px;text-align:center;border:none;font-weight:600;}
.qty-box__btn {width:30px;border:none;background:#f1f5f9;font-weight:700;cursor:pointer;}
.btn-remove {border:none;background:none;color:#ef4444;font-size:18px;}
.cart-footer {display:flex;gap:24px;margin-top:28px;}
.cart-note textarea {width:100%;min-height:120px;border:1px solid #e2e8f0;border-radius:12px;padding:16px;font-size:14px;}
.cart-total {width:320px;border:1px solid #e2e8f0;border-radius:16px;padding:24px;background:#f8fafc;}
.cart-total__line {display:flex;justify-content:space-between;font-size:16px;margin-bottom:12px;}
.cart-total__desc {font-size:13px;color:#94a3b8;margin-bottom:16px;}
.btn-checkout {display:block;text-align:center;background:#2563eb;color:#fff;padding:14px 0;border-radius:999px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;}
.cart-empty {text-align:center;padding:60px 0;}
.cart-empty img {width:200px;margin-bottom:16px;}
.btn-outline {display:inline-block;border:1px solid #2563eb;color:#2563eb;padding:12px 28px;border-radius:999px;font-weight:600;}
@media(max-width:768px){.cart-row {flex-wrap:wrap;gap:16px;}.cart-col {flex:100%;}.cart-footer {flex-direction:column;}.cart-total {width:100%;}}
</style>
<script>
function changeQty(btn, delta) {
    var form = btn.closest('form');
    var input = form.querySelector('input[name="quantity"]');
    var span = form.querySelector('.qty-show');
    var qty = parseInt(input.value) || 1;
    qty += delta;
    if (qty < 1) qty = 1;
    input.value = qty;

    // Gửi AJAX
    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: '_method=PUT&quantity=' + qty
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            span.textContent = qty;
            // Nếu muốn cập nhật tổng tiền, bạn có thể cập nhật thêm ở đây
            if(data.total){
                document.querySelector('.cart-total strong').textContent = data.total + '₫';
            }
            // Nếu muốn cập nhật thành tiền từng dòng:
            if(data.item_total){
                form.closest('.cart-row').querySelector('.cart-col--total').textContent = data.item_total + '₫';
            }
        }
    });
}
</script>
@endsection