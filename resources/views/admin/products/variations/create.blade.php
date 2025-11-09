{{-- filepath: resources/views/admin/products/variations/create.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Thêm biến thể cho sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <form action="{{ route('admin.products.variations.store', $product->id) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ma_bien_the" class="form-label">Mã biến thể</label>
                        <input type="text" name="ma_bien_the" class="form-control" value="{{ old('ma_bien_the') }}">
                    </div>
                    <div class="mb-3">
                        <label for="mau_sac" class="form-label">Màu sắc</label>
                        <input type="text" name="mau_sac" class="form-control" value="{{ old('mau_sac') }}">
                    </div>
                    <div class="mb-3">
                        <label for="ma_mau" class="form-label">Mã màu</label>
                        <input type="text" name="ma_mau" class="form-control" value="{{ old('ma_mau') }}">
                    </div>
                    <div class="mb-3">
                        <label for="size_eu" class="form-label">Size (EU)</label>
                        <input type="text" name="size_eu" class="form-control" value="{{ old('size_eu') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gia_ban" class="form-label">Giá bán</label>
                        <input type="number" name="gia_ban" class="form-control" required value="{{ old('gia_ban') }}">
                    </div>
                    <div class="mb-3">
                        <label for="gia_nhap" class="form-label">Giá nhập</label>
                        <input type="number" name="gia_nhap" class="form-control" value="{{ old('gia_nhap') }}">
                    </div>
                    <div class="mb-3">
                        <label for="so_luong" class="form-label">Số lượng</label>
                        <input type="number" name="so_luong" class="form-control" value="{{ old('so_luong') }}">
                    </div>
                    <div class="mb-3">
                        <label for="trang_thai" class="form-label">Trạng thái</label>
                        <select name="trang_thai" class="form-select">
                            <option value="hien" {{ old('trang_thai') == 'hien' ? 'selected' : '' }}>Hiện</option>
                            <option value="an" {{ old('trang_thai') == 'an' ? 'selected' : '' }}>Ẩn</option>
                            <option value="ngung_kinh_doanh" {{ old('trang_thai') == 'ngung_kinh_doanh' ? 'selected' : '' }}>Ngừng KD</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{ route('admin.products.variations.index', $product->id) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
    @if(isset($variation))
        <a href="{{ route('admin.products.images.create', [$product->id, $variation->id]) }}" class="btn btn-sm btn-primary">
            <i class="bi bi-plus"></i> Thêm ảnh
        </a>
    @endif
</div>
@endsection