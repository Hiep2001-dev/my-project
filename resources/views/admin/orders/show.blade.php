{{-- filepath: c:\Users\admin\my-project\resources\views\admin\orders\show.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="container py-4">
    <h3>Chi tiết đơn hàng {{ $order->ma_don }}</h3>
    <table class="table table-bordered mb-4">
        <tr><th>Người nhận</th><td>{{ $order->ten_nguoi_nhan }}</td></tr>
        <tr><th>SĐT</th><td>{{ $order->sdt_nguoi_nhan }}</td></tr>
        <tr><th>Địa chỉ</th><td>{{ $order->dia_chi_1 }}</td></tr>
        <tr><th>Trạng thái</th><td>{{ $order->trang_thai }}</td></tr>
        <tr><th>Phương thức thanh toán</th><td>{{ $order->phuong_thuc_tt }}</td></tr>
        <tr><th>Ngày tạo</th><td>{{ $order->ngay_tao }}</td></tr>
        <tr><th>Tổng tiền</th><td>{{ number_format($order->tong_tien, 0, ',', '.') }}₫</td></tr>
    </table>

    <h5>Danh sách sản phẩm</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Thuộc tính</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Giá gốc</th>
                <th>Giảm giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->ten_san_pham }}</td>
                <td>{{ $item->thuoc_tinh }}</td>
                <td>
                    @if($item->hinh_anh)
                        <img src="{{ asset($item->hinh_anh) }}" alt="" style="width:48px;height:48px;object-fit:cover;">
                    @endif
                </td>
                <td>{{ $item->so_luong }}</td>
                <td>{{ number_format($item->don_gia, 0, ',', '.') }}₫</td>
                <td>{{ number_format($item->gia_goc, 0, ',', '.') }}₫</td>
                <td>{{ number_format($item->giam_gia, 0, ',', '.') }}₫</td>
                <td class="fw-bold text-primary">{{ number_format($item->thanh_tien, 0, ',', '.') }}₫</td>
            </tr>
            @endforeach
            @if($order->orderDetails->isEmpty())
            <tr>
                <td colspan="9" class="text-center">Không có sản phẩm</td>
            </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
</div>
@endsection