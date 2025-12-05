@extends('admin.layouts.master')

@section('title', 'Sửa Banner')

@section('content')
<div class="container py-4">
    <h4>Sửa Banner</h4>
    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="tieu_de" class="form-control" value="{{ old('tieu_de', $banner->tieu_de) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="mo_ta" class="form-control">{{ old('mo_ta', $banner->mo_ta) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Hình ảnh (đường dẫn)</label>
            <input type="text" name="hinh_anh" class="form-control" required value="{{ old('hinh_anh', $banner->hinh_anh) }}">
            @if($banner->hinh_anh)
                <img src="{{ asset($banner->hinh_anh) }}" alt="banner" style="height:60px;max-width:180px;margin-top:8px;">
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="text" name="link" class="form-control" value="{{ old('link', $banner->link) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Vị trí</label>
            <select name="vi_tri" class="form-select" required>
                <option value="home_hero" @if($banner->vi_tri=='home_hero') selected @endif>Trang chủ Hero</option>
                <option value="home_section" @if($banner->vi_tri=='home_section') selected @endif>Trang chủ Section</option>
                <option value="category_top" @if($banner->vi_tri=='category_top') selected @endif>Danh mục</option>
                <option value="khac" @if($banner->vi_tri=='khac') selected @endif>Khác</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Thứ tự</label>
            <input type="number" name="thu_tu" class="form-control" value="{{ old('thu_tu', $banner->thu_tu) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày bắt đầu</label>
            <input type="datetime-local" name="ngay_bat_dau" class="form-control"
                value="{{ old('ngay_bat_dau', $banner->ngay_bat_dau ? date('Y-m-d\TH:i', strtotime($banner->ngay_bat_dau)) : '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày kết thúc</label>
            <input type="datetime-local" name="ngay_ket_thuc" class="form-control"
                value="{{ old('ngay_ket_thuc', $banner->ngay_ket_thuc ? date('Y-m-d\TH:i', strtotime($banner->ngay_ket_thuc)) : '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Hoạt động</label>
            <select name="hoat_dong" class="form-select">
                <option value="1" @if($banner->hoat_dong) selected @endif>Hiển thị</option>
                <option value="0" @if(!$banner->hoat_dong) selected @endif>Ẩn</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection