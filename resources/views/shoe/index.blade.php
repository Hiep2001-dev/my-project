@extends('shoe.layouts.master')
<body>
  @include('shoe.layouts.header')
  @if(session('js_success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: "{{ session('js_success') }}",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
    });
</script>

@endif
  @include('shoe.layouts.sidebar')
  <div class="owl-carousel owl-theme owl-carousel-setting">
    <div class="item"><img src="{{ asset('images/slideshow_1.jpg') }}" class="d-block w-100" alt="..."></div>
    <div class="item"><img src="{{ asset('images/slideshow_2.jpg') }}" class="d-block w-100" alt="..."></div>
  </div>
  <!--Content-->
  <div class="content">
    <div class="container">
      <div class="hot_sp" style="padding-bottom: 10px;">
        <h2 style="text-align:center;padding-top: 10px">
          <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm nổi bật</a>
        </h2>
        <div class="view-all" style="text-align:center;padding-top: -10px;">
          <a style="color: black;text-decoration: none" href="{{ route('shoe.product') }}">Xem thêm</a>
        </div>
      </div>
    </div>
    <!--Product-->
    <div class="container" style="padding-bottom: 50px;">
      <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
          <div class="product-block">
            <a href="{{ route('shoe.detailproduct', $product->id) }}" title="{{ $product->ten }}" class="img-resize">
              <div class="product-img fade-box" style="position:relative;">
                @php
                  $firstImage = null;
                  $secondImage = null;
                  foreach($product->variations as $variation) {
                      if($variation->images->count() > 0) {
                          $firstImage = $variation->images[0]->duong_dan ?? null;
                          $secondImage = $variation->images[1]->duong_dan ?? null;
                          break;
                      }
                  }
                @endphp
                <img src="{{ asset($firstImage ?? 'images/no-image.png') }}"
                     alt="{{ $product->ten }}"
                     class="main-img"
                     >
                @if($secondImage)
                <img src="{{ asset($secondImage) }}"
                     alt="{{ $product->ten }}"
                     class="hover-img"
                     >
                @endif
              </div>
            </a>
            <div class="product-detail clearfix">
              <div class="pro-text">
                <a style="color: black; font-size: 14px;text-decoration: none;" href="{{ route('shoe.detailproduct', $product->id) }}"
                  title="{{ $product->ten }}">
                  {{ $product->ten }}
                </a>
              </div>
              <div class="pro-price">
                @php
                  $firstPrice = null;
                  foreach($product->variations as $variation) {
                      if(isset($variation->gia_ban)) {
                          $firstPrice = $variation->gia_ban;
                          break;
                      }
                  }
                @endphp
                <p class="">{{ $firstPrice ? number_format($firstPrice, 0, ',', '.') : 'Liên hệ' }}₫</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <section class="section wrapper-home-banner">
      <div class="container-fluid" style="padding-bottom: 50px;">
        <div class="row">
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image fade-box">
                  <img class="lazyloaded" src="{{ asset('images/shoes/block_home_category1_grande.jpg') }}" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p>Bộ sưu tập</p>
                  <h2>
                    Đại sứ thương hiệu
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image fade-box">
                  <img class="lazyloaded" src="{{ asset('images/shoes/block_home_category2_grande.jpg') }}" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p>Bộ sưu tập</p>
                  <h2>
                    Thương hiệu
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image">
                  <img class="lazyloaded" src="{{ asset('images/shoes/block_home_category3_grande.jpg') }}" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p></p>
                  <h2>
                    Blog
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="content">
        <div class="container">
          <div class="hot_sp">
            <h2 style="text-align:center;">
              <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm mới</a>
            </h2>
            <div class="view-all" style="text-align:center;">
              <a style="color: black;text-decoration: none" href="">Xem thêm</a>
            </div>
          </div>
        </div>
        <!--Product-->
      
    </section>
    <section class="">
      <div class="content">
        <div class="container">
          <div class="hot_sp">
            <h2 style="text-align:center;padding-top: 10px">
              <a style="font-size: 28px;color: black;text-decoration: none" href="">Bài viết mới nhất</a>
            </h2>
            <br />
          </div>
        </div>
      </div>
      <!--New-->
      <div>

        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="post_item">
                <div class="post_featured">
                  <a href="#" title="Adidas EQT Cushion ADV">
                    <img class="img-resize" style="padding-bottom:15px;" src="{{ asset('images/shoes/new-1.jpg') }}"
                      alt="Adidas Falcon nổi bật mùa Hè với phối màu color block">
                  </a>
                </div>
                <div class="pro-text">
                  <span class="post_info_item">

                    Thứ Ba 11,06,2019

                  </span>
                </div>
                <div class="pro-text">
                  <h3 class="post_title">
                    <a style=" color: black;
                                  font-size: 18px;text-decoration: none;" href="#" inspiration pack>
                      Adidas Falcon nổi bật mùa Hè với phối màu color block
                    </a>
                  </h3>
                </div>
                <div style="text-align:center; padding-bottom: 30px;">
                  <span>Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón chào mùa Hè khiến giới trẻ yêu
                    thích không thôi. Tưởng chừng thương hiệu sẽ tiếp tục...</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="post_item">
                <div class="post_featured">
                  <a href="#" title="Adidas EQT Cushion ADV">
                    <img class="img-resize" style="padding-bottom:15px;" src="{{ asset('images/shoes/new-2.jpg') }}"
                      alt="Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner">
                  </a>
                </div>
                <div class="pro-text">
                  <span class="post_info_item">

                    Thứ Ba 11,06,2019

                  </span>
                </div>
                <div class="pro-text">
                  <h3 class="post_title">
                    <a style=" color: black;
                                                  font-size: 18px;text-decoration: none;" href="#" inspiration pack>
                      Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner
                    </a>
                  </h3>
                </div>
                <div style="text-align:center; padding-bottom: 30px;">
                  <span>Là một trong những đôi giày chạy bộ tốt nhất vào những năm 1994, 1995, Saucony Aya Runner vừa có
                    màn trở lại
                    vô cùng ấn tượngCó vẻ như 2019...</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="post_item">
                <div class="post_featured">
                  <a href="#" title="Adidas EQT Cushion ADV">
                    <img class="img-resize" style="padding-bottom:15px;" src="{{ asset('images/shoes/new-3.jpg') }}"
                      alt="Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt">
                  </a>
                </div>
                <div class="pro-text">
                  <span class="post_info_item">

                    Thứ Ba 11,06,2019

                  </span>
                </div>
                <div class="pro-text">
                  <h3 class="post_title">
                    <a style=" color: black;
                                      font-size: 18px;text-decoration: none;" href="#" inspiration pack>
                      Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt
                    </a>
                  </h3>
                </div>
                <div style="text-align:center; padding-bottom: 30px;">
                  <span>Là một trong những mẫu giày retro có nhiều phối màu gradient đẹp nhất từ trước đến này, Nike
                    Vapormax Plus vừa có màn trở lại bá đạo dành cho...</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section wrapper-home-newsletter">
      <div class="container-fluid">
        <div class="content-newsletter">
          <h2>Đăng ký</h2>
          <p>Đăng ký nhận bản tin của FootStore HTH để cập nhật những sản phẩm mới, nhận thông tin ưu đãi đặc biệt và thông
            tin
            giảm giá khác.</p>
          <div class="form-newsletter">
            <form action="" accept-charset="UTF-8" class="">
              <div class="form-group">
                <input type="hidden" id="contact_tags">
                <input required="" type="email" value="" placeholder="Nhập email của bạn" aria-label="Email Address"
                  class="">
                <button type="submit" class=""><span>Gửi</span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    @include('shoe.layouts.footer')
  </div>
  <div class="registratior_custom">
    <form action="">
        <div class="content">
          <div class="x-close">
            <i class="fa fa-times"></i>
          </div>
          <h3>Nhận các ưu đãi cùng FootStore</h3>
          <p>Chúng tôi sẽ cập nhật các chương trình khuyến mãi mới đến bạn</p>
          <ul>
            <li>
              <span>Giảm giá sản phẩm</span>
            </li>
            <li>
              <span>Sản phẩm mới</span>
            </li>
            <li>
              <span>Sản phẩm bán chạy</span>
            </li>
          </ul>
          <input type="text" placeholder="Đăng kí nhận thông tin">
          <button class="button_register"><p>ĐĂNG KÍ</p></button>
        </div>
    </form>
  </div>
</body>

</html>

<style>
.product-block .product-img {
  position: relative;
  overflow: hidden;
}
.product-block .product-img .main-img {
  display: block;
  position: relative;
  z-index: 1;
  transition: opacity 0.3s;
}
.product-block .product-img .hover-img {
  position: absolute;
  top: 0; left: 0;
  z-index: 2;
  opacity: 0;
  transition: opacity 0.3s;
}
.product-block:hover .product-img .hover-img {
  opacity: 1;
}
.product-block:hover .product-img .main-img {
  opacity: 0;
}
</style>
