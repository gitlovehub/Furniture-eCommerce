<?php

// Khai báo các hàm dùng Global
if (!function_exists('require_file')) {
    function require_file($pathFolder) {
        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach ($files as $item) {
            require_once $pathFolder . $item;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data) {
        echo "<pre>";
        print_r($data);
        die;
    }
}

if (!function_exists('page404')) {
    function page404() {
        echo '<h2 class="text-center p-5">Page Not Found :(</h2>';
        echo '<p class="text-center">Oops! 😖 The requested URL was not found on this server.</p>';
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($file, $pathFolderUpload) {
        $uploadFile = $pathFolderUpload . time() . '-' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $uploadFile)) {
            return $uploadFile;
        }
    }
}

if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act) {
        if ($act == 'login') {
            if (!empty($_SESSION['admin'])) {
                header('Location: ' . BASE_URL_ADMIN);
                exit();
            }
        } 
        elseif (empty($_SESSION['admin'])) {
            header('Location: ' . BASE_URL_ADMIN . '?act=login');
            exit();
        }
    }
}

if (!function_exists('middleware_auth_checkClient')) {
    function middleware_auth_checkClient($act) {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        }
        if ($act == 'review-cart') {
            if (empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        }
        if ($act == 'checkout') {
            if (empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        }
    }
}

function calculateTotalPrice($carts) {
    $totalPrice = 0;
    foreach ($carts as $cart) {
        $productPrice = ($cart['price'] - ($cart['price'] * $cart['discount'] / 100)) * $cart['quantity'];
        $totalPrice += $productPrice;
    }
    return $totalPrice;
}

function calculateProductPrice($price, $discount, $quantity) {
    // Tính giá tiền của sản phẩm với số lượng và chiết khấu cho trước
    $productPrice = ($price - ($price * $discount / 100)) * $quantity;
    return $productPrice;
}