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
        $errors = validateCreate($data);
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
        $errors = validateUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            header('Location: ?act=update-category&id=' . $id);
            exit();
        } else {
            update('tbl_categories', $id, $data);
            $_SESSION["success"]='';
        }

        header('Location: ?act=update-category&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function deleteCategory($id) {
    delete('tbl_categories', $id);
    $_SESSION["success"]='';
    header('Location: ?act=category-list');
    exit();
}

function validateCreate($data) {
    $errors = [];
    if (empty($data['name_category'])) {
        $errors[] = 'This field is required.';
    } elseif (strlen($data['name_category']) > 50) {
        $errors[] = 'Please enter between 1 and 50 characters.';
    } elseif (!checkUniqueForCreate($data['name_category'])) {
        $errors[] = 'The entered data is a duplicate.';
    }
    return $errors;
}

function validateUpdate($id, $data) {
    $errors = [];
    if (empty($data['name_category'])) {
        $errors[] = 'This field is required.';
    } elseif (strlen($data['name_category']) > 50) {
        $errors[] = 'Please enter between 1 and 50 characters.';
    } elseif (!checkUniqueForUpdate($id, $data['name_category'])) {
        $errors[] = 'The entered data is a duplicate.';
    }
    return $errors;
}