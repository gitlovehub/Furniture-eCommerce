<?php 

function orderList() {
    $titleBar = 'Orders';
    $view     = 'order/order-list';
    $list     = getOrders('tbl_orders');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function orderDetails($id) {
    $titleBar = 'Orders';
    $view     = 'order/order-details';
    $list     = getOrderDetails($id);
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}