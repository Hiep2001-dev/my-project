<div class="sidebar-page">
    <div class="group-menu">
        <div class="page_menu_title title_block">
            <h2>Danh mục sản phẩm</h2>
        </div>
        <div class="layered layered-category">
            <div class="layered-content">
                <ul class="menuList-links">
                    @foreach($categories as $cat)
                        @if($cat->cha_id)
                            <li>
                                @if(strtolower($cat->ten) === 'size' || strtolower($cat->ten) === 'kích thước')
                                    <a href="javascript:void(0)"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#collapseFilterSize{{ $cat->id }}"
                                       aria-expanded="false"
                                       aria-controls="collapseFilterSize{{ $cat->id }}">
                                        <span>{{ $cat->ten }}</span>
                                    </a>
                                    <div class="block_content collapse mt-2" id="collapseFilterSize{{ $cat->id }}">
                                        <div class="group-filter" aria-expanded="true">
                                            <div class="layered-content filter-size s-filter">
                                                <ul class="check-box-list clearfix">
                                                    @php
                                                        $availableSizes = \App\Models\ProductVariation::where('trang_thai', 'hien')
                                                            ->whereNotNull('size_eu')
                                                            ->pluck('size_eu')
                                                            ->unique()
                                                            ->sort()
                                                            ->values();
                                                    @endphp
                                                    @foreach($availableSizes as $size)
                                                        <li>
                                                            <input type="checkbox" 
                                                                   id="size-{{ $size }}-{{ $cat->id }}" 
                                                                   name="sizes[]" 
                                                                   value="{{ $size }}"
                                                                   class="filter-checkbox filter-size-checkbox"
                                                                   onchange="applyFilters()">
                                                            <label for="size-{{ $size }}-{{ $cat->id }}">{{ $size }}</label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                {{-- Màu sắc --}}
                                @elseif(strtolower($cat->ten) === 'màu sắc' || strtolower($cat->ten) === 'color')
                                    <a href="javascript:void(0)"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseFilterColor{{ $cat->id }}"
                                        aria-expanded="false"
                                        aria-controls="collapseFilterColor{{ $cat->id }}">
                                            <span>{{ $cat->ten }}</span>
                                    </a>
                                    <div class="block_content collapse mt-2" id="collapseFilterColor{{ $cat->id }}">
                                        <div class="group-filter" aria-expanded="true">
                                            <div class="layered-content filter-color s-filter">
                                                <ul class="check-box-list">
                                                    @php
                                                        $availableColors = \App\Models\ProductVariation::where('trang_thai', 'hien')
                                                            ->whereNotNull('mau_sac')
                                                            ->pluck('mau_sac')
                                                            ->unique()
                                                            ->values();
                                                        
                                                        $colorMap = [
                                                            'Đỏ' => '#fb4727',
                                                            'Xanh dương' => '#2a6fd1',
                                                            'Xanh lá' => '#28a745',
                                                            'Vàng' => '#ffc107',
                                                            'Tím' => '#6f42c1',
                                                            'Hồng' => '#e83e8c',
                                                            'Cam' => '#fd7e14',
                                                            'Nâu' => '#795548',
                                                            'Đen' => '#343a40',
                                                            'Trắng' => '#ffffff',
                                                            'Xám' => '#808080',
                                                            'Be' => '#F5F5DC',
                                                        ];
                                                    @endphp
                                                    @foreach($availableColors as $color)
                                                        @php
                                                            $colorCode = $colorMap[$color] ?? '#CCCCCC';
                                                            $colorSlug = \Illuminate\Support\Str::slug($color);
                                                        @endphp
                                                        <li>
                                                            <input type="checkbox" 
                                                                   id="color-{{ $colorSlug }}-{{ $cat->id }}" 
                                                                   name="colors[]" 
                                                                   value="{{ $color }}"
                                                                   class="filter-checkbox filter-color-checkbox"
                                                                   onchange="applyFilters()">
                                                            <label for="color-{{ $colorSlug }}-{{ $cat->id }}" 
                                                                   style="background-color: {{ $colorCode }}; 
                                                                          {{ $color == 'Trắng' ? 'border: 1px solid #ddd;' : '' }}"
                                                                   title="{{ $color }}"></label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @elseif(strtolower($cat->ten) === 'thương hiệu')
                                    <a href="javascript:void(0)"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseFilterBrand{{ $cat->id }}"
                                        aria-expanded="false"
                                        aria-controls="collapseFilterBrand{{ $cat->id }}">
                                            <span>{{ $cat->ten }}</span>
                                    </a>
                                    <div class="block_content collapse mt-2" id="collapseFilterBrand{{ $cat->id }}">
                                        <ul class="list-unstyled ms-3 mt-2">
                                            @foreach($brands as $brand)
                                                <li class="mb-2">
                                                    <input type="checkbox" 
                                                           id="brand-{{ $brand->id }}" 
                                                           name="brands[]" 
                                                           value="{{ $brand->id }}"
                                                           class="filter-checkbox filter-brand-checkbox"
                                                           onchange="applyFilters()">
                                                    <label for="brand-{{ $brand->id }}" style="cursor: pointer;">
                                                        @if($brand->logo)
                                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->ten }}" style="height:24px;max-width:60px;object-fit:contain;">
                                                        @endif
                                                        <span>{{ $brand->ten }}</span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('shoe.category', $cat->id) }}" title="{{ $cat->ten }}">
                                        <span>{{ $cat->ten }}</span>
                                    </a>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
function applyFilters() {
    // Lấy các giá trị đã chọn
    let selectedColors = [];
    let selectedSizes = [];
    let selectedBrands = [];
    
    document.querySelectorAll('.filter-color-checkbox:checked').forEach(cb => {
        selectedColors.push(cb.value);
    });
    
    document.querySelectorAll('.filter-size-checkbox:checked').forEach(cb => {
        selectedSizes.push(cb.value);
    });
    
    document.querySelectorAll('.filter-brand-checkbox:checked').forEach(cb => {
        selectedBrands.push(cb.value);
    });
    
    // Tạo URL với query parameters
    let url = new URL(window.location.href);
    url.searchParams.delete('colors[]');
    url.searchParams.delete('sizes[]');
    url.searchParams.delete('brands[]');
    
    selectedColors.forEach(color => url.searchParams.append('colors[]', color));
    selectedSizes.forEach(size => url.searchParams.append('sizes[]', size));
    selectedBrands.forEach(brand => url.searchParams.append('brands[]', brand));
    
    // Reload trang với bộ lọc mới
    window.location.href = url.toString();
}

function clearFilters() {
    // Bỏ chọn tất cả checkbox
    document.querySelectorAll('.filter-checkbox:checked').forEach(cb => {
        cb.checked = false;
    });
    
    // Reload trang không có filter
    let url = new URL(window.location.href);
    url.searchParams.delete('colors[]');
    url.searchParams.delete('sizes[]');
    url.searchParams.delete('brands[]');
    window.location.href = url.toString();
}

// Giữ trạng thái checkbox khi reload
document.addEventListener('DOMContentLoaded', function() {
    let url = new URL(window.location.href);
    
    // Restore colors
    url.searchParams.getAll('colors[]').forEach(color => {
        let checkbox = document.querySelector(`.filter-color-checkbox[value="${color}"]`);
        if (checkbox) checkbox.checked = true;
    });
    
    // Restore sizes
    url.searchParams.getAll('sizes[]').forEach(size => {
        let checkbox = document.querySelector(`.filter-size-checkbox[value="${size}"]`);
        if (checkbox) checkbox.checked = true;
    });
    
    // Restore brands
    url.searchParams.getAll('brands[]').forEach(brand => {
        let checkbox = document.querySelector(`.filter-brand-checkbox[value="${brand}"]`);
        if (checkbox) checkbox.checked = true;
    });
});
</script>