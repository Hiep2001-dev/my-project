@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Thêm thương hiệu mới</h3>
    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="ten" class="form-label">Tên thương hiệu <span class="text-danger">*</span></label>
            <input type="text" name="ten" id="ten" class="form-control" value="{{ old('ten') }}" required>
            @error('ten')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
            @error('logo')
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
            <label for="hoat_dong" class="form-label">Hoạt động</label>
            <select name="hoat_dong" id="hoat_dong" class="form-control">
                <option value="1" {{ old('hoat_dong', $brand->hoat_dong ?? 1) == 1 ? 'selected' : '' }}>Có</option>
                <option value="0" {{ old('hoat_dong', $brand->hoat_dong ?? 1) == 0 ? 'selected' : '' }}>Không</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="danh_muc_id" class="form-label">Danh mục</label>
            <select name="danh_muc_id" id="danh_muc_id" class="form-control">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('danh_muc_id', $brand->danh_muc_id ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->ten }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection