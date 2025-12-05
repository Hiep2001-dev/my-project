{{-- filepath: c:\Users\admin\my-project\resources\views\admin\banners\index.blade.php --}}
@extends('admin.layouts.master')

@section('title', 'Quản lý Banner')

@section('content')
<div class="page-heading">
    <h3>Quản lý Banner</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Danh sách Banner</span>
                <a href="{{ route('admin.banners.create') }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Thêm mới
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Vị trí</th>
                            <th>Thứ tự</th>
                            <th>Hoạt động</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>{{ $banner->tieu_de }}</td>
                            <td>
                                <img src="{{ asset($banner->hinh_anh) }}" alt="banner" style="height:40px;max-width:120px;">
                            </td>
                            <td>
                                @switch($banner->vi_tri)
                                    @case('home_hero') Trang chủ Hero @break
                                    @case('home_section') Trang chủ Section @break
                                    @case('category_top') Danh mục @break
                                    @case('khac') Khác @break
                                @endswitch
                            </td>
                            <td>{{ $banner->thu_tu }}</td>
                            <td>
                                @if($banner->hoat_dong)
                                    <span class="badge bg-success">Hiển thị</span>
                                @else
                                    <span class="badge bg-secondary">Ẩn</span>
                                @endif
                            </td>
                            <td>{{ $banner->ngay_bat_dau }}</td>
                            <td>{{ $banner->ngay_ket_thuc }}</td>
                            <td>
                                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Xóa banner này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($banners->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $banners->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection