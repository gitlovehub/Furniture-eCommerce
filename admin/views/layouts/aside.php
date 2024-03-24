<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="?act=dashboard" class="app-brand-link">
            <span class="app-brand-logo">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FF0000" width="50px" height="50px" viewBox="0 0 32 32">
                    <path d="M16 7.151l3.302-4.036c0 0 5.656 0.12 11.292 2.74-1.443 2.182-4.307 3.25-4.307 3.25-0.193-1.917-1.536-2.385-5.807-2.385l-4.479 25.281-4.51-25.286c-4.24 0-5.583 0.469-5.776 2.385 0 0-2.865-1.057-4.307-3.24 5.635-2.62 11.292-2.74 11.292-2.74l3.302 4.031h-0.005zM16 1.953c4.552-0.042 9.766 0.703 15.104 3.036 0.714-1.292 0.896-1.859 0.896-1.859-5.833-2.313-11.297-3.109-16-3.13-4.703 0.021-10.167 0.813-16 3.13 0 0 0.26 0.703 0.896 1.865 5.339-2.344 10.552-3.083 15.104-3.047z" />
                </svg>
            </span>
            <span class="app-brand-text fs-2 menu-text fw-bold ms-2">Admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item py-1">
            <a href="?act=dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <span>Dashboards</span>
            </a>
        </li>

        <!-- Categories -->
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <span>Categories</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="?act=create-category" class="menu-link">
                        <span>Add Category</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?act=category-list" class="menu-link">
                        <span>Category List</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Products -->
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <span>Products</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="?act=create-product" class="menu-link">
                        <span>Add Product</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?act=product-list" class="menu-link">
                        <span>Product List</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Accounts -->
        <li class="menu-item py-1">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <span>Accounts</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="?act=admin-list" class="menu-link">
                        <span>Admin</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?act=customer-list" class="menu-link">
                        <span>Customers</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Reviews -->
        <li class="menu-item py-1">
            <a href="?act=manage-reviews" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-dots"></i>
                <span>Reviews</span>
            </a>
        </li>

        <!-- Order -->
        <li class="menu-item py-1">
            <a href="?act=order-list" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <span>Order</span>
            </a>
        </li>        

    </ul>
</aside>