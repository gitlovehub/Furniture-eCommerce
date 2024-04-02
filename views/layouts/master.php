<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Reset css link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-- Google fonts link here -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font-awesome here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS link here-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/base.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/grid.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $css ?? null ?>">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/toast.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/responsive.css">

    <!-- Title bar here-->
    <title>
        <?= $titleBar ?? 'Furniture Store' ?>
    </title>
</head>

<body>

    <?php require_once 'overlay.php'; ?>

    <?php require_once 'header.php'; ?>

    <!-- Content wrapper -->
    <?php require_once PATH_VIEW . $view . '.php'; ?>
    <!-- Content wrapper -->

    <?php require_once 'footer.php'; ?>
    <?php require_once 'toast.php'; ?>

    <a href="#top" class="scrolltop-btn" id="scroll-top">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="angles-up" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path d="M241 47c-9.4-9.4-24.6-9.4-33.9 0L47 207c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l143-143L367 241c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L241 47zM401 399L241 239c-9.4-9.4-24.6-9.4-33.9 0L47 399c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l143-143L367 433c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9z" />
        </svg>
    </a>

    <script>
        function redirectToProductDetail(productId) {
            window.location.href = '<?= BASE_URL ?>?act=product-detail&id=' + productId;
        }

        function goBack() {
            window.history.back();
        }

        function goHome() {
            window.location.href = '<?= BASE_URL ?>';
        }

        function changeBigImage(image) {
            var bigImage = document.getElementById('big-image');
            bigImage.src = image.src;
        }
    </script>

    <script src="<?= BASE_URL ?>assets/js/base.js"></script>
    <script src="<?= BASE_URL ?>assets/js/toast.js"></script>
    <script src="<?= $js ?? null ?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>