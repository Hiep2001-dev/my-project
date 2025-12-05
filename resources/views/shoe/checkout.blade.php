@extends('shoe.layouts.master')

@section('title', 'Tiến hành thanh toán')

@section('content')
@include('shoe.layouts.header')
@include('shoe.layouts.sidebar')

<div class="spacer" style="height:32px;"></div>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <form action="{{ route('order.placeOrder') }}" method="POST" class="card shadow-lg rounded-4 p-4 bg-light">
                @csrf
                <h2 class="mb-4 text-primary"><i class="bi bi-truck"></i> Thông tin nhận hàng</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tên người nhận</label>
                        <input type="text" name="ten_nguoi_nhan" class="form-control" required value="{{ Auth::user()->ho_ten ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="sdt_nguoi_nhan" class="form-control" required value="{{ Auth::user()->so_dien_thoai ?? '' }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Địa chỉ nhận hàng</label>
                        <input type="text" name="dia_chi_1" class="form-control mb-2" required value="{{ Auth::user()->diaChis->where('mac_dinh', 1)->first()->dia_chi_1 ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Xã/Phường</label>
                        <input type="text" name="xa_phuong" class="form-control" required value="{{ Auth::user()->diaChis->where('mac_dinh', 1)->first()->xa_phuong ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Quận/Huyện</label>
                        <input type="text" name="quan_huyen" class="form-control" required value="{{ Auth::user()->diaChis->where('mac_dinh', 1)->first()->quan_huyen ?? '' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tỉnh/Thành</label>
                        <input type="text" name="tinh_thanh" class="form-control" required value="{{ Auth::user()->diaChis->where('mac_dinh', 1)->first()->tinh_thanh ?? '' }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Ghi chú đơn hàng</label>
                        <textarea name="ghi_chu" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Mã giảm giá</label>
                        <input type="text" name="ma_giam_gia" class="form-control" placeholder="Nhập mã giảm giá nếu có">
                    </div>
                </div>
                <h4 class="mt-4 mb-3 text-success"><i class="bi bi-bag-check"></i> Tóm tắt đơn hàng</h4>
                @if($cart && $cart->cartDetails->count())
                <ul class="list-group mb-3">
                    @foreach($cart->cartDetails as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset($item->bienTheSanPham->hinh_anh_chinh ?? $item->bienTheSanPham->images->first()->duong_dan ?? 'images/no-image.png') }}" alt="" class="rounded-3 border" style="width:56px;height:56px;object-fit:cover;">
                            <div>
                                <div class="fw-semibold">{{ $item->bienTheSanPham->product->ten ?? 'Sản phẩm' }}</div>
                                <span class="badge bg-info text-dark me-1">{{ $item->bienTheSanPham->mau_sac }}</span>
                                <span class="badge bg-warning text-dark">{{ $item->bienTheSanPham->size_eu }}</span>
                                <span class="ms-2 text-muted">x{{ $item->so_luong }}</span>
                            </div>
                        </div>
                        <span class="fw-bold text-primary">{{ number_format($item->bienTheSanPham->gia_ban * $item->so_luong) }}₫</span>
                    </li>
                    @endforeach
                </ul>
                <div class="mb-2 fs-5 text-end">
                    <strong>Tổng tiền: </strong>
                    <span class="text-success">{{ number_format($cart->cartDetails->sum(fn($i) => ($i->bienTheSanPham->gia_ban ?? 0) * $i->so_luong)) }}₫</span>
                </div>
                <button type="submit" class="btn btn-gradient-primary w-100 mt-3 fw-bold">
                    <i class="bi bi-credit-card"></i> Tiếp tục
                </button>
                @else
                    <div class="alert alert-info">Giỏ hàng của bạn đang trống.</div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<style>
.btn-gradient-primary {
    background: linear-gradient(90deg,#2563eb 0,#1e40af 100%);
    color: #fff;
    border: none;
}
.btn-gradient-primary:hover {
    background: linear-gradient(90deg,#1e40af 0,#2563eb 100%);
    color: #fff;
}
.card {
    border-radius: 1.5rem;
}
</style>
@endsection