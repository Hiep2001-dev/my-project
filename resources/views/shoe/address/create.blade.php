{{-- filepath: c:\Users\admin\my-project\resources\views\shoe\address\create.blade.php --}}
@extends('shoe.layouts.master')

@section('title', 'Thêm địa chỉ mới')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm địa chỉ nhận hàng mới</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.address.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="ho_ten">Họ và tên người nhận <span class="text-danger">*</span></label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control @error('ho_ten') is-invalid @enderror" value="{{ old('ho_ten', Auth::user()->ho_ten) }}" required>
                            @error('ho_ten')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="so_dien_thoai">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" value="{{ old('so_dien_thoai', Auth::user()->so_dien_thoai) }}" required>
                            @error('so_dien_thoai')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="loai_dia_chi">Loại địa chỉ</label>
                            <select name="loai_dia_chi" id="loai_dia_chi" class="form-control">
                                <option value="nha_rieng" {{ old('loai_dia_chi') == 'nha_rieng' ? 'selected' : '' }}>Nhà riêng</option>
                                <option value="van_phong" {{ old('loai_dia_chi') == 'van_phong' ? 'selected' : '' }}>Văn phòng</option>
                                <option value="khac" {{ old('loai_dia_chi') == 'khac' ? 'selected' : '' }}>Khác</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dia_chi_1">Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" name="dia_chi_1" id="dia_chi_1" class="form-control @error('dia_chi_1') is-invalid @enderror" value="{{ old('dia_chi_1') }}" required>
                            @error('dia_chi_1')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="dia_chi_2">Địa chỉ bổ sung</label>
                            <input type="text" name="dia_chi_2" id="dia_chi_2" class="form-control" value="{{ old('dia_chi_2') }}">
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label for="xa_phuong">Xã/Phường <span class="text-danger">*</span></label>
                                <input type="text" name="xa_phuong" id="xa_phuong" class="form-control @error('xa_phuong') is-invalid @enderror" value="{{ old('xa_phuong') }}" required>
                                @error('xa_phuong')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="quan_huyen">Quận/Huyện <span class="text-danger">*</span></label>
                                <input type="text" name="quan_huyen" id="quan_huyen" class="form-control @error('quan_huyen') is-invalid @enderror" value="{{ old('quan_huyen') }}" required>
                                @error('quan_huyen')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tinh_thanh">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                <input type="text" name="tinh_thanh" id="tinh_thanh" class="form-control @error('tinh_thanh') is-invalid @enderror" value="{{ old('tinh_thanh') }}" required>
                                @error('tinh_thanh')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="quoc_gia">Quốc gia</label>
                                <input type="text" name="quoc_gia" id="quoc_gia" class="form-control" value="{{ old('quoc_gia', 'VN') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ma_buu_dien">Mã bưu điện</label>
                                <input type="text" name="ma_buu_dien" id="ma_buu_dien" class="form-control" value="{{ old('ma_buu_dien') }}">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="ghi_chu">Ghi chú</label>
                            <textarea name="ghi_chu" id="ghi_chu" class="form-control" rows="2">{{ old('ghi_chu') }}</textarea>
                        </div>
                        <div class="form-group mb-3 form-check">
                            <input type="checkbox" name="mac_dinh" id="mac_dinh" class="form-check-input" value="1" {{ old('mac_dinh') ? 'checked' : '' }}>
                            <label class="form-check-label" for="mac_dinh">Đặt làm địa chỉ mặc định</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Lưu địa chỉ
                        </button>
                        <a href="{{ route('shoe.profile') }}" class="btn btn-secondary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection