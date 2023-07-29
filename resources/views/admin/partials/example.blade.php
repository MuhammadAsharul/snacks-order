<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Category</span>
</li>
<li class="menu-item {{ request()->is('admin/category') ? 'active' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Category</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ request()->is('admin/category') ? 'active' : '' }}">
            <a href="{{ route('admincategory') }}" class="menu-link">
                <div data-i18n="Account">All Category</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/add-category') ? 'active' : '' }}">
            <a href="{{ route('addcategory') }}" class="menu-link">
                <div data-i18n="Notifications">Add Category</div>
            </a>
        </li>
    </ul>
</li>
<!-- Product -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Product</span></li>

<!-- Product -->
<li class="menu-item {{ request()->is('admin/product') || request()->is('/admin/add-product') ? 'active' : '' }}">
    <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="User interface">Product</div>
    </a>
    <ul class="menu-sub">

        <li class="menu-item {{ request()->is('admin/product') ? 'active' : '' }}">
            <a href="{{ route('adminproduct') }}" class="menu-link">
                <div data-i18n="Tabs &amp; Pills">All Product</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/add-product') ? 'active' : '' }}">
            <a href="{{ route('addproduct') }}" class="menu-link ">
                <div data-i18n="Toasts">Add Product</div>
            </a>
        </li>

    </ul>
</li>
<!-- Order -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Order</span></li>
<!-- Forms -->
<li
    class="menu-item {{ request()->is('/admin/pending-orders') || request()->is('/admin/success-orders') ? 'active' : '' }} ? 'active' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Form Elements">Order</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ request()->is('admin/pending-orders') ? 'active' : '' }}">
            <a href="{{ route('pendingorder') }}" class="menu-link">
                <div data-i18n="Basic Inputs">Pending Order</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/success-orders') ? 'active' : '' }}">
            <a href="{{ route('successorder') }}" class="menu-link">
                <div data-i18n="Basic Inputs">Success Order</div>
            </a>
        </li>

    </ul>
</li>
