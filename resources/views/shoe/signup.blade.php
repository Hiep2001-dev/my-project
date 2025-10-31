@extends('shoe.layouts.master')
@section('content')
    @include('shoe.layouts.header')
  {{-- @include('shoe.layouts.sidebar')  --}}
  <!--Content-->
  <div class="content">
    <section class="signup">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Tạo tài khoản</h1>
                </div>
            </div>
            <div class="signin-right ">
              
                <form action="{{ route('user.register') }}" method="POST" class="form-signup" id="signupForm">
                    @csrf
                     
                    <div class="firstname form-control1 ">
                        <input type="text" id="name" name="ho_ten" placeholder="Họ Tên" required>
                    </div>
                    
                    <div class="sex form-control1">
                       <div class="female">
                          <input type="radio" id="female" name="gioi_tinh" value="nu" checked>
                          <label for="female">Nữ</label>
                       </div>
                       <div class="male">
                        <input type="radio" id="male" name="gioi_tinh" value="nam">
                        <label for="male">Nam</label>
                     </div>
                    </div>
                  
                    <div class="email form-control1">
                        <input type="email" id="email" name="email" placeholder="Email"required>
                        <span id="email-error" class="text-danger" style="font-size: 14px"></span>
                    </div >
                  {{-- <div class="sdt form-control1">
                    <div>
                      <input type="text" name="so_dien_thoai" placeholder="Số điện thoại" required>
                    </div>
                  </div> --}}
                    <div class="password form-control1">
                        <input type="password" id="password" name="mat_khau" placeholder="Mật khẩu" required>
                    </div>
                    <div class="password-confirmation form-control1">
                        <input type="password" id="password_confirmation" name="mat_khau_confirmation" placeholder="Nhập lại mật khẩu" required>
                        <span id="password-error" class="text-danger" style="font-size: 14px"></span>
                    </div>
                    <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                    
                      <button type="submit" class="btn btn-primary w-100">Đăng kí</button>
                    
                    <div class="backto">
                      <a href="{{ url('shoe/index') }}"><i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ</a>
                    </div>
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                      const emailInput = document.getElementById('email');
                      const emailError = document.getElementById('email-error');
                      const passwordInput = document.getElementById('password');
                      const passwordConfirmInput = document.getElementById('password_confirmation');
                      const passwordError = document.getElementById('password-error');
                      const form = document.getElementById('signupForm');
                      const hoTenInput = document.getElementById('name');

                     
                      // Kiểm tra định dạng email khi nhập
                      emailInput.addEventListener('input', function() {
                          const email = emailInput.value.trim();
                          emailError.textContent = '';
                          if (email.length > 0 && !validateEmail(email)) {
                              emailError.textContent = 'Email không đúng định dạng.';
                          } else if (email.length > 0) {
                              // Kiểm tra email đã tồn tại bằng AJAX
                              fetch('{{ url("/check-email") }}?email=' + encodeURIComponent(email))
                                  .then(response => response.json())
                                  .then(data => {
                                      if (data.exists) {
                                          emailError.textContent = 'Email đã tồn tại.';
                                      }
                                  });
                          }
                      });

                      // Kiểm tra nhập lại mật khẩu khi nhập
                      passwordConfirmInput.addEventListener('input', function() {
                          passwordError.textContent = '';
                          if (passwordInput.value !== passwordConfirmInput.value) {
                              passwordError.textContent = 'Mật khẩu nhập lại không khớp.';
                          }
                      });

                      // Khi submit form
                      form.addEventListener('submit', function(e) {
                          let valid = true;

                          if (!hoTenInput.value.trim()) {
                            hoTenInput.focus();
                            valid = false;
                            alert('Vui lòng nhập họ tên!');
                        }

                          if (!passwordInput.value.trim()) {
                            passwordInput.focus();
                            valid = false;
                            alert('Vui lòng nhập mật khẩu!');
                        }
                        if (!passwordConfirmInput.value.trim()) {
                            passwordConfirmInput.focus();
                            valid = false;
                            alert('Vui lòng nhập lại mật khẩu!');
                        }

                          if (!valid) {
                              e.preventDefault();
                          }
                      });

                      function validateEmail(email) {
                          // Đơn giản, bạn có thể thay regex khác nếu muốn
                          return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                      }
                    });
                    </script>
                </form>
            </div>
        </div>
    </section>
    @include('shoe.layouts.footer')
  </div>
@endsection