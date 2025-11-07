@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Hình ảnh sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <a href="{{ route('admin.products.images.create', [$product->id, $variation->id]) }}" class="btn btn-primary mb-2">
        <i class="bi bi-plus"></i> Thêm hình ảnh
    </a>
    <a href="{{ route('admin.products.images.index', [$product->id, $variation->id]) }}" class="btn btn-secondary mb-2">
        Quản lý ảnh
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Mặc định</th>
                <th>Biến thể</th>
                <th>Thứ tự</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td>
                    <img src="{{ asset(  $image->duong_dan) }}" alt="Ảnh" style="height:40px;">
                </td>
                <td>{{ $image->mo_ta }}</td>
                <td>
                    @if($image->mac_dinh)
                        <span class="badge bg-success">Mặc định</span>
                    @endif
                </td>
                <td>
                    {{ $image->variation->ma_bien_the ?? '-' }}
                </td>
                <td>{{ $image->thu_tu }}</td>
                <td>
                    <a href="{{ route('admin.products.images.show', [$product->id, $variation->id, $image->id]) }}" class="btn btn-sm btn-info">Xem</a>
                    <a href="{{ route('admin.products.images.edit', [$product->id, $variation->id, $image->id]) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('admin.products.images.destroy', [$product->id, $variation->id, $image->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa ảnh này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($images->isEmpty())
            <tr>
                <td colspan="7" class="text-center">Chưa có hình ảnh nào</td>
            </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-2">Quay lại sản phẩm</a>
</div>
@endsection