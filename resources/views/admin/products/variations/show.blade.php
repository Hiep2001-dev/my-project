{{-- filepath: resources/views/admin/products/variations/show.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Chi tiết biến thể của sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <div class="card mb-4">
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
            <form action="{{ route('admin.products.variations.destroy', [$product->id, $variation->id]) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Xóa biến thể này?')">Xóa</button>
            </form>
            <a href="{{ route('admin.products.variations.index', $product->id) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Hình ảnh của biến thể</strong>
            <a href="{{ route('admin.products.images.create', [$product->id, $variation->id]) }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus"></i> Thêm ảnh
            </a>
        </div>
        <div class="card-body">
            @if($variation->images->count())
                <div class="row">
                    @foreach($variation->images as $img)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset($img->duong_dan) }}" class="card-img-top" alt="Ảnh" style="height:120px;object-fit:cover;">
                            <div class="card-body p-2">
                                <p class="mb-1">{{ $img->mo_ta }}</p>
                                <a href="{{ route('admin.products.images.edit', [$product->id, $variation->id, $img->id]) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.products.images.destroy', [$product->id, $variation->id, $img->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa ảnh này?')">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p>Chưa có hình ảnh nào cho biến thể này.</p>
            @endif
        </div>
    </div>
</div>
@endsection