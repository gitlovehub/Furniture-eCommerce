<?php

require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';

// require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// Điều hướng
$act = $_GET["act"] ?? '/';

match ($act) {
    '/'          => index(),
    'home-page'  => index(),

    // Auth
    'login'    => login(),
    // 'register' => register(),

    // Cate
    'categories'      => categories(),
    'category-filter' => categoryFilter($_GET["id"]),

    // Product
    'search-product'   => searchProduct(),
    'product-detail'   => productDetail($_GET["id"]),
    
};

require_once './commons/disconnect-db.php';