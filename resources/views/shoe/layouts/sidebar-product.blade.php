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
                                {{-- Size --}}
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
                                                    <li>
                                                        <input type="checkbox" id="size-35-{{ $cat->id }}">
                                                        <label for="size-35-{{ $cat->id }}">35</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="size-36-{{ $cat->id }}">
                                                        <label for="size-36-{{ $cat->id }}">36</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="size-37-{{ $cat->id }}">
                                                        <label for="size-37-{{ $cat->id }}">37</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="size-38-{{ $cat->id }}">
                                                        <label for="size-38-{{ $cat->id }}">38</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="size-39-{{ $cat->id }}">
                                                        <label for="size-39-{{ $cat->id }}">39</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="size-40-{{ $cat->id }}">
                                                        <label for="size-40-{{ $cat->id }}">40</label>
                                                    </li>
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
                                                    <li>
                                                        <input type="checkbox" id="color-red-{{ $cat->id }}">
                                                        <label for="color-red-{{ $cat->id }}" style="background-color: #fb4727"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-blue-{{ $cat->id }}">
                                                        <label for="color-blue-{{ $cat->id }}" style="background-color: #2a6fd1"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-green-{{ $cat->id }}">
                                                        <label for="color-green-{{ $cat->id }}" style="background-color: #28a745"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-yellow-{{ $cat->id }}">
                                                        <label for="color-yellow-{{ $cat->id }}" style="background-color: #ffc107"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-purple-{{ $cat->id }}">
                                                        <label for="color-purple-{{ $cat->id }}" style="background-color: #6f42c1"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-pink-{{ $cat->id }}">
                                                        <label for="color-pink-{{ $cat->id }}" style="background-color: #e83e8c"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-orange-{{ $cat->id }}">
                                                        <label for="color-orange-{{ $cat->id }}" style="background-color: #fd7e14"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-brown-{{ $cat->id }}">
                                                        <label for="color-brown-{{ $cat->id }}" style="background-color: #795548"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-black-{{ $cat->id }}">
                                                        <label for="color-black-{{ $cat->id }}" style="background-color: #343a40"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="color-white-{{ $cat->id }}">
                                                        <label for="color-white-{{ $cat->id }}" style="background-color: #ffffff"></label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                {{-- Thương hiệu --}}
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
                                                    <a href="{{ route('shoe.brand', $brand->id) }}" title="{{ $brand->ten }}">
                                                        @if($brand->logo)
                                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->ten }}" style="height:24px;max-width:60px;object-fit:contain;">
                                                        @endif
                                                        <span>{{ $brand->ten }}</span>
                                                    </a>
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