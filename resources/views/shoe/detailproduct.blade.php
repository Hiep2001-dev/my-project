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
                                            
                                        // Tạo mảng giá theo màu và size
                                        $priceData = [];
                                        $colorSizeMap = []; // Map màu -> danh sách size
                                        
                                        foreach($product->variations->where('trang_thai', 'hien') as $v) {
                                            $key = $v->mau_sac . '_' . $v->size_eu;
                                            $priceData[$key] = $v->gia_ban;
                                            
                                            // Thêm size vào danh sách của màu
                                            if (!isset($colorSizeMap[$v->mau_sac])) {
                                                $colorSizeMap[$v->mau_sac] = [];
                                            }
                                            if (!in_array($v->size_eu, $colorSizeMap[$v->mau_sac])) {
                                                $colorSizeMap[$v->mau_sac][] = $v->size_eu;
                                            }
                                            
                                            // Giá theo màu (lấy variation đầu tiên của màu đó)
                                            if (!isset($priceData[$v->mau_sac])) {
                                                $priceData[$v->mau_sac] = $v->gia_ban;
                                            }
                                        }
                                        
                                        // Giá mặc định
                                        $firstColor = $colors->first();
                                        $firstSize = $colorSizeMap[$firstColor][0] ?? null;
                                        $defaultPrice = $priceData[$firstColor . '_' . $firstSize] ?? $priceData[$firstColor] ?? null;
                                    @endphp
                                    
                                    <div class="product-price" id="price-preview">
                                        <span class="pro-price" data-price="{{ $defaultPrice }}">
                                            {{ $defaultPrice ? number_format($defaultPrice, 0, ',', '.') : 'Liên hệ' }}₫
                                        </span>
                                    </div>

                                    {{-- Hidden input chứa dữ liệu giá và size theo màu --}}
                                    <input type="hidden" id="price-data" value='@json($priceData)'>
                                    <input type="hidden" id="color-size-map" value='@json($colorSizeMap)'>

                                    {{-- Thay thế phần form --}}
                                    <form id="add-item-form" action="{{ route('cart.add') }}" method="POST" class="variants clearfix">
                                        @csrf
                                        {{-- Hidden inputs để gửi dữ liệu --}}
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" id="cart-color" name="color" value="{{ $firstColor }}">
                                        <input type="hidden" id="cart-size" name="size" value="{{ $firstSize }}">
                                        <input type="hidden" id="cart-price" name="price" value="{{ $defaultPrice }}">
                                        
                                        @if($colors->count() > 0)
                                            <div class="select clearfix" style="display: block !important;">
                                                {{-- Phần màu sắc --}}
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
                                                
                                                {{-- Phần kích thước --}}
                                                <div class="selector-wrapper" style="display: block !important; margin-bottom: 20px;">
                                                    <label style="color: #000; font-weight: 600; display: block; margin-bottom: 10px;">
                                                        <i class="fa fa-ruler" style="margin-right: 8px;"></i>
                                                        Kích thước
                                                    </label>
                                                    <div id="size-filter" class="size-filter" style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                        {{-- Size sẽ được render bằng JS --}}
                                                    </div>
                                                </div>
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
                                            {{-- Đặt ngoài form add-item-form --}}
                                            <form id="buy-now-form" action="{{ route('cart.checkout') }}" method="GET" style="display:none;">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="color" id="buy-now-color" value="{{ $firstColor }}">
                                                <input type="hidden" name="size" id="buy-now-size" value="{{ $firstSize }}">
                                                <input type="hidden" name="price" id="buy-now-price" value="{{ $defaultPrice }}">
                                                <input type="hidden" name="quantity" id="buy-now-quantity" value="1">
                                            </form>
                                            <div class="wrap-addcart clearfix">
                                                <div class="row-flex">
                                                    <button type="submit" class="button btn-addtocart addtocart-modal" {{ $colors->count() == 0 ? 'disabled' : '' }}>
                                                        Thêm vào giỏ
                                                    </button>
                                                    <button type="button" class="buy-now button" style="display: block;" {{ $colors->count() == 0 ? 'disabled' : '' }} onclick="submitBuyNowForm()">
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
let colorSizeMap = {};

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded');
    
    // Load dữ liệu giá
    const priceInput = document.getElementById('price-data');
    if (priceInput) {
        try {
            priceData = JSON.parse(priceInput.value);
            console.log('Price data:', priceData);
        } catch(e) {
            console.error('Lỗi parse price data:', e);
        }
    }
    
    // Load dữ liệu size theo màu
    const colorSizeInput = document.getElementById('color-size-map');
    if (colorSizeInput) {
        try {
            colorSizeMap = JSON.parse(colorSizeInput.value);
            console.log('Color-Size Map:', colorSizeMap);
        } catch(e) {
            console.error('Lỗi parse color-size map:', e);
        }
    }
    
    // Render size ban đầu cho màu đầu tiên
    const firstColor = document.querySelector('input[name="color"]:checked');
    if (firstColor) {
        renderSizesForColor(firstColor.value);
    }
    
    // Khởi tạo giá trị ban đầu cho hidden inputs
    updateCartInputs();
    
    // Xử lý submit form
    const form = document.getElementById('add-item-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            updateCartInputs();
            
            const color = document.getElementById('cart-color').value;
            const size = document.getElementById('cart-size').value;
            const price = document.getElementById('cart-price').value;
            
            if (!color || !size) {
                e.preventDefault();
                alert('Vui lòng chọn màu sắc và kích thước!');
                return false;
            }
            
            if (!price) {
                e.preventDefault();
                alert('Không tìm thấy giá cho sản phẩm này!');
                return false;
            }
            
            console.log('Submitting to cart:', {
                color: color,
                size: size,
                price: price,
                quantity: document.getElementById('quantity').value
            });
        });
    }
});

function renderSizesForColor(color) {
    const sizeContainer = document.getElementById('size-filter');
    if (!sizeContainer) {
        console.error('Size container not found!');
        return;
    }
    
    // Lấy danh sách size của màu này
    const sizes = colorSizeMap[color] || [];
    console.log('Rendering sizes for color', color, ':', sizes);
    
    // Xóa tất cả size cũ
    sizeContainer.innerHTML = '';
    
    if (sizes.length === 0) {
        sizeContainer.innerHTML = '<p style="color: #999;">Không có size khả dụng cho màu này</p>';
        return;
    }
    
    // Render lại các size mới
    sizes.forEach((size, index) => {
        const sizeDiv = document.createElement('div');
        sizeDiv.className = 'size-option';
        sizeDiv.setAttribute('data-size', size);
        
        const input = document.createElement('input');
        input.type = 'radio';
        input.name = 'size';
        input.id = 'size-' + color + '-' + index;
        input.value = size;
        input.checked = index === 0;
        input.style.display = 'none';
        input.onchange = function() { updatePriceFromSize(size); };
        
        const label = document.createElement('label');
        label.setAttribute('for', 'size-' + color + '-' + index);
        label.textContent = size;
        label.style.cssText = `
            display: block; 
            min-width: 50px; 
            height: 40px; 
            padding: 8px 15px;
            background-color: ${index === 0 ? '#007bff' : '#fff'}; 
            border: 2px solid ${index === 0 ? '#007bff' : '#ddd'}; 
            border-radius: 5px; 
            cursor: pointer;
            text-align: center;
            line-height: 24px;
            font-weight: 600;
            color: ${index === 0 ? '#fff' : '#000'};
            transition: all 0.3s ease;
        `;
        
        sizeDiv.appendChild(input);
        sizeDiv.appendChild(label);
        sizeContainer.appendChild(sizeDiv);
    });
    
    // Cập nhật giá sau khi render size
    if (sizes.length > 0) {
        updatePriceFromSize(sizes[0]);
    }
}

function updatePriceFromColor(color) {
    console.log('Color changed to:', color);
    
    // Reset style cho tất cả màu
    document.querySelectorAll('.color-option label').forEach(label => {
        label.style.border = '2px solid #ddd';
        label.style.transform = 'scale(1)';
        label.style.boxShadow = 'none';
    });
    
    // Thêm style cho màu được chọn với hiệu ứng sáng
    const selectedOption = document.querySelector(`.color-option[data-color="${color}"] label`);
    if (selectedOption) {
        selectedOption.style.border = '3px solid #007bff';
        selectedOption.style.transform = 'scale(1.1)';
        selectedOption.style.boxShadow = '0 0 15px rgba(0, 123, 255, 0.6)';
        
        selectedOption.style.animation = 'pulse 0.4s ease-out';
        setTimeout(() => {
            selectedOption.style.animation = '';
        }, 400);
    }
    
    // Render lại size theo màu vừa chọn
    renderSizesForColor(color);
    
    updateCartInputs();
}

function updatePriceFromSize(size) {
    console.log('Size changed to:', size);
    
    // Reset style cho tất cả size
    document.querySelectorAll('.size-option label').forEach(label => {
        label.style.backgroundColor = '#fff';
        label.style.borderColor = '#ddd';
        label.style.color = '#000';
        label.style.boxShadow = 'none';
    });
    
    // Thêm style cho size được chọn với hiệu ứng sáng
    const selectedOption = document.querySelector(`.size-option[data-size="${size}"] label`);
    if (selectedOption) {
        selectedOption.style.backgroundColor = '#007bff';
        selectedOption.style.borderColor = '#007bff';
        selectedOption.style.color = '#fff';
        selectedOption.style.boxShadow = '0 0 15px rgba(0, 123, 255, 0.6)';
        
        selectedOption.style.animation = 'pulse 0.4s ease-out';
        setTimeout(() => {
            selectedOption.style.animation = '';
        }, 400);
    }
    
    updatePrice();
    updateCartInputs();
}

function updatePrice() {
    const colorInput = document.querySelector('input[name="color"]:checked');
    const sizeInput = document.querySelector('input[name="size"]:checked');
    
    const color = colorInput ? colorInput.value : null;
    const size = sizeInput ? sizeInput.value : null;
    
    console.log('Updating price for:', { color, size });
    
    let price = null;
    
    // Ưu tiên tìm giá theo màu + size
    if (color && size) {
        const key = color + '_' + size;
        price = priceData[key];
        console.log('Price key:', key, '=> Price:', price);
    }
    
    // Nếu không tìm thấy, lấy giá theo màu
    if (!price && color) {
        price = priceData[color];
        console.log('Fallback to color price:', price);
    }
    
    // Cập nhật giá hiển thị với hiệu ứng
    const priceElement = document.querySelector('#price-preview .pro-price');
    if (priceElement) {
        if (price) {
            const formattedPrice = new Intl.NumberFormat('vi-VN').format(price);
            
            priceElement.style.animation = 'priceChange 0.5s ease-out';
            setTimeout(() => {
                priceElement.style.animation = '';
            }, 500);
            
            priceElement.textContent = formattedPrice + '₫';
            priceElement.setAttribute('data-price', price);
        } else {
            priceElement.textContent = 'Liên hệ';
            priceElement.setAttribute('data-price', '');
        }
    }
}

function updateCartInputs() {
    const colorInput = document.querySelector('input[name="color"]:checked');
    const sizeInput = document.querySelector('input[name="size"]:checked');
    const priceElement = document.querySelector('#price-preview .pro-price');
    
    const cartColor = document.getElementById('cart-color');
    const cartSize = document.getElementById('cart-size');
    const cartPrice = document.getElementById('cart-price');
    
    if (cartColor && colorInput) {
        cartColor.value = colorInput.value;
    }
    if (cartSize && sizeInput) {
        cartSize.value = sizeInput.value;
    }
    if (cartPrice && priceElement) {
        cartPrice.value = priceElement.getAttribute('data-price') || '';
    }
    
    console.log('Cart inputs updated:', {
        color: cartColor?.value,
        size: cartSize?.value,
        price: cartPrice?.value
    });
}

function minusQuantity() {
    const input = document.getElementById('quantity');
    let value = parseInt(input.value) || 1;
    if (value > 1) {
        input.value = value - 1;
        
        const btn = event.target;
        btn.style.transform = 'scale(0.9)';
        setTimeout(() => {
            btn.style.transform = 'scale(1)';
        }, 100);
    }
}

function plusQuantity() {
    const input = document.getElementById('quantity');
    let value = parseInt(input.value) || 1;
    input.value = value + 1;
    
    const btn = event.target;
    btn.style.transform = 'scale(0.9)';
    setTimeout(() => {
        btn.style.transform = 'scale(1)';
    }, 100);
}

function submitBuyNowForm() {
    // Cập nhật lại giá trị trước khi submit
    document.getElementById('buy-now-color').value = document.querySelector('input[name="color"]:checked')?.value || '';
    document.getElementById('buy-now-size').value = document.querySelector('input[name="size"]:checked')?.value || '';
    document.getElementById('buy-now-price').value = document.querySelector('#price-preview .pro-price')?.getAttribute('data-price') || '';
    document.getElementById('buy-now-quantity').value = document.getElementById('quantity')?.value || 1;
    document.getElementById('buy-now-form').submit();
}
</script>

<style>
    .color-option label:hover {
        transform: scale(1.15) !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3) !important;
    }
    
    .size-option label:hover {
        border-color: #007bff !important;
        color: #007bff !important;
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.4) !important;
    }
    
    .qty-btn {
        transition: all 0.2s ease !important;
    }
    
    .qty-btn:active {
        transform: scale(0.9) !important;
    }
    
    /* Animation hiệu ứng sáng lên khi click */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 rgba(0, 123, 255, 0.7);
        }
        50% {
            box-shadow: 0 0 25px rgba(0, 123, 255, 0.9);
        }
        100% {
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.6);
        }
    }
    
    @keyframes priceChange {
        0% {
            opacity: 0.5;
            transform: scale(0.95);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>