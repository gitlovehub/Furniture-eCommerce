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

middleware_auth_checkLogin($act);

match ($act) {
    '/'          => index(),
    'home-page'  => index(),

    // Auth
    'login'            => login(),
    'register'         => register(),
    'verify-email'     => verifyEmail($_GET["token"]),
    'waiting-page'     => waitingPage(),
    'verified'         => verified(),
    'logout'           => logout(),

    // Acc
    'settings'         => settings(),
    'setting-info'     => settingInfo(),
    'setting-address'  => settingAddress(),


    // Cate
    'categories'       => categories(),
    'category-menu'    => categoryMenu($_GET["id"]),
    'filter-price'     => filterPrice(),

    // Product
    'search-product'   => searchProduct(),
    'product-detail'   => productDetail($_GET["id"]),
    'add-to-cart'      => addToCart($_GET["id"]),
    'delete-cart-item' => deleteItem($_GET["id"]),
};

require_once './commons/disconnect-db.php';