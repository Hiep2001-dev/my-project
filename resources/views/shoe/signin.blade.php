@extends('shoe.layouts.master')

@section('content')
  @include('shoe.layouts.header')
  @if(session('js_success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: "{{ session('js_success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
    @endif
    @if(session('js_error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: "{{ session('js_error') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
    @endif
  {{-- @include('shoe.layouts.sidebar') --}}
  <!--Content-->
  <div class="content">
    <section class="signin ">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
            <div class="signin-right " id="a-sign">
              {{-- @if(session('js_success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            alert("{{ session('js_success') }}");
                        });
                    </script>
                @endif --}}
                <form action="{{ route('shoe.login') }}" method="POST" class="form-signin">
                    @csrf
                    <div class="username form-control1 ">
                        <input type="email"   id="username"name="email" placeholder="Email">
                    </div>
                    <div class="password form-control1">
                        <input type="password" id="password" name="password" placeholder="Mật khẩu">

                    </div>
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div class="submit">
                      <input class="btn" type="submit" id="dangnhap" value="Đăng Nhập">
                    <div class="forgetpassword">
                            <p id="quenmk">Quên mật khẩu?</p> hoặc <a href="{{ url('shoe/signup') }}">Đăng kí</a>
                      </div>
                    </div>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="signin-right " id="b-sign">
                <form action="">
                    <div class="username form-control1 ">
                       <h2>Phục hồi mật khẩu</h2>
                    </div>
                    <div class="password form-control1">
                        <input type="text" id="password" placeholder="Mật khẩu">
                    </div>
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    <div class="submit">
                      <input class="btn" type="submit" value="Gửi">
                      <div class="forgetpassword">
                            <a href="" id="huy">Hủy</a>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </section>    
  </div>
  @include('shoe.layouts.footer')
  @endsection
