<?php
session_start();

require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

// Điều hướng
$act = $_GET["act"] ?? '/';

// Kiểm tra xem admin đã đăng nhập chưa
middleware_auth_check($act);

match ($act) {
    '/'         => dashboard(),
    'dashboard' => dashboard(),

    // Authentication
    'login'     => authLogin(),
    'logout'    => authLogout(),

    // CRU Banner
    'banner-list'            => bannerList(),
    'update-banner'          => updateBanner($_GET["id"]),

    // CRUD Category
    'create-category'        => createCategory(),
    'category-list'          => CategoryList(),
    'update-category'        => updateCategory($_GET["id"]),
    'delete-category'        => deleteCategory($_GET["id"]),
    'category-bin'           => categoryBin(),
    'update-status-category' => updateStatusCategory($_GET["id"], $_GET["value"]),

    // CRU Product
    'create-product'         => createProduct(),
    'product-list'           => productList(),
    'update-product'         => updateProduct($_GET["id"]),
    'product-bin'            => productBin(),
    'update-status-product'  => updateStatusProduct($_GET["id"], $_GET["value"]),

    // Variants
    'add-gallery'            => addGallery($_GET["id"]),
    'delete-image'           => deleteImage($_GET["id"], $_GET["product"]),
    'add-color-product'      => addColor($_GET["id"]),
    'delete-color'           => deleteColor($_GET["id"], $_GET["product"]),
    
    // Review
    'manage-reviews'         => manageReviews(),
    'delete-review'          => deleteReview($_GET["id"]),
    'update-status-review'  => updateStatusReview($_GET["id"], $_GET["value"]),

    // Account
    'admin-list'             => adminList(),
    'customer-list'          => customerList(),
    'customer-bin'           => customerBin(),
    'update-status-customer' => updateCustomerStatus($_GET["id"], $_GET["value"]),

    // Order
    'order-list'             => orderList(),
    'order-details'          => orderDetails($_GET["id"]),
    'update-order'           => updateOrder($_GET["id"]),

    // Contact
    'contact'                => contact(),


};

require_once '../commons/disconnect-db.php';
?>