<?php

function searchProduct() {
    $titleBar     = 'Searching';
    $view         = 'product/search';
    $listProducts = selectStatusActive('tbl_products');

    if (isset($_POST['btnSearch'])) {
        $kw = $_POST["keyword"];
        $_SESSION['search_keyword'] = $kw;
    } elseif (isset($_SESSION['search_keyword'])) {
        // Retrieve the search keyword from session if it exists
        $kw = $_SESSION['search_keyword'];
    } else {
        // Default keyword or no keyword
        $kw = '';
        header('Location: ?act=categories');
        exit;
    }

    if (!empty($kw)) {
        $searchResults = searchProductsByName($kw);
        $listProducts = $searchResults;
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function noSearchResult() {
    require_once PATH_VIEW . 'product/no-search-result.php';
}

function productDetail($id) {
    $js       = BASE_URL.'assets/js/slider.js';
    $titleBar = 'Product Page';
    $view     = 'product/detail';
    $show     = selectOne('tbl_products', $id);
    $gallery  = getGallery('tbl_gallery', $id);

    $cate = $show['id_category'];
    $similarProducts = selectProductsByCategoryId($cate);

    // Loại bỏ sản phẩm hiện tại khỏi mảng $similarProducts
    foreach ($similarProducts as $key => $product) {
        if ($product['id'] == $id) {
            unset($similarProducts[$key]);
        }
    }

    require_once PATH_VIEW . 'layouts/master.php';
}