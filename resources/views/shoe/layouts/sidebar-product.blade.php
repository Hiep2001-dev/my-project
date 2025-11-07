{{-- filepath: resources/views/shoe/layouts/sidebar-product.blade.php --}}
<div class="wrap-filter">
    <div class="box_sidebar">
        <div class="block left-module">
            <div class="filter_xs">
                <div class="group-menu">
                    <div class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                        href="#collapseExample1" role="button" aria-expanded="false"
                        aria-controls="collapseExample1">
                        Danh mục sản phẩm
                        <span>
                            <i class="fa fa-angle-down" data-toggle="collapse"
                                href="#collapseExample1" role="button" aria-expanded="false"
                                aria-controls="collapseExample1"></i>
                        </span>
                    </div>
                    <div class="block_content layered-category collapse" id="collapseExample1">
                        <div class="layered-content card card-body" style="border:0;padding:0">
                            <ul class="menuList-links">
                                <li><a href="{{ route('shoe.index') }}" title="Trang chủ"><span>Trang chủ</span></a></li>
                                <li class="active"><a href="{{ route('shoe.product') }}" title="Bộ sưu tập"><span>Bộ sưu tập</span></a></li>
                                <li><a href="#"><span>Thương hiệu</span></a></li>
                                <li><a href="{{ route('shoe.introduce') }}" title="Giới thiệu"><span>Giới thiệu</span></a></li>
                                <li><a href="#" title="Blog"><span>Blog</span></a></li>
                                <li><a href="{{ route('shoe.contact') }}" title="Liên hệ"><span>Liên hệ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Các bộ lọc giữ nguyên, nếu muốn động thì truyền dữ liệu từ controller --}}
                <div class="layered">
                    <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none" data-toggle="collapse"
                        href="#collapseExample2" role="button" aria-expanded="false"
                        aria-controls="collapseExample2">
                        Bộ lọc sản phẩm
                        <span>
                            <i class="fa fa-angle-down" data-toggle="collapse"
                                href="#collapseExample2" role="button" aria-expanded="false"
                                aria-controls="collapseExample2"></i>
                        </span>
                    </p>
                    <div class="block_content collapse" id="collapseExample2">
                        <div class="group-filter" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Màu sắc</span><span class="icon-control"><i
                            class="fa fa-minus"></i></span></div>
                      <div class="layered-content filter-color s-filter">
                        <ul class="check-box-list">
                          <li>
                            <input type="checkbox" id="data-color-p1">
                            <label for="data-color-p1" style="background-color: #fb4727"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p2">
                            <label for="data-color-p2" style="background-color: #fdfaef"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p3">
                            <label for="data-color-p3" style="background-color: #3e3473"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p4">
                            <label for="data-color-p4" style="background-color: #ffffff"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p5">
                            <label for="data-color-p5" style="background-color: #75e2fb"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p6">
                            <label for="data-color-p6" style="background-color: #cecec8"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p7">
                            <label for="data-color-p7" style="background-color: #6daef4"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p8">
                            <label for="data-color-p8" style="background-color: #000000"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p9">
                            <label for="data-color-p9" style="background-color: #e2262a"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p10">
                            <label for="data-color-p10" style="background-color: #ee8aa1"></label>
                          </li>
                          <li>
                            <input type="checkbox" id="data-color-p11">
                            <label for="data-color-p11" style="background-color: #4a5250"></label>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="group-filter" aria-expanded="true">
                      <div class="layered_subtitle dropdown-filter"><span>Kích thước</span><span class="icon-control"><i
                            class="fa fa-minus"></i></span></div>
                      <div class="layered-content filter-size s-filter">

                        <ul class="check-box-list clearfix">

                          <li>
                            <input type="checkbox" id="data-size-p1">
                            <label for="data-size-p1">35</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p2">
                            <label for="data-size-p2">36</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p3">
                            <label for="data-size-p3">37</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p4">
                            <label for="data-size-p4">38</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p5">
                            <label for="data-size-p5">39</label>
                          </li>

                          <li>
                            <input type="checkbox" id="data-size-p6">
                            <label for="data-size-p6">40</label>
                          </li>

                        </ul>
                      </div>
                    </div>
                        {{-- ... giữ nguyên phần filter thương hiệu, giá, màu sắc, kích thước ... --}}
                        {{-- Nếu muốn động, truyền danh sách thương hiệu/danh mục từ controller --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>