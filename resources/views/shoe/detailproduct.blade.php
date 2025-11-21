{{-- filepath: c:\Users\admin\my-project\resources\views\shoe\detailproduct.blade.php --}}
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
                                                <span class="zoom-in" aria-hidden="true"></span>
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
                                    
                                    @php
                                        $colors = $product->variations
                                            ->where('trang_thai', 'hien')
                                            ->pluck('mau_sac')
                                            ->unique()
                                            ->filter()
                                            ->values();
                                            
                                        $sizes = $product->variations
                                            ->where('trang_thai', 'hien')
                                            ->pluck('size_eu')
                                            ->unique()
                                            ->filter()
                                            ->values();
                                        
                                        // Tạo mảng giá theo màu và size
                                        $priceData = [];
                                        foreach($product->variations->where('trang_thai', 'hien') as $v) {
                                            $key = $v->mau_sac . '_' . $v->size_eu;
                                            $priceData[$key] = $v->gia_ban;
                                            // Giá theo màu (lấy variation đầu tiên của màu đó)
                                            if (!isset($priceData[$v->mau_sac])) {
                                                $priceData[$v->mau_sac] = $v->gia_ban;
                                            }
                                        }
                                        
                                        // Giá mặc định
                                        $firstColor = $colors->first();
                                        $firstSize = $sizes->first();
                                        $defaultPrice = $priceData[$firstColor . '_' . $firstSize] ?? $priceData[$firstColor] ?? null;
                                    @endphp
                                    
                                    <div class="product-price" id="price-preview">
                                        <span class="pro-price" data-price="{{ $defaultPrice }}">
                                            {{ $defaultPrice ? number_format($defaultPrice, 0, ',', '.') : 'Liên hệ' }}₫
                                        </span>
                                    </div>

                                    {{-- Hidden input chứa dữ liệu giá --}}
                                    <input type="hidden" id="price-data" value='@json($priceData)'>

                                    <form id="add-item-form" action="#" method="POST" class="variants clearfix">
                                        @if($colors->count() > 0 || $sizes->count() > 0)
                                            <div class="select clearfix" style="display: block !important;">
                                                @if($colors->count() > 0)
                                                    <div class="selector-wrapper" style="display: block !important; margin-bottom: 20px;">
                                                        <label style="color: #000; font-weight: 600; display: block; margin-bottom: 10px;">
                                                            <i class="fa fa-palette" style="margin-right: 8px;"></i>
                                                            Màu sắc
                                                        </label>
                                                        <div class="color-filter" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                            @php
                                                                $colorMap = [
                                                                    'Đỏ' => '#FF0000',
                                                                    'Xanh dương' => '#0000FF',
                                                                    'Xanh lá' => '#00FF00',
                                                                    'Vàng' => '#FFFF00',
                                                                    'Cam' => '#FFA500',
                                                                    'Tím' => '#800080',
                                                                    'Hồng' => '#FFC0CB',
                                                                    'Trắng' => '#FFFFFF',
                                                                    'Đen' => '#000000',
                                                                    'Xám' => '#808080',
                                                                    'Nâu' => '#A52A2A',
                                                                    'Be' => '#F5F5DC',
                                                                ];
                                                            @endphp
                                                            @foreach($colors as $index => $color)
                                                                @php
                                                                    $colorCode = $colorMap[$color] ?? '#CCCCCC';
                                                                    $colorPrice = $priceData[$color] ?? null;
                                                                @endphp
                                                                <div class="color-option" data-color="{{ $color }}" data-price="{{ $colorPrice }}">
                                                                    <input type="radio" name="color" id="color-{{ $index }}" 
                                                                           value="{{ $color }}" 
                                                                           {{ $index == 0 ? 'checked' : '' }}
                                                                           style="display: none;"
                                                                           onchange="updatePriceFromColor('{{ $color }}')">
                                                                    <label for="color-{{ $index }}" 
                                                                           style="display: block; width: 40px; height: 40px; 
                                                                                  background-color: {{ $colorCode }}; 
                                                                                  border: {{ $index == 0 ? '3px solid #007bff' : '2px solid #ddd' }}; 
                                                                                  border-radius: 50%; 
                                                                                  cursor: pointer;
                                                                                  transition: all 0.3s ease;
                                                                                  transform: {{ $index == 0 ? 'scale(1.1)' : 'scale(1)' }};
                                                                                  {{ $color == 'Trắng' ? 'box-shadow: inset 0 0 0 1px #ccc;' : '' }}"
                                                                           title="{{ $color }}">
                                                                    </label>
                                                                    <span style="display: block; text-align: center; font-size: 12px; margin-top: 5px;">
                                                                        {{ $color }}
                                                                    </span>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                                @if($sizes->count() > 0)
                                                    <div class="selector-wrapper" style="display: block !important; margin-bottom: 20px;">
                                                        <label style="color: #000; font-weight: 600; display: block; margin-bottom: 10px;">
                                                            <i class="fa fa-ruler" style="margin-right: 8px;"></i>
                                                            Kích thước
                                                        </label>
                                                        <div class="size-filter" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                            @foreach($sizes as $index => $size)
                                                                <div class="size-option" data-size="{{ $size }}">
                                                                    <input type="radio" name="size" id="size-{{ $index }}" 
                                                                           value="{{ $size }}" 
                                                                           {{ $index == 0 ? 'checked' : '' }}
                                                                           style="display: none;"
                                                                           onchange="updatePriceFromSize('{{ $size }}')">
                                                                    <label for="size-{{ $index }}" 
                                                                           style="display: block; min-width: 50px; height: 40px; 
                                                                                  padding: 8px 15px;
                                                                                  background-color: {{ $index == 0 ? '#007bff' : '#fff' }}; 
                                                                                  border: 2px solid {{ $index == 0 ? '#007bff' : '#ddd' }}; 
                                                                                  border-radius: 5px; 
                                                                                  cursor: pointer;
                                                                                  text-align: center;
                                                                                  line-height: 24px;
                                                                                  font-weight: 600;
                                                                                  color: {{ $index == 0 ? '#fff' : '#000' }};
                                                                                  transition: all 0.3s ease;">
                                                                        {{ $size }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <div class="alert alert-warning">
                                                <i class="fa fa-exclamation-triangle"></i> Sản phẩm hiện không có biến thể khả dụng.
                                            </div>
                                        @endif
                                        
                                        <div class="selector-actions">
                                            <div class="quantity-area clearfix">
                                                <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                                                <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
                                                <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                                            </div>
                                            <div class="wrap-addcart clearfix">
                                                <div class="row-flex">
                                                    <button type="button" class="button btn-addtocart addtocart-modal" {{ $colors->count() == 0 && $sizes->count() == 0 ? 'disabled' : '' }}>
                                                        Thêm vào
                                                    </button>
                                                    <button type="button" class="buy-now button" style="display: block;" {{ $colors->count() == 0 && $sizes->count() == 0 ? 'disabled' : '' }}>
                                                        Mua ngay
                                                    </button>
                                                </div>
                                                <a href="#" target="_blank" class="button btn-check" style="color: #ffffff;text-decoration:none;">
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

<script>
let priceData = {};

document.addEventListener('DOMContentLoaded', function() {
    // Load dữ liệu giá
    const priceInput = document.getElementById('price-data');
    if (priceInput) {
        try {
            priceData = JSON.parse(priceInput.value);
        } catch(e) {
            console.error('Lỗi parse price data:', e);
        }
    }
});

function updatePriceFromColor(color) {
    // Reset style cho tất cả màu
    document.querySelectorAll('.color-option label').forEach(label => {
        label.style.border = '2px solid #ddd';
        label.style.transform = 'scale(1)';
    });
    
    // Thêm style cho màu được chọn
    const selectedOption = document.querySelector(`.color-option[data-color="${color}"] label`);
    if (selectedOption) {
        selectedOption.style.border = '3px solid #007bff';
        selectedOption.style.transform = 'scale(1.1)';
    }
    
    updatePrice();
}

function updatePriceFromSize(size) {
    // Reset style cho tất cả size
    document.querySelectorAll('.size-option label').forEach(label => {
        label.style.backgroundColor = '#fff';
        label.style.borderColor = '#ddd';
        label.style.color = '#000';
    });
    
    // Thêm style cho size được chọn
    const selectedOption = document.querySelector(`.size-option[data-size="${size}"] label`);
    if (selectedOption) {
        selectedOption.style.backgroundColor = '#007bff';
        selectedOption.style.borderColor = '#007bff';
        selectedOption.style.color = '#fff';
    }
    
    updatePrice();
}

function updatePrice() {
    const colorInput = document.querySelector('input[name="color"]:checked');
    const sizeInput = document.querySelector('input[name="size"]:checked');
    
    const color = colorInput ? colorInput.value : null;
    const size = sizeInput ? sizeInput.value : null;
    
    let price = null;
    
    // Ưu tiên tìm giá theo màu + size
    if (color && size) {
        const key = color + '_' + size;
        price = priceData[key];
    }
    
    // Nếu không tìm thấy, lấy giá theo màu
    if (!price && color) {
        price = priceData[color];
    }
    
    // Cập nhật giá hiển thị
    const priceElement = document.querySelector('#price-preview .pro-price');
    if (priceElement) {
        if (price) {
            const formattedPrice = new Intl.NumberFormat('vi-VN').format(price);
            priceElement.textContent = formattedPrice + '₫';
            priceElement.setAttribute('data-price', price);
        } else {
            priceElement.textContent = 'Liên hệ';
        }
    }
}

function minusQuantity() {
    const input = document.getElementById('quantity');
    let value = parseInt(input.value) || 1;
    if (value > 1) {
        input.value = value - 1;
    }
}

function plusQuantity() {
    const input = document.getElementById('quantity');
    let value = parseInt(input.value) || 1;
    input.value = value + 1;
}
</script>

<style>
    .color-option label:hover {
        transform: scale(1.15) !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    
    .size-option label:hover {
        border-color: #007bff !important;
        color: #007bff !important;
    }
</style>