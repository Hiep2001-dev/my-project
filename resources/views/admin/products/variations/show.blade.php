{{-- filepath: resources/views/admin/products/variations/show.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Chi tiết biến thể của sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <p><strong>Mã biến thể:</strong> {{ $variation->ma_bien_the }}</p>
            <p><strong>Màu sắc:</strong> {{ $variation->mau_sac }}</p>
            <p><strong>Mã màu:</strong> {{ $variation->ma_mau }}</p>
            <p><strong>Size (cm):</strong> {{ $variation->size_cm }}</p>
            <p><strong>Size (EU):</strong> {{ $variation->size_eu }}</p>
            <p><strong>Giá bán:</strong> {{ number_format($variation->gia_ban, 0, ',', '.') }}₫</p>
            <p><strong>Giá nhập:</strong> {{ number_format($variation->gia_nhap, 0, ',', '.') }}₫</p>
            <p><strong>Số lượng:</strong> {{ $variation->so_luong }}</p>
            <p><strong>Trạng thái:</strong>
                @if($variation->trang_thai == 'hien')
                    <span class="badge bg-success">Hiện</span>
                @elseif($variation->trang_thai == 'an')
                    <span class="badge bg-secondary">Ẩn</span>
                @else
                    <span class="badge bg-danger">Ngừng KD</span>
                @endif
            </p>
            <p><strong>Ngày tạo:</strong> {{ $variation->ngay_tao }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $variation->ngay_cap_nhat }}</p>
            <a href="{{ route('admin.products.variations.edit', [$product->id, $variation->id]) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('admin.products.variations.index', $product->id) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection