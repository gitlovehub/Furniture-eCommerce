<?php

require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';

// require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

// Điều hướng
$act = $_GET["act"] ?? '/';

match ($act) {
    '/' => functionName(),
};

require_once './commons/disconnect-db.php';
