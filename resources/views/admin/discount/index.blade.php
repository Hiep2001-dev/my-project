@extends('admin.layouts.master')

@section('content')
<div class="page-heading">
    <h3>Quản lý mã giảm giá</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Danh sách mã giảm giá</span>
                <a href="{{ route('admin.discount.create') }}" class="btn btn-success">Thêm mã giảm giá</a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Loại</th>
                            <th>Giá trị</th>
                            <th>Bắt đầu</th>
                            <th>Kết thúc</th>
                            <th>Hoạt động</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discounts as $item)
                        <tr>
                            <td>{{ $item->ma_code }}</td>
                            <td>{{ $item->loai == 'phan_tram' ? 'Phần trăm' : 'Tiền mặt' }}</td>
                            <td>{{ $item->gia_tri }}</td>
                            <td>{{ $item->ngay_bat_dau }}</td>
                            <td>{{ $item->ngay_ket_thuc }}</td>
                            <td>{{ $item->hoat_dong ? 'Có' : 'Không' }}</td>
                            <td>
                                <a href="{{ route('admin.discount.edit', $item->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                                <form action="{{ route('admin.discount.delete', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($discounts->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            {{ $discounts->links('pagination::bootstrap-5') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection