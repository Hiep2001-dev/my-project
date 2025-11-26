@extends('shoe.layouts.master')
@section('content')
<div class="container py-4">
    <h4 class="mb-3">Chỉnh sửa địa chỉ</h4>
    <form action="{{ route('user.address.update', $address->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Địa chỉ cụ thể</label>
            <input type="text" name="dia_chi_1" class="form-control" value="{{ old('dia_chi_1', $address->dia_chi_1) }}" required>
        </div>
        <div class="mb-3">
            <label>Xã/Phường</label>
            <input type="text" name="xa_phuong" class="form-control" value="{{ old('xa_phuong', $address->xa_phuong) }}" required>
        </div>
        <div class="mb-3">
            <label>Quận/Huyện</label>
            <input type="text" name="quan_huyen" class="form-control" value="{{ old('quan_huyen', $address->quan_huyen) }}" required>
        </div>
        <div class="mb-3">
            <label>Tỉnh/Thành</label>
            <input type="text" name="tinh_thanh" class="form-control" value="{{ old('tinh_thanh', $address->tinh_thanh) }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="mac_dinh" value="1" class="form-check-input" id="macDinhCheck" {{ $address->mac_dinh ? 'checked' : '' }}>
            <label class="form-check-label" for="macDinhCheck">Đặt làm mặc định</label>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật địa chỉ</button>
        <a href="{{ route('shoe.profile') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection