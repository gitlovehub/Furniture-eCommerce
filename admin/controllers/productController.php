<?php

function productList() {
    $titleBar = 'Products';
    $view     = 'product/product-list';
    $list     = getProducts();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productBin() {
    $titleBar = 'Products';
    $view     = 'product/product-bin';
    $list     = getProducts();
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function createProduct() {
    $titleBar = 'Products';
    $view     = 'product/product-create';
    $listCategory = selectStatusActive('tbl_categories');
    
    if (!empty($_POST)) {
        $data = [
            "id_category" => $_POST["productCategory"] ?? null,
            "name"        => $_POST["productName"] ?? null,
            "description" => $_POST["productDescription"] ?? null,
            "price"       => $_POST["productPrice"] ?? null,
            "discount"    => $_POST["productDiscount"] ?? null,
            "instock"     => $_POST["productInstock"] ?? null,
        ];

        // Xử lý file
        if ($_FILES['productThumbnail']['error'] === UPLOAD_ERR_OK) {
            $data['thumbnail'] = upload_file($_FILES['productThumbnail'], 'uploads/product/');
        }

        insert('tbl_products', $data);
        $_SESSION["success"]='';
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateProduct($id) {
    $show = selectOne('tbl_products', $id);

    if (empty($show)) {
        page404();
    }

    $titleBar = 'Products';
    $view     = 'product/product-update';
    $listCategory = selectStatusActive('tbl_categories');
    
    if (!empty($_POST)) {
        $data = [
            "id_category" => $_POST["productCategory"] ?? null,
            "name"        => $_POST["productName"] ?? null,
            "description" => $_POST["productDescription"] ?? null,
            "price"       => $_POST["productPrice"] ?? null,
            "discount"    => $_POST["productDiscount"] ?? null,
            "instock"     => $_POST["productInstock"] ?? null,
        ];

        // Xử lý file
        $img = $_FILES['productThumbnail'] ?? null;
        if ($img['error'] === UPLOAD_ERR_OK) { // Kiểm tra xem có lỗi khi upload không
            $data['thumbnail'] = upload_file($img, 'uploads/product/');
            // Xóa hình ảnh cũ nếu tồn tại
            if (!empty($_POST['img-current']) && file_exists(PATH_UPLOAD . $_POST['img-current'])) {
                unlink(PATH_UPLOAD . $_POST['img-current']);
            }
        } else {
            // Nếu người dùng không upload hình ảnh mới, giữ nguyên đường dẫn của hình ảnh hiện tại
            $data['thumbnail'] = $_POST['img-current'] ?? null;
        }

        update('tbl_products', $id, $data);
        $_SESSION["success"]='';

        header('Location: ?act=product-list');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateProductStatus($id, $value) {
    updateStatus('tbl_products', $id, $value);
    if ($value == 1) {
        header('Location: ?act=product-bin');
    } else {
        header('Location: ?act=product-list');
    }
    $_SESSION["success"]='';
    exit();
}

function addGallery($id) {
    $titleBar    = 'Products';
    $view        = 'product/product-gallery';
    $list        = getGallery('tbl_gallery', $id);
    $show        = selectOne('tbl_products', $id);

    if (isset($_POST['add'])) {

        $data = [
            "id_product" => $id ?? null,
        ];

        // Xử lý file
        if ($_FILES['productGallery']['error'] === UPLOAD_ERR_OK) {
            $data['url'] = upload_file($_FILES['productGallery'], 'uploads/product/');
        }

        insert('tbl_gallery', $data);
        $_SESSION["success"]='';
        header('Location: ?act=add-gallery&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function deleteImage($id, $back) {
    delete('tbl_gallery', $id);
    header('Location: ?act=add-gallery&id=' . $back);
    exit();
}