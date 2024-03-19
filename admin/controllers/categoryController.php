<?php

function categoryList() {
    $titleBar = 'Categories';
    $view     = 'category/category-list';
    $list     = selectAll('tbl_categories', 'id_category');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function addCategory() {
    $titleBar = 'Categories';
    $view     = 'category/category-create';
    
    if (!empty($_POST)) {
        $data = [
            "name_category" => $_POST["categoryName"],
        ];
        insert('tbl_categories', $data);
        session_start();
        $_SESSION['success']='';
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}