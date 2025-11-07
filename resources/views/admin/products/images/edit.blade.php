@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Sửa hình ảnh cho biến thể sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <form action="{{ route('admin.products.images.update', [$product->id, $variation->id, $image->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image_file" class="form-label">Chọn ảnh mới (nếu muốn thay đổi)</label>
                        <input type="file" name="image_file" class="form-control">
                        @if($image->duong_dan)
                            <div class="mt-2">
                                <img src="{{ asset($image->duong_dan) }}" alt="Ảnh hiện tại" style="max-width:120px;">
                                <p class="text-muted">Ảnh hiện tại</p>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="mo_ta" class="form-label">Mô tả</label>
                        <input type="text" name="mo_ta" class="form-control" value="{{ $image->mo_ta }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mac_dinh" class="form-label">Mặc định</label>
                        <select name="mac_dinh" class="form-select">
                            <option value="0" {{ $image->mac_dinh == 0 ? 'selected' : '' }}>Không</option>
                            <option value="1" {{ $image->mac_dinh == 1 ? 'selected' : '' }}>Có</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="thu_tu" class="form-label">Thứ tự</label>
                        <input type="number" name="thu_tu" class="form-control" value="{{ $image->thu_tu }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.products.images.index', [$product->id, $variation->id]) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection