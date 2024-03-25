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
        echo "<h2>Page Not Found :(</h2>";
        echo "<h4>Oops! 😖 The requested URL was not found on this server.</h4>";
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