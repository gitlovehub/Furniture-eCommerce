<?php

function index() {
    $view          = 'home';
    $displayBanner  = selectStatusActive('tbl_banner');
    $displayProduct = selectStatusActive('tbl_products');
    require_once PATH_VIEW . 'layouts/master.php';
}
