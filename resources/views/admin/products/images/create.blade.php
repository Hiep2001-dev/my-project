@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Thêm hình ảnh cho sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <form action="{{ route('admin.products.images.store', [$product->id, $variation->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image_file" class="form-label">Chọn ảnh</label>
                        <input type="file" name="image_file" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="mo_ta" class="form-label">Mô tả</label>
                        <input type="text" name="mo_ta" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mac_dinh" class="form-label">Mặc định</label>
                        <select name="mac_dinh" class="form-select">
                            <option value="0">Không</option>
                            <option value="1">Có</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm ảnh</button>
            <a href="{{ route('admin.products.images.index', [$product->id, $variation->id]) }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
    
</div>
@endsection