@extends('admin.layouts.master')

@section('content')
<div class="container py-4">
    <h3>Sửa đơn hàng{{ $order->ma_don }}</h3>
    @if (Auth::user()->vai_tro == 'super_admin')
    
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Người nhận</label>
            <input type="text" name="ten_nguoi_nhan" class="form-control" value="{{ $order->ten_nguoi_nhan }}">
        </div>
        <div class="mb-3">
            <label class="form-label">SĐT</label>
            <input type="text" name="sdt_nguoi_nhan" class="form-control" value="{{ $order->sdt_nguoi_nhan }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" name="dia_chi_1" class="form-control" value="{{ $order->dia_chi_1 }}">
        </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-select">
                <option value="cho_xu_ly" @if($order->trang_thai=='cho_xu_ly') selected @endif>Chờ xử lý</option>
                <option value="da_thanh_toan" @if($order->trang_thai=='da_thanh_toan') selected @endif>Đã thanh toán</option>
                <option value="dong_goi" @if($order->trang_thai=='dong_goi') selected @endif>Đóng gói</option>
                <option value="dang_giao" @if($order->trang_thai=='dang_giao') selected @endif>Đang giao</option>
                <option value="hoan_thanh" @if($order->trang_thai=='hoan_thanh') selected @endif>Hoàn thành</option>
                <option value="huy" @if($order->trang_thai=='huy') selected @endif>Đã hủy</option>
            </select>
        </div>
    
        {{-- <div class="mb-3">
            <label class="form-label">Phương thức thanh toán</label>
            <select name="phuong_thuc_tt" class="form-select">
                <option value="cod" @if($order->phuong_thuc_tt=='cod') selected @endif>COD</option>
                <option value="fundiin" @if($order->phuong_thuc_tt=='vnpay') selected @endif>Fundiin</option>
                
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection