@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
@endsection

@section('content')
<div class="page-heading mb-4">
    <h3>FootStore Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row g-4">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body px-3 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Sản phẩm</h6>
                                    <h3 class="font-extrabold mb-0 text-primary">{{ number_format($productCount) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body px-3 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Người dùng</h6>
                                    <h3 class="font-extrabold mb-0 text-info">{{ number_format($userCount) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body px-3 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Đơn hàng</h6>
                                    <h3 class="font-extrabold mb-0 text-success">{{ number_format($orderCount) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body px-3 py-4-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Bài viết</h6>
                                    <h3 class="font-extrabold mb-0 text-danger">{{ number_format($postCount) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Thống kê doanh thu</h4>
                </div>
                <div class="card-body">
                    tổng doanh thu: <strong class="text-success">{{ number_format($total) }} VND</strong>
                </div>
            </div>
            @if(Auth::user()->vai_tro=='super_admin')
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Thống kê lợi nhuận</h4>
                </div>
                <div class="card-body">
                    tổng lợi nhuận: <strong class="text-success">{{ number_format($profits) }} VND</strong>
                </div>
            </div>
            @endif`
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Sản phẩm sắp hết hàng</h4>
                </div>
                <div class="card-body">
                    @if($warnings->isEmpty())
                        <p>Tất cả sản phẩm đều đủ hàng.</p>
                    @else
                        <ul>
                            @foreach($warnings as $warning)
                                <li>{{ $warning->product->ten }} - Biến thể: {{ $warning->mau_sac }} - Số lượng còn lại: {{ $warning->so_luong }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header">
                    <h4>Thông tin tài khoản</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3 align-items-center">
                        <div class="avatar avatar-lg">
                            <img src="{{ asset(Auth::user()->avatar ?? 'assets/images/faces/1.jpg') }}" class="rounded-circle" width="64" height="64">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">{{ Auth::user()->ho_ten }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                            <span class="badge bg-info mt-2">
                                @if(Auth::user()->vai_tro == 'super_admin') Super Admin
                                @elseif(Auth::user()->vai_tro == 'quan_li') Quản lý
                                @elseif(Auth::user()->vai_tro == 'nhan_vien') Nhân viên
                                @else Khách
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection