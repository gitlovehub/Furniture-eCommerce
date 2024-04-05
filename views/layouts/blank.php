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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font-awesome here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS link here-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/base.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/form.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/firework.css">
    <link rel="stylesheet" href="<?= $css ?? null ?>">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/responsive.css">

    <!-- Title bar here-->
    <title>
        <?= $titleBar ?? 'Furniture Store' ?>
    </title>
</head>

<body>
    <!-- Content wrapper -->
    <?php require_once PATH_VIEW . $view . '.php'; ?>
    <!-- Content wrapper -->

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
    </script>

    <script src="<?= $js ?? null ?>"></script>
</body>

</html>