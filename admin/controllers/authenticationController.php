<?php 

function authLogin() {
    if (isset($_POST['btnLogin'])) {
        checkAdmin();
    }
    require_once PATH_VIEW_ADMIN . 'authentication/login.php';
}

function authLogout() {
    if (!empty($_SESSION["admin"])) {
        unset($_SESSION["admin"]);
    }
    header('Location: ' . BASE_URL);
    exit();
}

function checkAdmin() {
    // Lấy dữ liệu từ POST
    $email    = $_POST["email"];
    $password = $_POST["password"];

    // Kiểm tra trường email
    if (empty($email) || empty($password)) {
        $_SESSION["errors"] = 'Email and password are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"] = 'Invalid email format.';
    }

    // Nếu có lỗi, quay lại trang đăng nhập và hiển thị thông báo lỗi
    if (!empty($_SESSION["errors"])) {
        header('Location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    }

    // Kiểm tra thông tin đăng nhập
    $admin = getAdmin($email, $password);
    if (empty($admin)) {
        $_SESSION["errors"] = 'Sorry, Sign-in failed.';
        header('Location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    }

    // Đăng nhập thành công, lưu thông tin admin vào session và chuyển hướng đến trang admin
    $_SESSION["admin"] = $admin;
    header('Location: ' . BASE_URL_ADMIN);
    exit();
}