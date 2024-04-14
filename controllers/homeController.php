<?php

function index() {
    $js           = BASE_URL . 'assets/js/slider.js';
    $view         = 'home';
    $listBanner   = getStatusActive('tbl_banner');

    usort($listBanner, function ($a, $b) {
        return $a['grid'] - $b['grid'];
    });

    $listProducts = getStatusActive('tbl_products');
    
    // Sắp xếp theo discount % giảm dần
    usort($listProducts, function ($a, $b) {
        return $b['discount'] - $a['discount'];
    });
    $topDiscounts = array_slice($listProducts, 0, 8);
    
    // Sắp xếp theo số lượt xem (view)
    usort($listProducts, function ($a, $b) {
        return $b['view'] - $a['view'];
    });
    $topViews = array_slice($listProducts, 0, 15);

    require_once PATH_VIEW . 'layouts/master.php';
}

function contact() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Contact';
    $view     = 'contact';
    $list     = selectAll('tbl_contact');

    if (empty($list)) {
        page404();
    }

    require_once PATH_VIEW . 'layouts/master.php';
}