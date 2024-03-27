<?php

function login() {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Login';
    $view     = 'authentication/login';

    require_once PATH_VIEW . 'layouts/master.php';
}