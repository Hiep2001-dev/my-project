{{-- resources/views/admin/brands/index.blade.php --}}
@extends('admin.layouts.master')
@section('content')
<div class="page-heading"><h3>Quản lý thương hiệu</h3></div>
<div class="page-content">
    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary mb-2">Thêm thương hiệu</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Logo</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->ten }}</td>
                <td><img src="{{ $brand->logo }}" alt="logo" style="height:40px"></td>
                <td>{{ $brand->mo_ta }}</td>
                <td>
                    <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display:inline;">
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