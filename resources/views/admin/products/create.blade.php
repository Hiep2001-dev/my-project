{{-- filepath: resources/views/admin/products/create.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Thêm sản phẩm mới</h3>
</div>
<div class="page-content">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ma_sku" class="form-label">Mã SKU</label>
                            <input type="text" name="ma_sku" class="form-control" value="{{ old('ma_sku') }}">
                        </div>
                        <div class="form-group">
                            <label for="ten">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" name="ten" id="ten" class="form-control" required value="{{ old('ten') }}">
                        </div>
                        <div class="form-group">
                            <label for="duong_dan">Đường dẫn (slug)</label>
                            <input type="text" name="duong_dan" id="duong_dan" class="form-control" readonly value="{{ old('duong_dan') }}">
                        </div>
                        <div class="mb-3">
                            <label for="thuong_hieu_id" class="form-label">Thương hiệu</label>
                            <select name="thuong_hieu_id" class="form-select">
                                <option value="">-- Chọn thương hiệu --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('thuong_hieu_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                            <select name="gioi_tinh" class="form-select">
                                <option value="">-- Chọn giới tính --</option>
                                <option value="nam" {{ old('gioi_tinh') == 'nam' ? 'selected' : '' }}>Nam</option>
                                <option value="nu" {{ old('gioi_tinh') == 'nu' ? 'selected' : '' }}>Nữ</option>
                                <option value="unisex" {{ old('gioi_tinh') == 'unisex' ? 'selected' : '' }}>Unisex</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="thue" class="form-label">Thuế (%)</label>
                            <input type="number" step="0.01" name="thue" class="form-control" value="{{ old('thue', 10) }}">
                        </div>
                        <div class="mb-3">
                            <label for="noi_bat" class="form-label">Nổi bật</label>
                            <select name="noi_bat" class="form-select">
                                <option value="0">Không</option>
                                <option value="1" {{ old('noi_bat') == '1' ? 'selected' : '' }}>Có</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hoat_dong" class="form-label">Trạng thái</label>
                            <select name="hoat_dong" class="form-select">
                                <option value="1" {{ old('hoat_dong', '1') == '1' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ old('hoat_dong') == '0' ? 'selected' : '' }}>Ngừng bán</option>
                            </select>
                        </div>
            
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mo_ta" class="form-label">Mô tả</label>
                    <textarea name="mo_ta" class="form-control" rows="4">{{ old('mo_ta') }}</textarea>
                </div>
            </div>
        </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </form>
    
</div>
<script>
function slugify(str) {
    str = str.toLowerCase().trim();
    str = str.replace(/[\s\-]+/g, '-');
    str = str.replace(/[^\w\-]+/g, '');
    str = str.replace(/\-\-+/g, '-');
    return str;
}

document.getElementById('ten').addEventListener('input', function() {
    document.getElementById('duong_dan').value = slugify(this.value);
});
</script>
@endsection