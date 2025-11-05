{{-- resources/views/admin/users/show.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Chi tiết người dùng</h3>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <p><strong>Họ tên:</strong> {{ $user->ho_ten }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $user->so_dien_thoai }}</p>
            <p><strong>Giới tính:</strong> {{ $user->gioi_tinh }}</p>
            <p><strong>Vai trò:</strong> {{ $user->vai_tro }}</p>
            <p><strong>Trạng thái:</strong> {{ $user->trang_thai }}</p>
            <p><strong>Điểm tích lũy:</strong> {{ $user->diem_tich_luy }}</p>
            <p><strong>Ngày sinh:</strong> {{ $user->ngay_sinh }}</p>
            <p><strong>Ngày tạo:</strong> {{ $user->ngay_tao }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $user->ngay_cap_nhat }}</p>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection