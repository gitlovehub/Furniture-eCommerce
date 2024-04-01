<?php

function categories() {
    $js           = BASE_URL.'assets/js/range.js';
    $css          = BASE_URL.'assets/css/range.css';
    $titleBar     = 'Categories';
    $view         = 'category/categories';
    $listCategory = getStatusActive('tbl_categories');
    $listProducts = getStatusActive('tbl_products');

    usort($listProducts, function ($a, $b) {
        return $b['discount'] - $a['discount'];
    });

    require_once PATH_VIEW . 'layouts/master.php';
}

function categoryMenu($id) {
    $js           = '';
    $titleBar     = 'Category Menu';
    $listCategory = getStatusActive('tbl_categories');
    
    // Lấy danh sách sản phẩm thuộc danh mục đã chọn (nếu có)
    $listProducts = [];
    if ($id !== null) {
        $view = 'category/menu';
        $listProducts =getProductsByCategoryId($id);
    } else {
        // Nếu không có danh mục được chọn, hiển thị tất cả các sản phẩm
        $view = 'category/categories';
        $listProducts = getStatusActive('tbl_products');
    }

    usort($listProducts, function ($a, $b) {
        return $b['discount'] - $a['discount'];
    });

    require_once PATH_VIEW . 'layouts/master.php';
}

function filterPrice() {
    $js           = BASE_URL.'assets/js/range.js';
    $css          = BASE_URL.'assets/css/range.css';
    $titleBar     = 'Categories';
    $view         = 'category/categories';
    $listCategory = getStatusActive('tbl_categories');
    $listProducts = getStatusActive('tbl_products');

    if (isset($_POST['btnRange'])) {
        $minPrice = isset($_POST["min"]) ? intval($_POST["min"]) : 0;
        $maxPrice = isset($_POST["max"]) ? intval($_POST["max"]) : 0;
        $listProducts = searchProductsByPrice($minPrice, $maxPrice);
    }

    usort($listProducts, function ($a, $b) {
        return $a['price'] - $b['price'];
    });

    require_once PATH_VIEW . 'layouts/master.php';
}