@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Quản lý Chuyên mục bài viết</h3>
    <a href="{{ route('admin.post_categories.create') }}" class="btn btn-primary mb-3">Thêm chuyên mục mới</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên chuyên mục</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->ten }}</td>
                <td>{{ $cat->mo_ta }}</td>
                <td>
                    @if($cat->hoat_dong)
                        <span class="badge bg-success">Hoạt động</span>
                    @else
                        <span class="badge bg-danger">Ẩn</span>
                    @endif
                </td>
                <td>{{ $cat->ngay_tao }}</td>
                <td>{{ $cat->ngay_cap_nhat }}</td>
                <td>
                    <a href="{{ route('admin.post_categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.post_categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa chuyên mục này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($categories->isEmpty())
            <tr>
                <td colspan="7" class="text-center">Không có chuyên mục nào</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection