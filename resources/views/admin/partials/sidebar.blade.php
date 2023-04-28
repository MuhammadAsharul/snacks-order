<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/admin/dashboard" class="app-brand-link">
            <span class="app-brand-logo">
                <img src="{{ asset('dashboard/assets/img/favicon/logo.png') }}" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admindashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Category -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Category</span>
        </li>
        <li class="menu-item {{ request()->is('admin/category') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admincategory') }}" class="menu-link">
                        <div data-i18n="Account">All Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('addcategory') }}" class="menu-link">
                        <div data-i18n="Notifications">Add Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Product -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Product</span></li>

        <!-- Product -->
        <li class="menu-item {{ request()->is('admin/product') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Product</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="{{ route('adminproduct') }}" class="menu-link">
                        <div data-i18n="Tabs &amp; Pills">All Product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('addproduct') }}" class="menu-link">
                        <div data-i18n="Toasts">Add Product</div>
                    </a>
                </li>

            </ul>
        </li>
        <!-- Order -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Order</span></li>
        <!-- Forms -->
        <li class="menu-item {{ request()->is('admin/order') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Order</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('pendingorder') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Pending Order</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('successorder') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Success Order</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Rekap</span></li>
        <!-- Forms -->
        <li class="menu-item {{ request()->is('admin/order') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Rekap</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('cetak-order-form') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Cetak Rekap Penjualan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('cetak-product-form') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Cetak Rekap Product</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
