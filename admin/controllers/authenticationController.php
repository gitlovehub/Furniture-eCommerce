<?php 

function authLogin() {
    if (!empty($_POST)) {
        checkAdmin();
    }
    require_once PATH_VIEW_ADMIN . 'authentication/login.php';
}

function authLogout() {
    if (!empty($_SESSION["admin"])) {
        session_destroy();
    }
    header('Location: ' . BASE_URL);
    exit();
}

function checkAdmin() {
    $email    = $_POST["email"];
    $password = $_POST["password"];
    $admin    = getAdmin($email, $password);

    if (empty($admin)) {
        $_SESSION["errors"] = ['Sorry, Sign-in failed.'];
        header('Location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    } else {
        $_SESSION["admin"] = $admin;
        header('Location: ' . BASE_URL_ADMIN);
        exit();
    }

}