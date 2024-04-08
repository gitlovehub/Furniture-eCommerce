<?php

function manageReviews() {
    $titleBar = 'Reviews';
    $view     = 'review/review';
    $list     = selectAll('tbl_reviews');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
