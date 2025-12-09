@extends('shoe.layouts.master')
@section('title', 'Chọn phương thức thanh toán')
@section('content')

@include('shoe.layouts.header')
@include('shoe.layouts.sidebar')
<div class="container py-5">

    <h2 class="mb-4 text-primary">Chọn phương thức thanh toán</h2>
    <form action="{{ route('order.processPayment', $order->id) }}" method="POST" class="card p-4">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold mb-3">Phương thức thanh toán</label>
            <div class="d-flex gap-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="phuong_thuc_tt" id="cod" value="cod" required>
                    <label class="form-check-label" for="cod">
                        <img src="{{ asset('images/payment_cod.png') }}" alt="COD" style="height:40px;">
                        <span class="ms-2">Thanh toán khi nhận hàng (COD)</span>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="phuong_thuc_tt" id="vnpay" value="vnpay" required>
                    <label class="form-check-label" for="vnpay">
                        <img src="{{ asset('images/payment_vnpay.png') }}" alt="VNPay" style="height:40px;">
                        <span class="ms-2">Ví VNPay</span>
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Xác nhận thanh toán</button>
    </form>
</div>
@include('shoe.layouts.footer')
@endsection