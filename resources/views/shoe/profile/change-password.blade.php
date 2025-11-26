{{-- filepath: c:\Users\admin\my-project\resources\views\shoe\profile_password.blade.php --}}
@extends('shoe.layouts.master')

@section('title', 'Đổi mật khẩu')

@section('content')
    @include('shoe.layouts.header')
    @include('shoe.layouts.sidebar')

    <main>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h5><i class="fas fa-lock"></i> Đổi mật khẩu</h5>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <form action="{{ route('shoe.password.update') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>Mật khẩu hiện tại</label>
                                    <input type="password" name="current_password" class="form-control" required>
                                    @error('current_password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" name="new_password" class="form-control" required>
                                    @error('new_password')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                    @error('new_password_confirmation')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Đổi mật khẩu
                                </button>
                                <a href="{{ route('shoe.profile') }}" class="btn btn-secondary">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('shoe.layouts.footer')
@endsection