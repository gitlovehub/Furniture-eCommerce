<?php

require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

// Điều hướng
$act = $_GET["act"] ?? '/';

match ($act) {
    '/' => dashboard(),
    'dashboard' => dashboard(),

    // CRUD Category
    'category-list'   => categoryList(),
    'add-category'    => addCategory(),
    'update-category' => updateCategory($_GET["id"]),
    'delete-category' => deleteCategory($_GET["id"]),

    // CRUD Product
    // ...
};

require_once '../commons/disconnect-db.php';