<?php

function dashboard() {
    $view   = 'dashboard';

    $productCount  = selectCount('tbl_products')['count'];
    $customerCount = selectCount('tbl_accounts')['count'];
    $orderCount    = selectCount('tbl_orders')['count'];
    $revenue       = selectRevenue()['total'];

    $labels = [];
    $data   = [];
    $statis = statis();
    foreach ($statis as $item) {
        $labels[] = $item['order_date'];
        $data[]   = $item['order_total'];

    }

    $bestSelling = getBestSellingProducts();
    
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

