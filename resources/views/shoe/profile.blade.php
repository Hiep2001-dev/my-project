@extends('shoe.layouts.master')

@section('title', 'Thông tin cá nhân')

@section('content')
    @include('shoe.layouts.header')
    @include('shoe.layouts.sidebar')

    <main>
        <div class="breadcrumb-shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5">
                        <ol class="breadcrumb breadcrumb-arrows">
                            <li>
                                <a href="{{ url('shoe/index') }}">
                                    <span>Trang chủ</span>
                                </a>
                            </li>
                            <li class="active">
                                <span>Thông tin cá nhân</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <!-- Sidebar Menu -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="fas fa-user-circle" style="font-size: 80px; color: #007bff;"></i>
                                <h5 class="mt-2">{{ Auth::user()->ho_ten }}</h5>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                            </div>
                            <hr>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="fas fa-user"></i> Thông tin cá nhân
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#orders" data-toggle="tab">
                                        <i class="fas fa-box"></i> Đơn hàng của tôi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#password" data-toggle="tab">
                                        <i class="fas fa-lock"></i> Đổi mật khẩu
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('shoe.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link btn btn-link text-danger" style="text-align: left; width: 100%;">
                                            <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Tab Thông tin cá nhân -->
                        <div class="tab-pane fade show active" id="profile">
                            <div class="card">
                                <div class="card-header">
                                    <h5><i class="fas fa-user"></i> Thông tin cá nhân</h5>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <form action="{{ route('shoe.profile.update') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Họ và tên <span class="text-danger">*</span></label>
                                                    <input type="text" name="ho_ten" class="form-control @error('ho_ten') is-invalid @enderror" 
                                                           value="{{ old('ho_ten', $user->ho_ten) }}" required>
                                                    @error('ho_ten')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                                           value="{{ old('email', $user->email) }}" required>
                                                    @error('email')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" 
                                                           value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}">
                                                    @error('so_dien_thoai')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ngày sinh</label>
                                                    <input type="date" name="ngay_sinh" class="form-control" 
                                                           value="{{ old('ngay_sinh', $user->ngay_sinh) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <textarea name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" 
                                                      rows="3">{{ old('dia_chi', $user->dia_chi) }}</textarea>
                                            @error('dia_chi')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Cập nhật thông tin
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Đơn hàng -->
                        <div class="tab-pane fade" id="orders">
                            <div class="card">
                                <div class="card-header">
                                    <h5><i class="fas fa-box"></i> Đơn hàng của tôi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle"></i> Bạn chưa có đơn hàng nào.
                                    </div>
                                    {{-- TODO: Thêm danh sách đơn hàng ở đây --}}
                                </div>
                            </div>
                        </div>

                        <!-- Tab Đổi mật khẩu -->
                        <div class="tab-pane fade" id="password">
                            <div class="card">
                                <div class="card-header">
                                    <h5><i class="fas fa-lock"></i> Đổi mật khẩu</h5>
                                </div>
                                <div class="card-body">
                                    @if($errors->has('current_password'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('current_password') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <form action="{{ route('shoe.profile.change-password') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Mật khẩu hiện tại <span class="text-danger">*</span></label>
                                            <input type="password" name="current_password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu mới <span class="text-danger">*</span></label>
                                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                                            @error('new_password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Xác nhận mật khẩu mới <span class="text-danger">*</span></label>
                                            <input type="password" name="new_password_confirmation" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-key"></i> Đổi mật khẩu
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('shoe.layouts.footer')
@endsection

<style>
    .nav-link {
        color: #333;
        padding: 10px 15px;
        border-radius: 5px;
        margin-bottom: 5px;
    }
    .nav-link:hover,
    .nav-link.active {
        background-color: #007bff;
        color: white !important;
    }
    .nav-link i {
        margin-right: 8px;
        width: 20px;
    }
</style>