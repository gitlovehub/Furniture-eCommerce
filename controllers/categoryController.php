<?php

function categories() {
    $js = '';
    $view = 'category/categories';
    $listCategory = selectStatusActive('tbl_categories');
    $listProducts = selectStatusActive('tbl_products');
    usort($listProducts, function ($a, $b) {
        return $b['view'] - $a['view'];
    });
    require_once PATH_VIEW . 'layouts/master.php';
}

function categoryFilter($id) {
    $js = '';
    $view = 'category/categoryFilter';
    $listCategory = selectStatusActive('tbl_categories');
    
    // Lấy danh sách sản phẩm thuộc danh mục đã chọn (nếu có)
    $selectedProduct = [];
    if ($id !== null) {
        $view = 'category/categoryFilter';
        $selectedProduct = selectProductsByCategoryId($id);
    } else {
        // Nếu không có danh mục được chọn, hiển thị tất cả các sản phẩm
        $view = 'category/categories';
        $listProducts = selectStatusActive('tbl_products');
    }
    require_once PATH_VIEW . 'layouts/master.php';
}
