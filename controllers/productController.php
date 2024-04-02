<?php

function searchProduct() {
    $titleBar     = 'Searching';
    $view         = 'product/search';
    $listProducts = getStatusActive('tbl_products');

    if (isset($_POST['btnSearch'])) {
        $kw = $_POST["keyword"];
        $_SESSION["search_keyword"] = $kw;
    } elseif (isset($_SESSION["search_keyword"])) {
        // Retrieve the search keyword from session if it exists
        $kw = $_SESSION["search_keyword"];
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

    usort($listProducts, function ($a, $b) {
        return $b['discount'] - $a['discount'];
    });

    require_once PATH_VIEW . 'layouts/master.php';
}

function noSearchResult() {
    require_once PATH_VIEW . 'product/no-search-result.php';
}

function productDetail($id) {
    $js       = BASE_URL . 'assets/js/slider.js';
    $titleBar = 'Product Page';
    $view     = 'product/detail';
    $item     = selectOne('tbl_products', $id);
    $gallery  = getVariants('tbl_gallery', $id);
    $colors   = getVariants('tbl_colors', $id);

    $cost      = $item['price'];
    $discount  = $item['discount'];
    // Tính toán giá sau khi được giảm giá
    $sale = $cost - ($cost * $discount / 100);
    $cate = $item['id_category'];
    $sameCate = getProductsByCategoryId($cate);

    // Loại bỏ sản phẩm hiện tại khỏi mảng
    foreach ($sameCate as $key => $product) {
        if ($product['id'] == $id) {
            unset($sameCate[$key]);
        }
    }

    usort($sameCate, function ($a, $b) {
        return $b['discount'] - $a['discount'];
    });

    require_once PATH_VIEW . 'layouts/master.php';
}