@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Sửa mã giảm giá</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <span>Chỉnh sửa thông tin mã giảm giá</span>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.discount.update', $discount->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Mã giảm giá</label>
                        <input type="text" name="ma_code" class="form-control" value="{{ old('ma_code', $discount->ma_code) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại</label>
                        <select name="loai" class="form-select" required>
                            <option value="phan_tram" {{ $discount->loai == 'phan_tram' ? 'selected' : '' }}>Phần trăm</option>
                            <option value="tien_mat" {{ $discount->loai == 'tien_mat' ? 'selected' : '' }}>Tiền mặt</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá trị</label>
                        <input type="number" name="gia_tri" class="form-control" value="{{ old('gia_tri', $discount->gia_tri) }}" required min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày bắt đầu</label>
                        <input type="date" name="ngay_bat_dau" class="form-control" value="{{ old('ngay_bat_dau', $discount->ngay_bat_dau) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày kết thúc</label>
                        <input type="date" name="ngay_ket_thuc" class="form-control" value="{{ old('ngay_ket_thuc', $discount->ngay_ket_thuc) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hoạt động</label>
                        <select name="hoat_dong" class="form-select">
                            <option value="1" {{ $discount->hoat_dong ? 'selected' : '' }}>Có</option>
                            <option value="0" {{ !$discount->hoat_dong ? 'selected' : '' }}>Không</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('admin.discount.index') }}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection