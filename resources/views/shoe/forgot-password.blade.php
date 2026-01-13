@extends('shoe.layouts.master')
@section('content')
@include('shoe.layouts.sidebar')
@include('shoe.layouts.header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow rounded-4">
                <div class="card-body p-4">
                    <h3 class="mb-4 text-center text-primary">Quên mật khẩu</h3>
                    @if(session('status'))
                        <div class="alert alert-info">{{ session('status') }}</div>
                    @endif
                    <form action="{{ route('forgot.send') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary w-100 fw-bold">
                            Gửi mật khẩu mới
                        </button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="{{ route('shoe.signin') }}">Quay lại đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
.btn-gradient-primary {
    background: linear-gradient(90deg,#2563eb 0,#1e40af 100%);
    color: #fff;
    border: none;
}
.btn-gradient-primary:hover {
    background: linear-gradient(90deg,#1e40af 0,#2563eb 100%);
    color: #fff;
}
.card {
    border-radius: 1.5rem;
}
</style>
@endsection