<?php

function bannerList() {
    $titleBar = 'Banner';
    $view     = 'banner/banner-list';
    $list     = getBanners();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function bannerBin() {
    $titleBar = 'Banner';
    $view     = 'banner/banner-bin';
    $list     = getBanners();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateBanner($id) {
    $show = selectOne('tbl_banner', $id);

    if (empty($show)) {
        page404();
    }

    $titleBar = 'Banner';
    $view     = 'banner/banner-update';
    $listCategory = getStatusActive('tbl_categories');
    
    if (isset($_POST['btnSave'])) {
        $data = [
            "id_category"  => $_POST["bannerCategory"] ?? null,
            "title"        => $_POST["bannerTitle"] ?? null,
        ];

        // Xử lý file
        $img = $_FILES['bannerImage'] ?? null;
        if ($img['error'] === UPLOAD_ERR_OK) { // Kiểm tra xem có lỗi khi upload không
            $data['image'] = upload_file($img, 'uploads/banner/');
            // Xóa hình ảnh cũ nếu tồn tại
            if (!empty($_POST['img-current']) && file_exists(PATH_UPLOAD . $_POST['img-current'])) {
                unlink(PATH_UPLOAD . $_POST['img-current']);
            }
        } else {
            // Nếu người dùng không upload hình ảnh mới, giữ nguyên đường dẫn của hình ảnh hiện tại
            $data['image'] = $_POST['img-current'] ?? null;
        }

        // Validate
        $errors = validateUpdateBanner($data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            header('Location: ?act=update-banner&id=' . $id);
            exit();
        } else {
            update('tbl_banner', $id, $data);
            $_SESSION["success"]='';
        }
        
        header('Location: ?act=banner-list');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateStatusBanner($id, $value) {
    updateStatus('tbl_banner', $id, $value);
    if ($value == 1) {
        header('Location: ?act=banner-bin');
    } else {
        header('Location: ?act=banner-list');
    }
    $_SESSION["success"]='';
    exit();
}

function validateUpdateBanner($data) {
    $errors = [];
    if (empty($data['title'])) {
        $errors['bannerTitle'] = 'This field is required.';
    } elseif (strlen($data['title']) > 50) {
        $errors['bannerTitle'] = 'Please enter between 1 and 50 characters.';
    }

    // Validate category ID
    if (empty($data['id_category'])) {
        $errors['bannerCategory'] = 'Please select a category.';
    } elseif (!is_numeric($data['id_category']) || $data['id_category'] <= 0) {
        $errors['bannerCategory'] = 'Invalid category ID.';
    }
    return $errors;
}