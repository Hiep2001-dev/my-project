{{-- filepath: resources/views/admin/products/edit.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Sửa sản phẩm</h3>
</div>
<div class="page-content">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ma_sku" class="form-label">Mã SKU</label>
                            <input type="text" name="ma_sku" class="form-control" value="{{ $product->ma_sku }}">
                        </div>
                        <div class="mb-3">
                            <label for="ten" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" name="ten" class="form-control" required value="{{ $product->ten }}">
                        </div>
                        <div class="mb-3">
                            <label for="duong_dan" class="form-label">Đường dẫn</label>
                            <input type="text" name="duong_dan" class="form-control" value="{{ $product->duong_dan }}">
                        </div>
                        <div class="mb-3">
                            <label for="thuong_hieu_id" class="form-label">Thương hiệu</label>
                            <select name="thuong_hieu_id" class="form-select">
                                <option value="">-- Chọn thương hiệu --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->thuong_hieu_id == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                            <select name="gioi_tinh" class="form-select">
                                <option value="">-- Chọn giới tính --</option>
                                <option value="nam" {{ $product->gioi_tinh == 'nam' ? 'selected' : '' }}>Nam</option>
                                <option value="nu" {{ $product->gioi_tinh == 'nu' ? 'selected' : '' }}>Nữ</option>
                                <option value="unisex" {{ $product->gioi_tinh == 'unisex' ? 'selected' : '' }}>Unisex</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="loai_san" class="form-label">Loại sân</label>
                            <select name="loai_san" class="form-select">
                                <option value="">-- Chọn loại sân --</option>
                                <option value="TF" {{ $product->loai_san == 'TF' ? 'selected' : '' }}>TF</option>
                                <option value="AG" {{ $product->loai_san == 'AG' ? 'selected' : '' }}>AG</option>
                                <option value="FG" {{ $product->loai_san == 'FG' ? 'selected' : '' }}>FG</option>
                                <option value="IC" {{ $product->loai_san == 'IC' ? 'selected' : '' }}>IC</option>
                                <option value="NA" {{ $product->loai_san == 'NA' ? 'selected' : '' }}>NA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="thue" class="form-label">Thuế (%)</label>
                            <input type="number" step="0.01" name="thue" class="form-control" value="{{ $product->thue }}">
                        </div>
                        <div class="mb-3">
                            <label for="noi_bat" class="form-label">Nổi bật</label>
                            <select name="noi_bat" class="form-select">
                                <option value="0" {{ $product->noi_bat == 0 ? 'selected' : '' }}>Không</option>
                                <option value="1" {{ $product->noi_bat == 1 ? 'selected' : '' }}>Có</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hoat_dong" class="form-label">Trạng thái</label>
                            <select name="hoat_dong" class="form-select">
                                <option value="1" {{ $product->hoat_dong == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ $product->hoat_dong == 0 ? 'selected' : '' }}>Ngừng bán</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label">Video (URL)</label>
                            <input type="text" name="video" class="form-control" value="{{ $product->video }}">
                        </div>
                        <div class="mb-3">
                            <label for="thong_tin_ky_thuat" class="form-label">Thông tin kỹ thuật (JSON)</label>
                            <textarea name="thong_tin_ky_thuat" class="form-control" rows="3">{{ $product->thong_tin_ky_thuat }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mo_ta" class="form-label">Mô tả</label>
                    <textarea name="mo_ta" class="form-control" rows="4">{{ $product->mo_ta }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="huong_dan_bao_quan" class="form-label">Hướng dẫn bảo quản</label>
                    <textarea name="huong_dan_bao_quan" class="form-control" rows="3">{{ $product->huong_dan_bao_quan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </form>
</div>
@endsection