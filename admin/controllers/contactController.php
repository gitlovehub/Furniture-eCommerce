<?php

function contact() {
    $list     = selectAll('tbl_contact');

    if (empty($list)) {
        page404();
    }

    $titleBar = 'Contact';
    $view     = 'contact';    
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUpdateContact($data) {
    $errors = [];

    return $errors;
}