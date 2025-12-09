@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Quản lý đơn hàng</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <form action="{{ route('admin.orders.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Nhập mã đơn hoặc tên người nhận..." value="{{ request('keyword') }}">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
            
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Danh sách đơn hàng</span>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-striped" id="orderTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã đơn</th>
                            <th>Người nhận</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>PT Thanh toán</th>
                            <th>Ngày tạo</th>
                            <th>Tổng tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->ma_don }}</td>
                            <td>{{ $order->ten_nguoi_nhan }}</td>
                            <td>{{ $order->sdt_nguoi_nhan }}</td>
                            <td>{{ $order->dia_chi_1 }}</td>
                            <td>
                                @switch($order->trang_thai)
                                    @case('cho_xu_ly') <span class="badge bg-warning">Chờ xử lý</span> @break
                                    @case('da_thanh_toan') <span class="badge bg-info">Đã thanh toán</span> @break
                                    @case('dong_goi') <span class="badge bg-primary">Đóng gói</span> @break
                                    @case('dang_giao') <span class="badge bg-secondary">Đang giao</span> @break
                                    @case('hoan_thanh') <span class="badge bg-success">Hoàn thành</span> @break
                                    @case('huy') <span class="badge bg-danger">Đã hủy</span> @break
                                    @case('hoan_tien') <span class="badge bg-dark">Hoàn tiền</span> @break
                                    @default <span class="badge bg-light">Khác</span>
                                @endswitch
                            </td>
                            <td>
                                @switch($order->phuong_thuc_tt)
                                    @case('cod') COD @break
                                    @case('vnpay') VNPay @break
                                    @default {{ $order->phuong_thuc_tt }}
                                @endswitch
                            </td>
                            <td>{{ $order->ngay_tao }}</td>
                            <td class="fw-bold text-primary">{{ number_format($order->tong_tien, 0, ',', '.') }}₫</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info" title="Xem chi tiết">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if(in_array(Auth::user()->vai_tro ?? '', ['super_admin', 'quan_li']))
                                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning" title="Sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa đơn hàng này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @if($orders->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            {{ $orders->links('pagination::bootstrap-5') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection