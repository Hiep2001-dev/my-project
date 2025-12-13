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

@include('shoe.layouts.header')

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
                    <h1 class="title">
                        Tất cả sản phẩm
                        
                    </h1>
                    <div class="alert-no-filter"></div>
                </div>
                <div class="col-md-4 d-flex justify-content-end align-items-center">
                    <form action="{{ route('shoe.search') }}" method="GET" class="d-flex" style="gap:8px;">
                        <input type="text" name="q" class="form-control" placeholder="Tìm kiếm sản phẩm..." value="{{ request('q') }}" style="max-width:180px;">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="row">
                
                @foreach($products as $product)
                <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                    <div class="product-block">
                        <a href="{{ route('shoe.detailproduct', $product->id) }}" class="img-resize">
                            @php
                                $firstImage = null;
                                $firstPrice = null;
                                foreach($product->variations as $variation) {
                                    if($variation->images->count() > 0 && !$firstImage) {
                                        $firstImage = $variation->images[0]->duong_dan ?? null;
                                    }
                                    if(is_null($firstPrice) && isset($variation->gia_ban)) {
                                        $firstPrice = $variation->gia_ban;
                                    }
                                }
                            @endphp
                            <img src="{{ asset($firstImage ?? 'images/no-image.png') }}" alt="{{ $product->ten }}">
                        </a>
                        <div class="product-detail clearfix">
                            <div class="pro-text">
                                <a href="{{ route('shoe.detailproduct', $product->id) }}">{{ $product->ten }}</a>
                            </div>
                            <div class="pro-price">
                                <p>{{ $firstPrice ? number_format($firstPrice, 0, ',', '.') : 'Liên hệ' }}₫</p>
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
@include("shoe.layouts.footer")
@endsection
