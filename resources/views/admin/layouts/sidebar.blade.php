<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" style="height:60px; max-width:180px;">
                </a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <li class="sidebar-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="bi bi-house-door-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ Route::is('admin.users.index') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                    <i class="bi bi-people-fill"></i>
                    <span>Người dùng</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-bag-fill"></i>
                    <span>Đơn hàng</span>
                </a>
            </li>
            <li class="sidebar-item{{ Route::is('admin.categories.*') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}" class="sidebar-link">
                    <i class="bi bi-tags-fill"></i>
                    <span>Danh mục</span>
                </a>
            </li>
            <li class="sidebar-item{{ Route::is('admin.brands.*') ? 'active' : '' }}">
                <a href="{{ route('admin.brands.index') }}" class="sidebar-link">
                    <i class="bi bi-star-fill"></i>
                    <span>Thương hiệu</span>
                </a>
            </li>
            <li class="sidebar-item {{ Route::is('admin.products.index') ? 'active' : '' }}">
                <a href="{{ route('admin.products.index') }}" class="sidebar-link">
                    <i class="bi bi-box-seam"></i>
                    <span>Sản phẩm</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Bài viết</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-image"></i>
                    <span>Banner</span>
                </a>
            </li>
            <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="sidebar-link btn btn-link p-0" style="color: inherit; text-align: left; width: 100%;">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>