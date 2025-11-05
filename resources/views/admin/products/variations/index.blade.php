{{-- filepath: resources/views/admin/products/variations/index.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Biến thể của sản phẩm: {{ $product->ten }}</h3>
</div>
<div class="page-content">
    <a href="{{ route('admin.products.variations.create', $product->id) }}" class="btn btn-primary mb-2">
        <i class="bi bi-plus"></i> Thêm biến thể
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã biến thể</th>
                <th>Màu sắc</th>
                <th>Size (cm)</th>
                <th>Size (EU)</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($variations as $variation)
            <tr>
                <td>{{ $variation->id }}</td>
                <td>{{ $variation->ma_bien_the }}</td>
                <td>{{ $variation->mau_sac }}</td>
                <td>{{ $variation->size_cm }}</td>
                <td>{{ $variation->size_eu }}</td>
                <td>{{ number_format($variation->gia_ban, 0, ',', '.') }}₫</td>
                <td>{{ $variation->so_luong }}</td>
                <td>
                    @if($variation->trang_thai == 'hien')
                        <span class="badge bg-success">Hiện</span>
                    @elseif($variation->trang_thai == 'an')
                        <span class="badge bg-secondary">Ẩn</span>
                    @else
                        <span class="badge bg-danger">Ngừng KD</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.variations.show', [$product->id, $variation->id]) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('admin.products.variations.edit', [$product->id, $variation->id]) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('admin.products.variations.destroy', [$product->id, $variation->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa biến thể này?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($variations->isEmpty())
            <tr>
                <td colspan="9" class="text-center">Không có biến thể nào</td>
            </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
</div>
@endsection