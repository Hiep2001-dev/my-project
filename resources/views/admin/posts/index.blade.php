{{-- filepath: resources/views/admin/posts/index.blade.php --}}
@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Quản lý bài viết</h3>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Thêm bài viết mới</a>
    <a href="{{ route('admin.post_categories.index') }}" class="btn btn-secondary mb-3">Quản lý chuyên mục bài viết</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Chuyên mục</th>
                <th>Tác giả</th>
                <th>Trạng thái</th>
                <th>Ngày xuất bản</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->tieu_de }}</td>
                <td>{{ $post->chuyenMuc ? $post->chuyenMuc->ten : '-' }}</td>
                <td>{{ $post->tacGia ? $post->tacGia->ten : '-' }}</td>
                <td>{{ ucfirst($post->trang_thai) }}</td>
                <td>{{ $post->ngay_xuat_ban }}</td>
                <td>{{ $post->ngay_tao }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info btn-sm">Xem</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa bài viết này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($posts->isEmpty())
            <tr>
                <td colspan="8" class="text-center">Không có bài viết nào</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection