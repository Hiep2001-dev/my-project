@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Chi tiết hình ảnh sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <p><strong>Ảnh:</strong><br>
                <img src="{{ asset($image->duong_dan) }}" alt="Ảnh" style="max-width:200px;">
            </p>
            <p><strong>Mô tả:</strong> {{ $image->mo_ta }}</p>
            <p><strong>Mặc định:</strong> {{ $image->mac_dinh ? 'Có' : 'Không' }}</p>
            <p><strong>Biến thể:</strong> {{ $image->variation->ma_bien_the ?? '-' }}</p>
            <p><strong>Thứ tự:</strong> {{ $image->thu_tu }}</p>
            <p><strong>Ngày tạo:</strong> {{ $image->ngay_tao }}</p>
            <a href="{{ route('admin.products.images.edit', [$product->id, $variation->id, $image->id]) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('admin.products.images.index', [$product->id, $variation->id]) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection