<?php

function categoryList() {
    $titleBar = 'Categories';
    $view     = 'category/category-list';
    $list     = selectAll('tbl_categories');
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

function updateCategory($id) {

    $show = selectOne('tbl_categories', $id);

    if (empty($show)) {
        page404();
    }

    $titleBar = 'Categories';
    $view     = 'category/category-update';
    
    if (!empty($_POST)) {
        $data = [
            "name_category" => $_POST["categoryName"],
        ];
        update('tbl_categories', $id, $data);
        header('Location: ?act=update-category&id=' . $id);
        // Lỗi không nhận được thông báo
        session_start();
        $_SESSION['success']='';
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function deleteCategory($id) {
    delete('tbl_categories', $id);
    header('Location: ?act=category-list');
    exit();
}