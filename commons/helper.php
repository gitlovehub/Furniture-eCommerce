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

if (!function_exists('upload_avatar')) {
    function upload_avatar($file, $pathFolderUpload) {
        $uploadFile = $pathFolderUpload . time() . '-' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
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
        if ($act == 'settings') {
            if (empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        }
        if ($act == 'setting-info') {
            if (empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        }
        if ($act == 'order-history') {
            if (empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        }
        if ($act == 'order-success') {
            if (empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        }
    }
}

function calculateSubtotalCart($carts) {
    $subtotal = 0;
    foreach ($carts as $cart) {
        $basePrice    = $cart['price'];
        $discount     = $cart['discount'] / 100;
        $sale         = $basePrice * (1 - $discount);
        $totalPrice   = $sale * $cart['quantity'];
        $subtotal    += $totalPrice;
    }
    return $subtotal;
}

function calculateTotalPrice($price, $discount, $quantity) {
    $totalPrice = ($price - ($price * $discount / 100)) * $quantity;
    return $totalPrice;
}

function calculateShippingCost($customerCity) {
    // Hàm chuẩn hóa chuỗi
    function normalizeString($str) {
        $str = strtolower($str);
        $str = preg_replace('/[^a-z0-9]/', '', $str);
        return $str;
    }

    // Chuẩn hóa chuỗi từ $customerCity và 'Thành Phố Hà Nội'
    $normalizedCustomerCity = normalizeString($customerCity);
    $normalizedTargetCity   = normalizeString('Thành Phố Hà Nội');
    
    // Xác định phí vận chuyển
    $shippingCost = ($normalizedCustomerCity === $normalizedTargetCity) ? 0 : 20;

    return $shippingCost;
}

function isToday($date) {
    $orderTime = strtotime($date);
    $todayStart = strtotime('today'); // 0:00 của hôm nay
    $todayEnd = strtotime('tomorrow') - 1; // 23:59:59 của hôm nay

    return ($orderTime >= $todayStart && $orderTime <= $todayEnd);
}