{{-- resources/views/admin/categories/index.blade.php --}}
@extends('admin.layouts.master')
@section('content')
<div class="page-heading"><h3>Quản lý danh mục</h3></div>
<div class="page-content">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-2">Thêm danh mục</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Loại</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->ten }}</td>
                <td>{{ $cat->loai }}</td>
                <td>{{ $cat->mo_ta }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection