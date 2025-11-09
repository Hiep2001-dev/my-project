@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <h3>FootStore</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Sản phẩm</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Người dùng</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Đơn hàng</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Saved Pos</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chart Section -->
            <div class="card">
                <div class="card-header">
                    <h4>Danh sách đơn hàng</h4>
                </div>
                <div class="card-body">
                    <canvas id="profileVisit"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
    <!-- List Admin -->
    <div class="card">
        <div class="card-header">
            <h4>List Admin</h4>
        </div>
        <div class="card-content pb-4">
            @foreach($admins as $admin)
            <div class="recent-message d-flex px-4 py-3">
                <div class="avatar avatar-lg">
                    <img src="{{ asset($admin->avatar ?? 'assets/images/faces/1.jpg') }}">
                </div>
                <div class="name ms-4">
                    <h5 class="mb-1">{{ $admin->ho_ten }}</h5>
                    <h6 class="text-muted mb-0">{{ $admin->email }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- List Nhân viên -->
    <div class="card">
        <div class="card-header">
            <h4>List Nhân viên</h4>
        </div>
        <div class="card-content pb-4">
            @foreach($nhanviens as $nv)
            <div class="recent-message d-flex px-4 py-3">
                <div class="avatar avatar-lg">
                    <img src="{{ asset($nv->avatar ?? 'assets/images/faces/2.jpg') }}">
                </div>
                <div class="name ms-4">
                    <h5 class="mb-1">{{ $nv->ho_ten }}</h5>
                    <h6 class="text-muted mb-0">{{ $nv->email }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    </section>
</div>
@endsection