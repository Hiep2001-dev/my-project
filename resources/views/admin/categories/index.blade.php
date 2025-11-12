@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Danh sách danh mục</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Loại</th>
                <th>Hoạt động</th>
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
                    @if($cat->loai == 'gioi_tinh')
                        Giới tính
                    @elseif($cat->loai == 'thuong_hieu')
                        Thương hiệu
                    @else
                        <span class="text-muted">Không xác định</span>
                    @endif
                </td>
                <td>
                    @if($cat->hoat_dong)
                        <span class="badge bg-success">Hoạt động</span>
                    @else
                        <span class="badge bg-danger">Ngừng hoạt động</span>
                    @endif
                </td>
                <td>{{ $cat->ngay_tao }}</td>
                <td>{{ $cat->ngay_cap_nhat }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($categories->isEmpty())
            <tr>
                <td colspan="8" class="text-center">Không có dữ liệu</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection