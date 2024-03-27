<?php

function index() {
    $js           = BASE_URL.'assets/js/home.js';
    $view         = 'home';
    $listBanner   = selectStatusActive('tbl_banner');
    $listProducts = selectStatusActive('tbl_products');
    usort($listProducts, function ($a, $b) {
        return $b['view'] - $a['view'];
    });
    $trendingProducts = array_slice($listProducts, 0, 15);
    require_once PATH_VIEW . 'layouts/master.php';
}
