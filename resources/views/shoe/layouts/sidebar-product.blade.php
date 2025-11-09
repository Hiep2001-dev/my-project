{{-- filepath: resources/views/shoe/layouts/sidebar-product.blade.php --}}
<div class="sidebar-page">
    <div class="group-menu">
        <div class="page_menu_title title_block">
            <h2>Danh mục sản phẩm</h2>
        </div>
        <div class="layered layered-category">
            <div class="layered-content">
                <ul class="menuList-links">
                    <li><a href="{{ route('shoe.index') }}" title="Trang chủ"><span>Trang chủ</span></a></li>
                    <li><a href="#" title="Giày chạy bộ"><span>Giày chạy bộ</span></a></li>
                    <li><a href="#" title="Giày tập gym"><span>Giày tập gym</span></a></li>
                    <li><a href="#" title="Giày bóng rổ"><span>Giày bóng rổ</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="layered">
        <p class="title_block" data-toggle="collapse"
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
            
        </div>
    </div>
</div>