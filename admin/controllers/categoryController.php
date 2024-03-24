<?php

function categoryList() {
    $titleBar = 'Categories';
    $view     = 'category/category-list';
    $list     = selectStatusActive('tbl_categories');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryBin() {
    $titleBar = 'Categories';
    $view     = 'category/category-bin';
    $list     = selectStatusDeactivated('tbl_categories');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function createCategory() {
    $titleBar = 'Categories';
    $view     = 'category/category-create';
    
    if (!empty($_POST)) {
        $data = [
            "name" => $_POST["categoryName"] ?? null,
        ];

        // Validate
        $errors = validateCreate($data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["data"]   = $data ;
            header('Location: ?act=create-category');
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
            "name" => $_POST["categoryName"] ?? null,
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

        header('Location: ?act=category-list');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateCategoryStatus($id, $value) {
    updateStatus('tbl_categories', $id, $value);
    if ($value == 1) {
        header('Location: ?act=category-bin');
    } else {
        header('Location: ?act=category-list');
    }
    $_SESSION["success"]='';
    exit();
}

function deleteCategory($id) {
    delete('tbl_categories', $id);
    $_SESSION["success"]='';
    header('Location: ?act=category-bin');
    exit();
}

function validateCreate($data) {
    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'This field is required.';
    } elseif (strlen($data['name']) > 50) {
        $errors[] = 'Please enter between 1 and 50 characters.';
    } elseif (!checkUniqueForCreate($data['name'])) {
        $errors[] = 'The entered data is a duplicate.';
    }
    return $errors;
}

function validateUpdate($id, $data) {
    $errors = [];
    if (empty($data['name'])) {
        $errors[] = 'This field is required.';
    } elseif (strlen($data['name']) > 50) {
        $errors[] = 'Please enter between 1 and 50 characters.';
    } elseif (!checkUniqueForUpdate($id, $data['name'])) {
        $errors[] = 'The entered data is a duplicate.';
    }
    return $errors;
}