{{-- filepath: resources/views/shoe/product.blade.php --}}
@extends('shoe.layouts.master')

@section('title', 'Tất cả sản phẩm')

@section('content')
<div class="header">
    <a style="color: #ffffff;text-decoration: none;" href="{{ url('shoe/index') }}">
        MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG
    </a>
</div>

@include('shoe.layouts.sidebar')

{{-- Banner --}}
<div>
    <img src="{{ asset('images/collection_banner.jpg') }}" alt="Products">
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
                        <a href="#">
                            <span>Danh mục</span>
                        </a>
                    </li>
                    <li>
                        <span><span style="color: #777777">Tất cả sản phẩm</span></span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 50px;">
    <div class="row">
        {{-- Sidebar --}}
        <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
            @include('shoe.layouts.sidebar-product')
        </div>
        {{-- List Product --}}
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="wrap-collection-title row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <h1 class="title">Tất cả sản phẩm</h1>
                    <div class="alert-no-filter"></div>
                </div>
                <div class="col-md-4 d-sm-none d-md-block d-none d-sm-block" style="float: left">
                    <div class="option browse-tags">
                        <span class="custom-dropdown custom-dropdown--grey">
                            <select class="sort-by custom-dropdown__select">
                                <option value="price-ascending">Giá: Tăng dần</option>
                                <option value="price-descending">Giá: Giảm dần</option>
                                <option value="title-ascending">Tên: A-Z</option>
                                <option value="title-descending">Tên: Z-A</option>
                                <option value="created-ascending">Cũ nhất</option>
                                <option value="created-descending">Mới nhất</option>
                                <option value="best-selling">Bán chạy nhất</option>
                                <option value="quantity-descending">Tồn kho: Giảm dần</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Hiển thị sản phẩm --}}
                @foreach($products as $product)
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                    <div class="product-block">
                        <div class="product-img fade-box">
                            <a href="{{ route('shoe.product.show', $product->id) }}" title="{{ $product->ten }}" class="img-resize">
                                <img src="{{ asset($product->hinh_anh) }}" alt="{{ $product->ten }}">
                                <img src="{{ asset($product->hinh_anh_phu) }}" alt="{{ $product->ten }}">
                            </a>
                        </div>
                        <div class="product-detail clearfix">
                            <div class="pro-text">
                                <a style="color: black; font-size: 14px;text-decoration: none;" href="{{ route('shoe.product.show', $product->id) }}" title="{{ $product->ten }}">
                                    {{ $product->ten }}
                                </a>
                            </div>
                            <div class="pro-price">
                                <p class="">{{ number_format($product->gia, 0, ',', '.') }}₫</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Phân trang --}}
            <div class="sortpagibar pagi clearfix text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Gallery --}}
<section class="section section-gallery">
    <div class="">
        <div class="hot_sp" style="padding-top: 70px;padding-bottom: 50px;">
            <h2 style="text-align:center;padding-top: 10px">
                <a style="font-size: 28px;color: black;text-decoration: none" href="">Khách hàng và Runner Inn</a>
            </h2>
        </div>
        <div class="list-gallery clearfix">
            <ul class="shoes-gp">
                <li><div class="gallery_item"><img class="img-resize" src="{{ asset('images/shoes/gallery_item_1.jpg') }}" alt=""></div></li>
                <li><div class="gallery_item"><img class="img-resize" src="{{ asset('images/shoes/gallery_item_2.jpg') }}" alt=""></div></li>
                <li><div class="gallery_item"><img class="img-resize" src="{{ asset('images/shoes/gallery_item_3.jpg') }}" alt=""></div></li>
                <li><div class="gallery_item"><img class="img-resize" src="{{ asset('images/shoes/gallery_item_4.jpg') }}" alt=""></div></li>
                <li><div class="gallery_item"><img class="img-resize" src="{{ asset('images/shoes/gallery_item_5.jpg') }}" alt=""></div></li>
                <li><div class="gallery_item"><img class="img-resize" src="{{ asset('images/shoes/gallery_item_6.jpg') }}" alt=""></div></li>
            </ul>
        </div>
    </div>
</section>
@endsection
