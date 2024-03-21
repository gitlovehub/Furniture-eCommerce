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
            "name_category" => $_POST["categoryName"] ?? null,
        ];

        // Validate
        $errors = validate($data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["data"]   = $data ;
            header('Location: ?act=add-category');
            exit();
        }

        insert('tbl_categories', $data);
        $_SESSION["success"]='';
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
            "name_category" => $_POST["categoryName"] ?? null,
        ];

        // Validate
        $errors = validate($data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["data"]   = $data ;
            header('Location: ?act=update-category&id=' . $id);
            exit();
        }

        update('tbl_categories', $id, $data);
        // Lỗi không nhận được thông báo
        $_SESSION["success"]='';
        header('Location: ?act=update-category&id=' . $id);
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function deleteCategory($id) {
    delete('tbl_categories', $id);
    $_SESSION["success"]='';
    header('Location: ?act=category-list');
    exit();
}

function validate($data) {
    $errors = [];
    if (empty($data['name_category'])) {
        $errors[] = 'This field is required.';
    } elseif (strlen($data['name_category']) > 50) {
        $errors[] = 'Please enter between 1 and 50 characters.';
    }
    return $errors;
}