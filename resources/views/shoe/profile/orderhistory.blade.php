{{-- filepath: c:\Users\admin\my-project\resources\views\shoe\orderhistory.blade.php --}}
@extends('shoe.layouts.master')

@section('title', 'Lịch sử đơn hàng')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary"><i class="bi bi-clock-history"></i> Lịch sử đơn hàng của bạn</h2>
    <div class="card shadow rounded-4">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->ma_don }}</td>
                        <td>{{ $order->thoi_gian_dat ?? $order->ngay_tao }}</td>
                        <td>
                            @switch($order->trang_thai)
                                @case('cho_xu_ly') <span class="badge bg-warning">Chờ xử lý</span> @break
                                @case('da_thanh_toan') <span class="badge bg-info">Đã thanh toán</span> @break
                                @case('dong_goi') <span class="badge bg-primary">Đóng gói</span> @break
                                @case('dang_giao') <span class="badge bg-secondary">Đang giao</span> @break
                                @case('hoan_thanh') <span class="badge bg-success">Hoàn thành</span> @break
                                @case('huy') <span class="badge bg-danger">Đã hủy</span> @break
                                @default <span class="badge bg-light">Khác</span>
                            @endswitch
                        </td>
                        <td class="fw-bold text-success">{{ number_format($order->tong_tien) }}₫</td>
                        <td>
                            <a href="{{ route('order.detail', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                Xem chi tiết
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Bạn chưa có đơn hàng nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection