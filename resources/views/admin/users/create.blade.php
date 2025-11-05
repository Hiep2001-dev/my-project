{{-- resources/views/admin/users/create.blade.php --}}
@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Thêm người dùng mới</h3>
</div>
<div class="page-content">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ tên</label>
            <input type="text" name="ho_ten" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
            <span id="email-error" class="text-danger" style="font-size: 14px"></span>
        </div>
        <div class="mb-3">
            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control">
        </div>
        <div class="mb-3">
            <label for="gioi_tinh" class="form-label">Giới tính</label>
            <select name="gioi_tinh" class="form-select">
                <option value="nam">Nam</option>
                <option value="nu">Nữ</option>
                <option value="khac">Khác</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="vai_tro" class="form-label">Vai trò</label>
            <select name="vai_tro" class="form-select">
                <option value="quan_li">Quản lý</option>
                <option value="nhan_vien">Nhân viên</option>
                <option value="khach_hang">Khách hàng</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="mat_khau" class="form-label">Mật khẩu</label>
            <input type="password" name="mat_khau" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.querySelector('input[name="email"]');
            const emailError = document.getElementById('email-error');

            emailInput.addEventListener('input', function() {
                const email = emailInput.value.trim();
                emailError.textContent = '';
                if (email.length > 0) {
                    fetch('/check-email?email=' + encodeURIComponent(email))
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                emailError.textContent = 'Email đã tồn tại!';
                            }
                        });
                }
            });
        });
        </script>
    </form>
</div>
@endsection