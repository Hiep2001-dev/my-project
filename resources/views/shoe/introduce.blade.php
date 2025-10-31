@include('shoe.layouts.header')
@include('shoe.layouts.sidebar')
@extends('shoe.layouts.master')
  <!--Banner-->
  <div>
    <div>
      <img src="{{ asset('images/collection_banner.jpg') }}" alt="Products">
    </div>
  </div>
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
            <li>
              <span><span style="color: #777777">Giới thiệu</span></span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--List Product-->

  <div class="container">

    <div class="row">
      <div class="col-md-3 d-none d-sm-block d-sm-none d-md-block">
        <div class="sidebar-page">
            <div class="group-menu">
                <div class="page_menu_title title_block">
                  <h2>Danh mục trang</span></h2>
                </div>
                <div class="layered layered-category">
                    <div class="layered-content">
                        <ul class="menuList-links">
                          <li class=""><a href="home.html" title="Trang chủ"><span>Trang chủ</span></a></li>       
                          <li class=""><a href="product.html" title="Bộ sưu tập"><span>Bộ sưu tập</span></a></li>
                          <li class="has-submenu level0 ">
                              <a title="Sản phẩm" >Sản phẩm <span class="icon-plus-submenu" data-toggle="collapse"
                                  href="#collapseExample" role="button" aria-expanded="false"
                                  aria-controls="collapseExample"></span></a>
                              <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="border:0">
                                  <ul class="menu-product">
                                    <li><a href="detailproduct.html" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a></li>
                                    <li><a href="detailproduct.html" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a></li>
                                    <li><a href="detailproduct.html" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a></li>
                                  </ul>
                                </div>
                              </div>
                            </li>      
                          <li class="active"><a href="introduce.html" title="Giới thiệu"><span>Giới thiệu</span></a></li>     
                          <li class=""><a href="blog.html" title="Blog"><span>Blog</span></a></li>      
                          <li class=""><a href="contact.html" title="Liên hệ"><span>Liên hệ</span></a></li>
                        </ul>
                      </div>
                </div>
              </div>
          <div class="box_image visible-lg visible-md">
            <div class="banner">
              <a href="">
                <img src="//theme.hstatic.net/1000375638/1000480323/14/page_banner.jpg?v=321" alt="Runner Inn">
              </a>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="page-wrapper">
          <div class="heading-page">
            <h1>Giới thiệu</h1>
          </div>
          <div class="wrapbox-content-page">
            <div class="content-page ">
              <p>Trang giới thiệu giúp khách hàng hiểu rõ hơn về cửa hàng của bạn. Hãy cung cấp thông tin cụ thể về việc
                kinh doanh, về cửa hàng, thông tin liên hệ. Điều này sẽ giúp khách hàng cảm thấy tin tưởng khi mua hàng
                trên website của bạn.</p>
              <p>Một vài gợi ý cho nội dung trang Giới thiệu:</p>
              <div>
                <ul>
                  <li><span>Bạn là ai</span><br></li>
                  <li><span>Giá trị kinh doanh của bạn là gì</span><br></li>
                  <li><span>Địa chỉ cửa hàng</span><br></li>
                  <li><span>Bạn đã kinh doanh trong ngành hàng này bao lâu rồi</span><br></li>
                  <li><span>Bạn kinh doanh ngành hàng online được bao lâu</span><br></li>
                  <li><span>Đội ngũ của bạn gồm những ai</span><br></li>
                  <li><span>Thông tin liên hệ</span><br></li>
                  <li><span>Liên kết đến các trang mạng xã hội (Twitter, Facebook)</span><br></li>
                </ul>
              </div>
              <p>Bạn có thể chỉnh sửa hoặc xoá bài viết này tại <a href="" style="color:black"><strong>đây</strong></a>
                hoặc thêm những bài viết mới trong phần quản lý <a href="" style="color: black"><strong>Trang nội
                    dung</strong></a>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--gallery-->
  <section class="section section-gallery">
    <div class="">
      <div class="hot_sp" style="padding-top: 70px;padding-bottom: 50px;">
        <h2 style="text-align:center;padding-top: 10px">
          <a style="font-size: 28px;color: black;text-decoration: none" href="#">Khách hàng và Runner Inn</a>
        </h2>
      </div>
      <div class="list-gallery clearfix">
        <ul class="shoes-gp">
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="{{ asset('images/shoes/gallery_item_1.jpg') }}" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="{{ asset('images/shoes/gallery_item_2.jpg') }}" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="{{ asset('images/shoes/gallery_item_3.jpg') }}" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="{{ asset('images/shoes/gallery_item_4.jpg') }}" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="{{ asset('images/shoes/gallery_item_5.jpg') }}" alt="">
            </div>
          </li>
          <li>
            <div class="gallery_item">
              <img class="img-resize" src="{{ asset('images/shoes/gallery_item_6.jpg') }}" alt="">
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <footer class="main-footer">
    <div class="container">
      <div class="">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                Giới thiệu
              </h4>
              <div class="footer-content">
                <p>Runner Inn trang mua sắm trực tuyến của thương hiệu giày, thời trang nam, nữ, phụ kiện, giúp bạn
                  tiếp
                  cận xu hướng thời trang mới nhất.</p>
                <div class="logo-footer">
                  <img src="{{ asset('images/logo-bct.png') }}" alt="Bộ Công Thương">
                </div>
                <div class="social-list">
                  <a href="#" class="fab fa-facebook"></a>
                  <a href="#" class="fab fa-google"></a>
                  <a href="#" class="fab fa-twitter"></a>
                  <a href="#" class="fab fa-youtube"></a>
                  <a href="#" class="fab fa-skype"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-link">
              <h4 class="footer-title">
                PHÁP LÝ &amp; CÂU HỎI
              </h4>
              <div class="footer-content toggle-footer">
                <ul>
                  <li class="item">
                    <a href="#" title="Tìm kiếm">Tìm kiếm</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Giới thiệu">Giới thiệu</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Chính sách đổi trả">Chính sách đổi trả</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Chính sách bảo mật">Chính sách bảo mật</a>
                  </li>
                  <li class="item">
                    <a href="#" title="Điều khoản dịch vụ">Điều khoản dịch vụ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                Thông tin liên hệ
              </h4>
              <div class="footer-content toggle-footer">
                <ul>
                  <li><span>Địa chỉ:</span> 117-119 Lý Chính Thắng, Phường 7, Quận 3, TP. Hồ Chí Minh, Vietnam</li>
                  <li><span>Điện thoại:</span> +84 (028) 38800659</li>
                  <li><span>Fax:</span> +84 (028) 38800659</li>
                  <li><span>Mail:</span> contact@aziworld.com</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="footer-col footer-block">
              <h4 class="footer-title">
                FANPAGE
              </h4>
              <div class="footer-content">
                <div id="fb-root">
                  <div class="footer-static-content">
                    <div class="fb-page" data-href="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/"
                      data-tabs="timeline" data-width="" data-height="215" data-small-header="false"
                      data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                      <blockquote cite="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/"
                        class="fb-xfbml-parse-ignore"><a
                          href="https://www.facebook.com/AziWorld-Viet-Nam-908555669481794/">AziWorld Viet Nam</a>
                      </blockquote>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-footer--copyright">
      <div class="container">
        <hr>
        <div class="main-footer--border" style="text-align:center;padding-bottom: 15px;">
          <p>Copyright © 2019 <a href="https://runner-inn.myharavan.com"> Runner Inn</a>. <a target="_blank"
              href="https://www.facebook.com/henrynguyen202">Powered by HuniBlue</a></p>
        </div>
      </div>
    </div>
  </footer>
  
</body>

</html>