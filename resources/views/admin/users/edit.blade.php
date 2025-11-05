{{-- resources/views/admin/users/edit.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Sửa thông tin người dùng</h3>
</div>
<div class="page-content">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ tên</label>
            <input type="text" name="ho_ten" class="form-control" value="{{ $user->ho_ten }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required readonly>
        </div>
        <div class="mb-3">
            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control" value="{{ $user->so_dien_thoai }}">
        </div>
        <div class="mb-3">
            <label for="gioi_tinh" class="form-label">Giới tính</label>
            <select name="gioi_tinh" class="form-select">
                <option value="nam" @if($user->gioi_tinh == 'nam') selected @endif>Nam</option>
                <option value="nu" @if($user->gioi_tinh == 'nu') selected @endif>Nữ</option>
                <option value="khac" @if($user->gioi_tinh == 'khac') selected @endif>Khác</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="vai_tro" class="form-label">Vai trò</label>
            <select name="vai_tro" class="form-select">
                <option value="quan_li" @if($user->vai_tro == 'quan_li') selected @endif>Quản lý</option>
                <option value="nhan_vien" @if($user->vai_tro == 'nhan_vien') selected @endif>Nhân viên</option>
                <option value="khach_hang" @if($user->vai_tro == 'khach_hang') selected @endif>Khách hàng</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="mat_khau" class="form-label">Mật khẩu mới (nếu đổi)</label>
            <input type="password" name="mat_khau" class="form-control">
        </div>
        <div class="mb-3">
            <label for="trang_thai" class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-select">
                <option value="hoat_dong" @if($user->trang_thai == 'hoat_dong') selected @endif>Hoạt động</option>
                <option value="khoa" @if($user->trang_thai == 'khoa') selected @endif>Khóa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection