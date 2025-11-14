@extends('admin.layouts.master')
@section('content')
<div class="container mt-4">
    <h3>Danh sách danh mục</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>
    
    {{-- Hiển thị danh mục dạng phân cấp (cây) --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Cấu trúc danh mục phân cấp</strong>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($categories->where('cha_id', null) as $cat)
                    <li class="mb-2">
                        <strong>{{ $cat->ten }}</strong>
                        @if($cat->children->count() > 0)
                            <ul class="ms-4">
                                @foreach($cat->children as $child)
                                    <li>{{ $child->ten }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Bảng danh sách chi tiết --}}
    <div class="card">
        <div class="card-header">
            <strong>Danh sách chi tiết</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Danh mục cha</th>
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
                        <td>{{ $cat->parent ? $cat->parent->ten : 'Danh mục gốc' }}</td>
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
    </div>
</div>
@endsection