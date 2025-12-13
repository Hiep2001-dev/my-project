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
              <a class="nav-link" href="{{ url('shoe/product') }}">BỘ SƯU TẬP</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle aaaa" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <p>SẢN PHẨM</p>
                <i class="fa fa-angle-double-right"></i>

              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="border:0;">
                <a class="dropdown-item" href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 1">Sản phẩm -
                  Style 1</a>
                <a class="dropdown-item" href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 2">Sản phẩm -
                  Style 2</a>
                <a class="dropdown-item" href="{{ url('shoe/detailproduct') }}" title="Sản phẩm - Style 3">Sản phẩm -
                  Style 3</a>
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
          <form action="#" class="searchform searchform-categoris ultimate-search">
            <div class="wpo-search-inner" style="display:inline">
              <input type="hidden" name="type" value="product">
              <input required="" id="inputSearchAuto" name="q" maxlength="40" autocomplete="off"
                class="searchinput input-search search-input" type="text" size="20" placeholder="Tìm kiếm sản phẩm...">
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
      <div class="uk-offcanvas-bar" style="background: white; width: 350px;">
        <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>
        <h3 style="font-size: 14px; color: #272727; text-transform: uppercase; margin: 3px 0 30px 0; font-weight: 500; letter-spacing: 2px;">Giỏ hàng</h3>
        <div class="site-nav-container-last" style="color:#272727">
          <div class="cart-view clearfix">
            <table id="cart-view">
              <tbody>
                @if(Auth::user())

                  @php
                    $cart = \App\Models\Cart::with('cartDetails.bienTheSanPham')->where('nguoi_dung_id', Auth::id())->where('trang_thai', 'dang_mua')->first();
                  @endphp
                  @if($cart && $cart->cartDetails && $cart->cartDetails->count())
                    @foreach($cart->cartDetails as $item)
                    <tr>
                      <td class="img">
                        <a href="{{ url('shoe/product/'.$item->bienTheSanPham->product->id) }}">
                          @php
                            $img = $item->bienTheSanPham->hinh_anh_chinh 
                              ?? ($item->bienTheSanPham->images && $item->bienTheSanPham->images->count() > 0
                                  ? $item->bienTheSanPham->images->first()->duong_dan
                                  : 'images/no-image.png');
                          @endphp
                          <img src="{{ asset($img) }}" alt="{{ $item->bienTheSanPham->product->ten ?? 'Sản phẩm' }}">
                        </a>
                      </td>
                      <td>
                        <a class="pro-title-view" style="color: #272727" href="{{ url('shoe/product/'.$item->bienTheSanPham->product->id) }}">
                          {{ $item->bienTheSanPham->product->ten ?? 'Sản phẩm' }}
                        </a>
                        <span class="variant">
                          {{ $item->bienTheSanPham->mau_sac ?? '' }} / {{ $item->bienTheSanPham->size_eu ?? '' }}
                        </span>
                          <span class="pro-quantity-view">{{ $item->so_luong }}</span>
                        <span class="pro-price-view">{{ number_format($item->bienTheSanPham->gia_ban) }}₫</span>
                        <span class="remove_link remove-cart">
                          <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #272727;">
                              <i class="fas fa-times"></i>
                            </button>
                          </form>
                        </span>
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="2" class="text-center text-muted">Giỏ hàng trống</td>
                    </tr>
                  @endif
                @else
                  @if(session('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $item)
                    <tr>
                      <td class="img">
                        <a href="{{ url('shoe/product/'.$item['san_pham_id']) }}">
                          <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                        </a>
                      </td>
                      <td>
                        <a class="pro-title-view" style="color: #272727" href="{{ url('shoe/product/'.$item['san_pham_id']) }}">
                          {{ $item['name'] }}
                        </a>
                        <span class="variant">{{ $item['color'] ?? '' }} / {{ $item['size'] ?? '' }}</span>
                        <span class="pro-quantity-view">{{ $item['quantity'] }}</span>
                        <span class="pro-price-view">{{ number_format($item['price']) }}₫</span>
                        <span class="remove_link remove-cart">
                        <form action="{{ route('cart.remove', $item['san_pham_id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none;">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                        </span>
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="2" class="text-center text-muted">Giỏ hàng trống</td>
                    </tr>
                  @endif
                @endif
              </tbody>
            </table>
            <span class="line"></span>
            <table class="table-total">
              <tbody>
                <tr>
                  <td class="text-left">TỔNG TIỀN:</td>
                  <td class="text-right" id="total-view-cart">
                    @if(Auth::check() && $cart)
                      {{
                        number_format(
                          $cart->cartDetails->sum(function($i){
                           $gia = $i->don_gia ?? 0;
                            return $gia * $i->so_luong;
                          })
                        )
                      }}₫
                    @else
                      @php
                          $total = 0;
                          if(session('cart')) {
                              foreach(session('cart') as $item) {
                                  $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
                              }
                          }
                      @endphp
                      {{ number_format($total) }}₫
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="distance-td">
                    <a href="{{ route('cart.index') }}" class="linktocart button dark">Xem giỏ hàng</a>
                  </td>
                  <td>
                    <a href="{{ route('cart.checkout') }}" class="linktocheckout button dark">Thanh toán</a>
                  </td>
                </tr>
              </tbody>
            </table>
            <a href="#" target="_blank" class="button btn-check" style="text-decoration:none;">
              <span>Click nhận mã giảm giá ngay !</span>
            </a>
          </div>
        </div>
      </div>
    </div>

      <div class="icon-ol">
        @if(Auth::check())
         <span style="color: #272727; margin-right: 10px; font-weight: 500;">
            Chào! {{ Auth::user()->ho_ten }}
        </span>
          <a href="{{ route('shoe.profile') }}" style="color: #272727" title="Thông tin cá nhân">
            <i class="fas fa-user-alt"></i>

          </a>
        @else
          <a href="{{ url('shoe/signin') }}" style="color: #272727" title="Đăng nhập">
            <i class="fas fa-user-alt"></i>
          </a>
        @endif

        @if(Auth::check())
          <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
          <i id=""class="fas fa-shopping-cart"></i>
        </a>
        @else
          <a href="{{ url('shoe/signin') }}" style="color: #272727" title="Vui lòng đăng nhập để tìm kiếm">
            <i class="fas fa-search" style="color: black"></i>
          </a>
        @endif

        

        <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </div>
  </div>
</nav>

</div>
