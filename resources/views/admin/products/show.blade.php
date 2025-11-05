{{-- filepath: resources/views/admin/products/show.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Chi tiết sản phẩm</h3>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Mã SKU:</strong> {{ $product->ma_sku }}</p>
                    <p><strong>Tên sản phẩm:</strong> {{ $product->ten }}</p>
                    <p><strong>Đường dẫn:</strong> {{ $product->duong_dan }}</p>
                    <p><strong>Thương hiệu:</strong> {{ $product->brand->ten ?? 'Chưa có' }}</p>
                    <p><strong>Giới tính:</strong> 
                        @if($product->gioi_tinh == 'nam') Nam
                        @elseif($product->gioi_tinh == 'nu') Nữ
                        @else Unisex
                        @endif
                    </p>
                    <p><strong>Loại sân:</strong> {{ $product->loai_san }}</p>
                    <p><strong>Thuế:</strong> {{ $product->thue }}%</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Nổi bật:</strong> 
                        @if($product->noi_bat)
                            <span class="badge bg-success">Có</span>
                        @else
                            <span class="badge bg-secondary">Không</span>
                        @endif
                    </p>
                    <p><strong>Lượt xem:</strong> {{ $product->luot_xem }}</p>
                    <p><strong>Lượt bán:</strong> {{ $product->luot_ban }}</p>
                    <p><strong>Điểm trung bình:</strong> {{ $product->diem_trung_binh }}/5</p>
                    <p><strong>Số lượng đánh giá:</strong> {{ $product->so_luong_danh_gia }}</p>
                    <p><strong>Trạng thái:</strong> 
                        @if($product->hoat_dong)
                            <span class="badge bg-success">Hoạt động</span>
                        @else
                            <span class="badge bg-danger">Ngừng bán</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="mb-3">
                <p><strong>Mô tả:</strong></p>
                <p>{{ $product->mo_ta }}</p>
            </div>
            <div class="mb-3">
                <p><strong>Video:</strong> {{ $product->video ?? 'Chưa có' }}</p>
            </div>
            <div class="mb-3">
                <p><strong>Thông tin kỹ thuật:</strong></p>
                <pre>{{ $product->thong_tin_ky_thuat }}</pre>
            </div>
            <div class="mb-3">
                <p><strong>Hướng dẫn bảo quản:</strong></p>
                <p>{{ $product->huong_dan_bao_quan }}</p>
            </div>
            <div class="mb-3">
                <p><strong>Ngày tạo:</strong> {{ $product->ngay_tao }}</p>
                <p><strong>Ngày cập nhật:</strong> {{ $product->ngay_cap_nhat }}</p>
            </div>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection