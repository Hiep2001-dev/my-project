{{-- filepath: resources/views/shoe/detailproduct.blade.php --}}
@extends('shoe.layouts.master')


@section('title', $product->ten ?? 'Sản phẩm')

@section('content')

    @include('shoe.layouts.header')

    @include('shoe.layouts.sidebar')

    <main>
        <div id="product" class="productDetail-page">
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
                                    <a href="{{ url('shoe/product') }}">
                                        <span>Sản phẩm</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <span>
                                        <span itemprop="name">{{ $product->ten }}</span>
                                    </span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row product-detail-wrapper">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row product-detail-main pr_style_01">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-gallery">
                                    <div class="product-gallery__thumbs-container hidden-sm hidden-xs">
                                        <div class="product-gallery__thumbs thumb-fix">
                                            @php
                                                $thumbs = [];
                                                $firstImage = null;
                                                $firstPrice = null;
                                                foreach ($product->variations as $variation) {
                                                    foreach ($variation->images as $img) {
                                                        $thumbs[] = $img->duong_dan;
                                                    }
                                                    if (is_null($firstImage) && $variation->images->count() > 0) {
                                                        $firstImage = $variation->images[0]->duong_dan ?? null;
                                                    }
                                                    if (is_null($firstPrice) && isset($variation->gia_ban)) {
                                                        $firstPrice = $variation->gia_ban;
                                                    }
                                                }
                                            @endphp
                                            @foreach($thumbs as $i => $thumb)
                                                <div class="product-gallery__thumb {{ $i == 0 ? 'active' : '' }}"
                                                    id="imgg{{ $i + 1 }}">
                                                    <a class="product-gallery__thumb-placeholder" href="javascript:void(0);"
                                                        data-image="{{ asset($thumb) }}" data-zoom-image="{{ asset($thumb) }}">
                                                        <img src="{{ asset($thumb) }}" alt="{{ $product->ten }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-image-detail box__product-gallery scroll hidden-xs">
                                        <ul id="sliderproduct" class="site-box-content slide_product">
                                            @foreach($thumbs as $i => $thumb)
                                                <li class="product-gallery-item gallery-item {{ $i == 0 ? 'current' : '' }}"
                                                    id="imgg{{ $i + 1 }}a">
                                                    <img class="product-image-feature" src="{{ asset($thumb) }}"
                                                        alt="{{ $product->ten }}">
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="product-image__button">
                                            <div id="product-zoom-in" class="product-zoom icon-pr-fix" aria-label="Zoom in"
                                                title="Zoom in">
                                                <span class="zoom-in" aria-hidden="true">
                                                    <!-- SVG icon here -->
                                                </span>
                                            </div>
                                            <div class="gallery-index icon-pr-fix">
                                                <span class="current">1</span> / <span
                                                    class="total">{{ count($thumbs) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12 col-xs-12 product-content-desc" id="detail-product">
                                <div class="product-content-desc-1">
                                    <div class="product-title">
                                        <h1>{{ $product->ten }}</h1>
                                    </div>
                                    <div class="product-price" id="price-preview">
                                        <span
                                            class="pro-price">{{ $firstPrice ? number_format($firstPrice, 0, ',', '.') : 'Liên hệ' }}₫</span>
                                    </div>
                                    <form id="add-item-form" action="#" method="POST" class="variants clearfix">
                                        @php
                                            $colors = $product->variations->pluck('mau_sac')->unique()->filter()->values();
                                            $sizes = $product->variations->pluck('size_eu')->unique()->filter()->values();
                                        @endphp
                                        <div class="select clearfix" style="display: block !important;">
                                            <div class="selector-wrapper" style="display: block !important;">
                                                <label for="product-select-option-0" style="color: #000; font-weight: 600; display: block; margin-bottom: 8px;">
                                                    <i class="fa fa-palette" style="margin-right: 8px;"></i>
                                                    Màu sắc
                                                </label>
                                                <span class="custom-dropdown custom-dropdown--white" style="display: block;">
                                                    <select class="single-option-selector custom-dropdown__select custom-dropdown__select--white" 
                                                            id="product-select-option-0" 
                                                            style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background: #fff; color: #000;">
                                                        @foreach($colors as $color)
                                                            <option value="{{ $color }}">{{ $color }}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>

                                            <div class="selector-wrapper" style="display: block !important;">
                                                <label for="product-select-option-1" style="color: #000; font-weight: 600; display: block; margin-bottom: 8px;">
                                                    <i class="fa fa-ruler" style="margin-right: 8px;"></i>
                                                    Kích thước
                                                </label>
                                                <span class="custom-dropdown custom-dropdown--white" style="display: block;">
                                                    <select class="single-option-selector custom-dropdown__select custom-dropdown__select--white" 
                                                            id="product-select-option-1"
                                                            style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; background: #fff; color: #000;">
                                                        @foreach($sizes as $size)
                                                            <option value="{{ $size }}">{{ $size }}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="selector-actions">
                                            <div class="quantity-area clearfix">
                                                <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                                                <input type="text" id="quantity" name="quantity" value="1" min="1"
                                                    class="quantity-selector">
                                                <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                                            </div>
                                            <div class="wrap-addcart clearfix">
                                                <div class="row-flex">
                                                    <button type="button" class="button btn-addtocart addtocart-modal">Thêm
                                                        vào</button>
                                                    <button type="button" class="buy-now button" style="display: block;">Mua
                                                        ngay</button>
                                                </div>
                                                <a href="#" target="_blank" class="button btn-check"
                                                    style="color: #ffffff;text-decoration:none;">
                                                    <span>Click nhận mã giảm giá ngay !</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="product-description">
                                        <div class="title-bl">
                                            <h2>Mô tả</h2>
                                        </div>
                                        <div class="description-content">
                                            <div class="description-productdetail">
                                                {!! $product->mo_ta !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Sản phẩm liên quan --}}
                        <div class="list-productRelated clearfix">
                            <div class="heading-title text-center">
                                <h2>Sản phẩm liên quan</h2>
                            </div>
                            <div class="container">
                                <div class="row">
                                    @foreach($relatedProducts as $related)
                                        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
                                            <div class="product-block">
                                                @php
                                                    $relatedImage = null;
                                                    $relatedPrice = null;
                                                    foreach ($related->variations as $variation) {
                                                        if ($variation->images->count() > 0 && !$relatedImage) {
                                                            $relatedImage = $variation->images[0]->duong_dan ?? null;
                                                        }
                                                        if (is_null($relatedPrice) && isset($variation->gia_ban)) {
                                                            $relatedPrice = $variation->gia_ban;
                                                        }
                                                    }
                                                @endphp
                                                <a href="{{ route('shoe.detailproduct', $related->id) }}" class="img-resize">
                                                    <img src="{{ asset($relatedImage ?? 'images/no-image.png') }}"
                                                        alt="{{ $related->ten }}">
                                                </a>
                                                <div class="product-detail clearfix">
                                                    <div class="pro-text">
                                                        <a style="color: black; font-size: 14px;text-decoration: none;"
                                                            href="{{ route('shoe.detailproduct', $related->id) }}">
                                                            {{ $related->ten }}
                                                        </a>
                                                    </div>
                                                    <div class="pro-price">
                                                        <p>{{ $relatedPrice ? number_format($relatedPrice, 0, ',', '.') : 'Liên hệ' }}₫
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<style>
    .select.clearfix,
    .selector-wrapper {
        display: block !important;
    }
</style>