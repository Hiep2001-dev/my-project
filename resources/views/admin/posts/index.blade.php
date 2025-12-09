{{-- filepath: resources/views/admin/posts/index.blade.php --}}
@extends('admin.layouts.master')
@section('content')
<div class="page-heading">
    <h3>Quản lý bài viết</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.posts.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Nhập tiêu đề bài viết để tìm kiếm..."
                            value="{{ request('keyword') }}">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
                <div class="d-flex gap-2 mb-3">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Thêm bài viết mới</a>
                    <a href="{{ route('admin.post_categories.index') }}" class="btn btn-secondary">Quản lý chuyên mục bài viết</a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
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
                                <td>
                                    @if($post->trang_thai == 'xuat_ban')
                                        <span class="badge bg-success">Xuất bản</span>
                                    @elseif($post->trang_thai == 'nhap')
                                        <span class="badge bg-warning">Nháp</span>
                                    @else
                                        <span class="badge bg-secondary">Lưu trữ</span>
                                    @endif
                                </td>
                                <td>{{ $post->ngay_xuat_ban }}</td>
                                <td>{{ $post->ngay_tao }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info btn-sm">Xem</a>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Xóa bài viết này?')">Xóa</button>
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
        </div>
    </section>
</div>
@endsection