<?php
session_start();

require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';

// require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// Điều hướng
$act = $_GET["act"] ?? '/';

middleware_auth_checkClient($act);

match ($act) {
    '/'          => index(),
    'home-page'  => index(),

    // Auth
    'register'         => register(),
    'login'            => login(),
    'logout'           => logout(),
    'waiting-page'     => waitingPage(),
    'verify-email'     => verifyEmail($_GET["token"]),
    'verified'         => verified(),
    'forgot-password'  => forgotPassword(),
    'reset-password'   => resetPassword(),

    // Account
    'settings'         => settings(),
    'setting-info'     => settingInfo($_GET["id"]),
    'setting-address'  => settingAddress(),

    // Cate
    'categories'       => categories(),
    'category-menu'    => categoryMenu($_GET["id"]),
    'filter-price'     => filterPrice(),

    // Product
    'search-product'   => searchProduct(),
    'product-detail'   => productDetail($_GET["id"]),
    'add-to-cart'      => addToCart($_GET["id"]),
    'delete-cart-item' => deleteQuickCartItem($_GET["id"]),

    // Cart
    'review-cart'      => reviewCart(),
    'update-cart'      => updateCart($_POST["productQty"]),
    'remove-cart'      => removeCartItem($_GET["id"]),
    'checkout'         => checkout($_GET["user"]),

    // Order
    'place-order'      => placeOrder($_GET["id"]),
    'order-success'    => orderSuccess(),

};

require_once './commons/disconnect-db.php';