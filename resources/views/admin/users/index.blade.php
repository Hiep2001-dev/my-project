@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Quản lý người dùng</h3>
</div>
<div class="page-content">
    <section class="section">
        
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.users.index') }}" class="row g-2">
                    <div class="col-auto">
                        <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm theo email." value="{{ request('keyword') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-4">
             @if(in_array(Auth::user()->vai_tro, ['super_admin']))
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Danh sách quản lý & nhân viên</span>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Thêm người dùng
                </a>
            </div>
            @endif
            <div class="card-body">
                <table class="table table-striped" id="staffTable">
                 @if(in_array(Auth::user()->vai_tro, ['super_admin', 'quan_li']))
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Giới tính</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users->whereIn('vai_tro', ['nhan_vien']) as $user)
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
                                {{  $user->vai_tro }}
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
                            <td>{{ $user->ngay_tao }}</td>
                            <td>
                                @php
                                    $isCurrentManager = Auth::user()->vai_tro == 'quan_li';
                                    $isTargetManager = $user->vai_tro == 'quan_li';
                                @endphp

                                @if(!($isCurrentManager && $isTargetManager))
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info" title="Xem"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Sửa"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">Không thao tác</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @if($users->whereIn('vai_tro', ['quan_li', 'nhan_vien'])->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Danh sách khách hàng</span>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="customerTable">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Giới tính</th>
                            <th>Trạng thái</th>
                            <th>Điểm tích lũy</th>
                            <th>Ngày sinh</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users->where('vai_tro', 'khach_hang') as $user)
                        <tr>
                            
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
                            @if(in_array(Auth::user()->vai_tro, ['super_admin', 'quan_li']))
                            <td>
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-info" title="Xem"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning" title="Sửa"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                        <i class="bi bi-trash"></i>
                                    </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @if($users->where('vai_tro', 'khach_hang')->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection