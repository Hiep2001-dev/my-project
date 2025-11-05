@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Quản lý người dùng</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Danh sách người dùng</span>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Thêm người dùng
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="userTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Giới tính</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <th>Điểm tích lũy</th>
                            <th>Ngày sinh</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if($user->avatar)
                                    <img src="{{ asset($user->avatar) }}" alt="avatar" width="32" height="32" class="rounded-circle me-1">
                                @endif
                                {{ $user->ho_ten }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->so_dien_thoai }}</td>
                            <td>
                                @if($user->gioi_tinh == 'nam') Nam
                                @elseif($user->gioi_tinh == 'nu') Nữ
                                @else Khác
                                @endif
                            </td>
                            <td>
                                @if($user->vai_tro == 'quan_li') Quản lý
                                @elseif($user->vai_tro == 'nhan_vien') Nhân viên
                                @else Khách hàng
                                @endif
                            </td>
                            <td>
                                @if($user->trang_thai == 'hoat_dong')
                                    <span class="badge bg-success">Hoạt động</span>
                                @elseif($user->trang_thai == 'khoa')
                                    <span class="badge bg-danger">Khóa</span>
                                @else
                                    <span class="badge bg-warning text-dark">Chờ xác thực</span>
                                @endif
                            </td>
                            <td>{{ $user->diem_tich_luy }}</td>
                            <td>{{ $user->ngay_sinh }}</td>
                            <td>{{ $user->ngay_tao }}</td>
                            <td>{{ $user->ngay_cap_nhat }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Sửa"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($users->isEmpty())
                        <tr>
                            <td colspan="12" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection