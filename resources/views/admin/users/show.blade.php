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

            <div class="mt-4">
                <h5>Địa chỉ nhận hàng</h5>
                @forelse($user->diaChis as $dc)
                    <div class="border rounded p-2 mb-2">
                        <p><strong>Họ tên nhận:</strong> {{ $dc->ho_ten }}</p>
                        <p><strong>SĐT:</strong> {{ $dc->so_dien_thoai }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $dc->dia_chi_1 }}{{ $dc->dia_chi_2 ? ', '.$dc->dia_chi_2 : '' }}, {{ $dc->xa_phuong }}, {{ $dc->quan_huyen }}, {{ $dc->tinh_thanh }}</p>
                        <p><strong>Loại địa chỉ:</strong> {{ $dc->loai_dia_chi }}</p>
                        <p><strong>Mã bưu điện:</strong> {{ $dc->ma_buu_dien }}</p>
                        <p><strong>Quốc gia:</strong> {{ $dc->quoc_gia }}</p>
                        <p><strong>Ghi chú:</strong> {{ $dc->ghi_chu }}</p>
                        @if($dc->mac_dinh)
                            <span class="badge bg-primary">Mặc định</span>
                        @endif
                    </div>
                @empty
                    <p class="text-muted">Người dùng chưa có địa chỉ nhận hàng.</p>
                @endforelse
            </div>

            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection