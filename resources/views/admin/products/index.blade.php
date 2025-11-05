{{-- filepath: resources/views/admin/products/index.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Quản lý sản phẩm</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Danh sách sản phẩm</span>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Thêm sản phẩm
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="productTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>SKU</th>
                            <th>Thương hiệu</th>
                            <th>Giới tính</th>
                            <th>Loại sân</th>
                            <th>Giá</th>
                            <th>Hoạt động</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if(isset($product->hinh_anh))
                                    <img src="{{ asset($product->hinh_anh) }}" alt="hình ảnh" width="32" height="32" class="rounded me-1">
                                @endif
                                {{ $product->ten }}
                            </td>
                            <td>{{ $product->ma_sku }}</td>
                            <td>{{ $product->brand->ten ?? '' }}</td>
                            <td>
                                @if($product->gioi_tinh == 'nam') Nam
                                @elseif($product->gioi_tinh == 'nu') Nữ
                                @else Unisex
                                @endif
                            </td>
                            <td>{{ $product->loai_san }}</td>
                            <td>{{ number_format($product->gia ?? 0, 0, ',', '.') }}₫</td>
                            <td>
                                @if($product->hoat_dong)
                                    <span class="badge bg-success">Hoạt động</span>
                                @else
                                    <span class="badge bg-danger">Ngừng bán</span>
                                @endif
                            </td>
                            <td>{{ $product->ngay_tao }}</td>
                            <td>{{ $product->ngay_cap_nhat }}</td>
                            <td>
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning" title="Sửa"><i class="bi bi-pencil"></i></a>
                                <a href="{{ route('admin.products.variations.index', $product->id) }}" class="btn btn-sm btn-secondary" title="Biến thể">
                                    <i class="bi bi-list-ul"></i> Biến thể
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($products->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection