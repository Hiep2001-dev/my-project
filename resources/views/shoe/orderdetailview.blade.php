@extends('shoe.layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')
@include('shoe.layouts.header')
@include('shoe.layouts.sidebar')
<div class="container py-5">
    <div class="card shadow-lg rounded-4 animate__animated animate__fadeIn">
        <div class="card-header" style="background: linear-gradient(90deg,#e0f2fe 0,#bae6fd 100%); color:#2563eb;" class="rounded-top-4 d-flex justify-content-between align-items-center">
            <h2 class="mb-0"><i class="bi bi-receipt"></i> Đơn hàng {{ $order->ma_don ?? $order->id }}</h2>
            <span class="badge bg-light text-primary fs-6">{{ $order->thoi_gian_dat ?? $order->ngay_tao }}</span>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6 mb-2">
                    <div><strong>Người nhận:</strong> {{ $order->ten_nguoi_nhan }}</div>
                    <div><strong>SĐT:</strong> {{ $order->sdt_nguoi_nhan }}</div>
                    <div><strong>Địa chỉ:</strong> {{ $order->dia_chi_1 }}</div>
                </div>
                <div class="col-md-6 mb-2">
                    <div>
                        <strong>Trạng thái:</strong>
                        @switch($order->trang_thai)
                            @case('cho_xu_ly') <span class="badge bg-warning">Chờ xử lý</span> @break
                            @case('da_thanh_toan') <span class="badge bg-info">Đã thanh toán</span> @break
                            @case('dong_goi') <span class="badge bg-primary">Đóng gói</span> @break
                            @case('dang_giao') <span class="badge bg-secondary">Đang giao</span> @break
                            @case('hoan_thanh') <span class="badge bg-success">Hoàn thành</span> @break
                            @case('huy') <span class="badge bg-danger">Đã hủy</span> @break
                            @default <span class="badge bg-light">Khác</span>
                        @endswitch
                    </div>
                    <div><strong>Phương thức thanh toán:</strong> {{ $order->phuong_thuc_tt }}</div>
                </div>
            </div>
            <h5 class="mb-3 text-primary"><i class="bi bi-box-seam"></i> Sản phẩm trong đơn hàng</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Ảnh</th>
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
                            <td>
                                @if($item->hinh_anh)
                                    <img src="{{ asset($item->hinh_anh) }}" alt="" style="width:56px;height:56px;object-fit:cover;" class="rounded-3 border">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="" style="width:56px;height:56px;object-fit:cover;" class="rounded-3 border">
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $item->ten_san_pham }}</td>
                            <td>{{ $item->thuoc_tinh }}</td>
                            <td class="text-primary">{{ number_format($item->don_gia) }}₫</td>
                            <td>{{ $item->so_luong }}</td>
                            <td class="fw-bold text-success">{{ number_format($item->thanh_tien) }}₫</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end fs-5 mt-3">
                <strong>Tổng tiền: </strong>
                <span class="text-success">{{ number_format($order->tong_tien) }}₫</span>
            </div>
        </div>
        <div class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 bg-white rounded-bottom-4">
            <a href="{{ route('shoe.product') }}" class="btn btn-outline-primary px-4 fw-bold">
                <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
            </a>
        </div>
    </div>
</div>
@include('shoe.layouts.footer')
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
.card {
    border-radius: 1.5rem;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
}
.card-header, .card-footer {
    border-radius: 1.5rem;
}
.table th, .table td {
    vertical-align: middle !important;
}
.table-hover tbody tr:hover {
    background: #f1f5f9;
}
.btn-primary, .btn-outline-primary {
    font-weight: 600;
    letter-spacing: 0.5px;
}
</style>
@endsection