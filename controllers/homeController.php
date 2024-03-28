<?php

function index() {
    $js           = BASE_URL . 'assets/js/slider.js';
    $view         = 'home';
    $listBanner   = selectStatusActive('tbl_banner');
    $listProducts = selectStatusActive('tbl_products');
    
    // Sắp xếp theo số lượng tồn kho (instock)
    usort($listProducts, function ($a, $b) {
        return $a['instock'] - $b['instock'];
    });
    $bestSelling = array_slice($listProducts, 0, 8);
    
    // Sắp xếp theo số lượt xem (view)
    usort($listProducts, function ($a, $b) {
        return $b['view'] - $a['view'];
    });
    $topViews = array_slice($listProducts, 0, 15);

    require_once PATH_VIEW . 'layouts/master.php';
}