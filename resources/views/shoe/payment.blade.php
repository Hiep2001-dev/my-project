
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
            <label class="form-label fw-bold">Phương thức thanh toán</label>
            <select name="phuong_thuc_tt" class="form-select" required>
                <option value="">-- Chọn --</option>
                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                <option value="vnpay">Ví VNPay</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Xác nhận thanh toán</button>
        
    </form>
   
</div>
 @include('shoe.layouts.footer')
@endsection