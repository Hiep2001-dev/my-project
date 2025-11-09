<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('shoe/index') }}">
        <img src="{{ asset('images/logo.png') }}" class="logo-top" alt="">
      </a>
      <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('shoe/index') }}">TRANG CHỦ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('shoe/product') }}">SẢN PHẨM</a>
          </li>
          <li class="nav-item lisanpham">
            <a class="nav-link" href="{{ url('shoe/detailproduct') }}">THƯƠNG HIỆU
              <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="sub_menu">
              <li class="">
                <a href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 1"> 
                  Sản phẩm - Style 1
                </a>
              </li>
              <li class="">
                <a href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 2"> 
                  Sản phẩm - Style 2
                </a>
              </li>
              <li class="">
                <a href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 3"> 
                  Sản phẩm - Style 3
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('shoe/introduce') }}">GIỚI THIỆU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('shoe/blog') }}">BLOG</a>
          </li>
        </ul>
      </div>
      <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="background: white;
        width: 100%;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
          <h3 style="font-size: 14px;
          color: #272727;
          text-transform: uppercase;
          margin: 3px 0 30px 0;
          font-weight: 500; letter-spacing: 2px;">MENU</h3>
            <div class="justify-content-md-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('shoe/index') }}">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('shoe/Product') }}">BỘ SƯU TẬP</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle aaaa"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" >
                    <p>SẢN PHẨM</p>
                    <i class="fa fa-angle-double-right"></i>

                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                    <a class="dropdown-item" href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a>
                    <a class="dropdown-item" href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a>
                    <a class="dropdown-item" href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('shoe/introduce') }}">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('shoe/blog') }}">BLOG</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('shoe/Contact') }}">LIÊN HỆ</a>
                </li>
              </ul>
            </div>

        </div>
      </div>
      <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
            <a href="{{ url('shoe/signin') }}" class="btn btn-primary w-100 mt-3">Đăng nhập</a>
            <a href="{{ url('shoe/signup') }}" class="btn btn-outline-primary w-100 mt-2">Đăng ký</a>
          <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Tìm kiếm</h3>
          <div class="search-box wpo-wrapper-search">
            <form action="search" class="searchform searchform-categoris ultimate-search">
              <div class="wpo-search-inner" style="display:inline">
                <input type="hidden" name="type" value="product">
                <input required="" id="inputSearchAuto" name="q" maxlength="40" autocomplete="off"
                  class="searchinput input-search search-input" type="text" size="20"
                  placeholder="Tìm kiếm sản phẩm...">
              </div>
              <button type="submit" class="btn-search btn" id="search-header-btn">
                <i style="font-weight:bold" class="fas fa-search"></i>
              </button>
            </form>
            <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
              <div class="resultsContent"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="offcanvas-flip2" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="    background: white;
            width: 350px;">

          <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

          <h3 style="font-size: 14px;
                color: #272727;
                text-transform: uppercase;
                margin: 3px 0 30px 0;
                font-weight: 500; letter-spacing: 2px;">Giỏ hàng</h3>
          <div class="site-nav-container-last" style="color:#272727">
            <div class="cart-view clearfix">
              <table id="cart-view">
                <tbody>
                  <tr class="item_1">
                    <td class="img"><a href="" title="Nike Air Max 90 Essential &quot;Grape&quot;"><img
                          src="{{ asset('images/shoes/1.jpg') }}" alt="/products/nike-air-max-90-essential-grape"></a></td>
                    <td>
                      <a class="pro-title-view" style="color: #272727" href=""
                        title="Nike Air Max 90 Essential &quot;Grape&quot;">Nike Air Max 90 Essential "Grape"</a>
                      <span class="variant">Tím / 36</span>
                      <span class="pro-quantity-view">1</span>
                      <span class="pro-price-view">4,800,000₫</span>
                      <span class="remove_link remove-cart"><a href=""><i style="color: #272727;"
                            class="fas fa-times"></i></a></span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <span class="line"></span>
              <table class="table-total">
                <tbody>
                  <tr>
                    <td class="text-left">TỔNG TIỀN:</td>
                    <td class="text-right" id="total-view-cart">4,800,000₫</td>
                  </tr>
                  <tr>
                    <td class="distance-td"><a href="" class="linktocart button dark">Xem giỏ hàng</a></td>
                    <td><a href="" class="linktocheckout button dark">Thanh toán</a></td>
                  </tr>
                </tbody>
              </table>

              <a href="" target="_blank" class="button btn-check" style="text-decoration:none;"><span>Click nhận mã giảm
                  giá ngay !</span></a>
            </div>
          </div>
        </div>
      </div>

      <div class="icon-ol">
        @if(Auth::check())
        <span class="welcome-user" style="font-size: 15px; color: #3A6ECC; font-weight: 500; margin-right: 10px; background: #f5f7fa; border-radius: 20px; padding: 6px 18px;">
            <i class="fas fa-user-circle me-1"></i> {{Auth::user()->ho_ten}}
        </span>
        <form action="{{ route('shoe.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm ms-2" style="vertical-align: middle;">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </button>
        </form>
        @else
            <a href="{{ url('shoe/signin') }}" class="btn btn-outline-primary rounded-pill ms-2 px-4 fw-bold shadow-sm" style="font-size: 15px;">
                <i class="fas fa-sign-in-alt me-1"></i>Login
            </a>
        @endif
        <a style="color: #272727" href="#">
          <i class="fas fa-user-alt"></i>
        </a>
        <a href="#" class="" uk-toggle="target: #offcanvas-flip">
          <i class="fas fa-search" style="color: black"></i>
        </a>
        
        <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
    </div>
  </nav>
    
</div>