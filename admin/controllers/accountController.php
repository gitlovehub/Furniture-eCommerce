<?php 

function adminList() {
    $titleBar = 'Accounts';
    $view     = 'account/admin-list';
    $list     = getStatusActive('tbl_accounts');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function customerList() {
    $titleBar = 'Accounts';
    $view     = 'account/customer-list';
    $list     = getStatusActive('tbl_accounts');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function customerBin() {
    $titleBar = 'Accounts';
    $view     = 'account/customer-bin';
    $list     = getStatusInactive('tbl_accounts');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function updateCustomerStatus($id, $value) {
    updateStatus('tbl_accounts', $id, $value);
    if ($value == 1) {
        header('Location: ?act=customer-bin');
    } else {
        header('Location: ?act=customer-list');
    }
    $_SESSION["success"]='';
    exit();
}