{{-- filepath: resources/views/admin/posts/categories/edit.blade.php --}}
@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Cập nhật chuyên mục bài viết</h3>
    <form action="{{ route('admin.post_categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ten" class="form-label">Tên chuyên mục <span class="text-danger">*</span></label>
            <input type="text" name="ten" id="ten" class="form-control" value="{{ old('ten', $category->ten) }}" required>
            @error('ten')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô tả</label>
            <textarea name="mo_ta" id="mo_ta" class="form-control" rows="3">{{ old('mo_ta', $category->mo_ta) }}</textarea>
            @error('mo_ta')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cha_id" class="form-label">Chuyên mục cha</label>
            <select name="cha_id" id="cha_id" class="form-control">
                <option value="">-- Chuyên mục gốc --</option>
                @foreach($allCategories->where('id', '!=', $category->id) as $cat)
                    <option value="{{ $cat->id }}" {{ old('cha_id', $category->cha_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->ten }}
                    </option>
                @endforeach
            </select>
            @error('cha_id')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thu_tu" class="form-label">Thứ tự</label>
            <input type="number" name="thu_tu" id="thu_tu" class="form-control" value="{{ old('thu_tu', $category->thu_tu) }}">
            @error('thu_tu')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hoat_dong" class="form-label">Trạng thái</label>
            <select name="hoat_dong" id="hoat_dong" class="form-control">
                <option value="1" {{ old('hoat_dong', $category->hoat_dong) == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ old('hoat_dong', $category->hoat_dong) == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
            @error('hoat_dong')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.post_categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection