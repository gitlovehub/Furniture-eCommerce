<?php 

function settings() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Settings';

    if (isset($_SESSION["user"])) {
        $view = 'account/settings';
    } else {
        header('Location: ?act=login');
        exit();
    }
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function settingInfo() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Account Details';

    if (isset($_SESSION["user"])) {
        $view = 'account/info';
    } else {
        header('Location: ?act=login');
        exit();
    }
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function settingAddress() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Addresses';

    if (isset($_SESSION["user"])) {
        $view = 'account/address';
    } else {
        header('Location: ?act=login');
        exit();
    }
    
    require_once PATH_VIEW . 'layouts/master.php';
}