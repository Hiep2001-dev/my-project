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
                                <li class="has-submenu level0">
                                    <a title="Sản phẩm">Sản phẩm
                                        <span class="icon-plus-submenu" data-toggle="collapse"
                                            href="#collapseExample" role="button" aria-expanded="false"
                                            aria-controls="collapseExample"></span>
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body" style="border:0;padding-top:0;">
                                            <ul class="menu-product">
                                                <li><a href="#" title="Sản phẩm - Style 1">Sản phẩm - Style 1</a></li>
                                                <li><a href="#" title="Sản phẩm - Style 2">Sản phẩm - Style 2</a></li>
                                                <li><a href="#" title="Sản phẩm - Style 3">Sản phẩm - Style 3</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
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
                        {{-- ... giữ nguyên phần filter thương hiệu, giá, màu sắc, kích thước ... --}}
                        {{-- Nếu muốn động, truyền danh sách thương hiệu/danh mục từ controller --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>