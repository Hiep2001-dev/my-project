
@extends('shoe.layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Chi tiết đơn hàng #{{ $order->id }}</h2>
    <div class="mb-3">
        <strong>Người nhận:</strong> {{ $order->ten_nguoi_nhan }} <br>
        <strong>SĐT:</strong> {{ $order->sdt_nguoi_nhan }} <br>
        <strong>Địa chỉ:</strong> {{ $order->dia_chi_1 }}
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Phân loại</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $item)
            <tr>
                <td>{{ $item->ten_san_pham }}</td>
                <td>{{ $item->thuoc_tinh }}</td>
                <td>{{ number_format($item->don_gia) }}₫</td>
                <td>{{ $item->so_luong }}</td>
                <td>{{ number_format($item->thanh_tien) }}₫</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-2 fs-5">
        <strong>Tổng tiền: </strong>
        {{ number_format($order->tong_tien) }}₫
    </div>
</div>
@endsection