{{-- filepath: resources/views/shoe/product.blade.php --}}
@extends('shoe.layouts.master')

@section('title', 'Tất cả sản phẩm')

@section('content')
<style>
.product-img img {
    width: 100%;
    max-width: 180px;
    height: 180px;
    object-fit: cover;
    display: block;
    margin: 0 auto;
    box-shadow: none !important;
    position: static !important;
    z-index: 1 !important;
}
.product-block {
    margin-bottom: 30px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    padding: 10px;
}
.product-detail {
    text-align: center;
    margin-top: 10px;
}
.pro-text a {
    color: black;
    font-size: 14px;
    text-decoration: none;
    font-weight: 500;
    display: block;
    margin-bottom: 5px;
}
.pro-price p {
    color: #e74c3c;
    font-weight: bold;
    margin: 0;
}
</style>

<div class="header">
    <a style="color: #ffffff;text-decoration: none;" href="{{ url('shoe/index') }}">
        MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG
    </a>
</div>

@include('shoe.layouts.sidebar')

{{-- Banner --}}
<div>
    <img src="{{ asset('images/collection_banner.jpg') }}" alt="Products" style="width:100%;max-height:300px;object-fit:cover;">
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
                        <a href="#" class="img-resize"></a>
                        <div class="product-img">
                            
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
                                <div class="product-img">
                                    <img src="{{ asset($firstImage ?? 'images/no-image.png') }}" alt="{{ $product->ten }}">
                                </div>
                            </a>
                        </div>
                        <div class="product-detail clearfix">
                            <div class="pro-text">
                                <a href="#">{{ $product->ten }}</a>
                            </div>
                            <div class="pro-price">
                                <p>{{ number_format($product->gia, 0, ',', '.') }}₫</p>
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
