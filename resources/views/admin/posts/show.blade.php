{{-- filepath: resources/views/admin/posts/show.blade.php --}}
@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Chi tiết bài viết</h3>
    <div class="card mb-3">
        <div class="card-header">
            <strong>{{ $post->tieu_de }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Tóm tắt:</strong> {{ $post->tom_tat }}</p>
            <p><strong>Nội dung:</strong></p>
            <div class="border p-2 mb-2" style="background:#f9f9f9;">{!! nl2br(e($post->noi_dung)) !!}</div>
            <p><strong>Hình ảnh đại diện:</strong>
                @if($post->hinh_anh_dai_dien)
                    <br>
                    <img src="{{ asset('storage/' . $post->hinh_anh_dai_dien) }}" alt="Hình đại diện" style="max-width:200px;">
                @else
                    Không có
                @endif
            </p>
            <p><strong>Chuyên mục:</strong> {{ $post->chuyenMuc ? $post->chuyenMuc->ten : '-' }}</p>
            <p><strong>Tác giả:</strong> {{ $post->tacGia ? $post->tacGia->ten : '-' }}</p>
            <p><strong>Trạng thái:</strong> {{ ucfirst($post->trang_thai) }}</p>
            <p><strong>Ngày xuất bản:</strong> {{ $post->ngay_xuat_ban }}</p>
            <p><strong>Ngày tạo:</strong> {{ $post->ngay_tao }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $post->ngay_cap_nhat }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
        </div>
    </div>
</div>
@endsection