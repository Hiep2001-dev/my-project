@extends('admin.layouts.master')

@section('title', 'Thêm Banner')

@section('content')
<div class="container py-4">
    <h4>Thêm Banner mới</h4>
    <form action="{{ route('admin.banners.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="tieu_de" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="mo_ta" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Hình ảnh (đường dẫn)</label>
            <input type="text" name="hinh_anh" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="text" name="link" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Vị trí</label>
            <select name="vi_tri" class="form-select" required>
                <option value="home_hero">Trang chủ Hero</option>
                <option value="home_section">Trang chủ Section</option>
                <option value="category_top">Danh mục</option>
                <option value="khac">Khác</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Thứ tự</label>
            <input type="number" name="thu_tu" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày bắt đầu</label>
            <input type="datetime-local" name="ngay_bat_dau" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày kết thúc</label>
            <input type="datetime-local" name="ngay_ket_thuc" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Hoạt động</label>
            <select name="hoat_dong" class="form-select">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection