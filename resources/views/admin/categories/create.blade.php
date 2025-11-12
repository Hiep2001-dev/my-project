@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Thêm danh mục mới</h3>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ten" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
            <input type="text" name="ten" id="ten" class="form-control" value="{{ old('ten') }}" required>
            @error('ten')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả</label>
            <textarea name="mo_ta" id="mo_ta" class="form-control" rows="3">{{ old('mo_ta') }}</textarea>
            @error('mo_ta')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="loai" class="form-label">Loại</label>
            <select name="loai" id="loai" class="form-control" required>
                <option value="">-- Chọn loại --</option>
                <option value="gioi_tinh" {{ old('loai') == 'gioi_tinh' ? 'selected' : '' }}>Giới tính</option>
                <option value="thuong_hieu" {{ old('loai') == 'thuong_hieu' ? 'selected' : '' }}>Thương hiệu</option>
            </select>
            @error('loai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hoat_dong" class="form-label">Hoạt động</label>
            <select name="hoat_dong" id="hoat_dong" class="form-control">
                <option value="1" {{ old('hoat_dong', 1) == 1 ? 'selected' : '' }}>Có</option>
                <option value="0" {{ old('hoat_dong', 1) == 0 ? 'selected' : '' }}>Không</option>
            </select>
            @error('hoat_dong')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection