<section id="intro">
    <div class="grid wide pt-5">
        <div class="d-flex align-items-center" style="line-height: 18px;">
            <i class="fa-solid fa-angle-left fs-3"></i>
            <span onclick="goBack()" class="header__navbar-menu-link fs-3">Back</span>
        </div>

        <h3 class="text-center fs-1 fw-semibold p-4">
            Search Results for:
            “<?= $kw ?>”
        </h3>
    </div>
</section>

<?php
if (empty($listProducts) || empty($kw)) {
    // Xuất mã JavaScript để thực hiện điều hướng
    noSearchResult();
}
?>

<section class="product">
    <div class="grid wide">
        <div class="grid-products">

            <?php foreach ($listProducts as $product) : ?>
                <?php
                $basePrice = $product['price'];
                $discount  = $product['discount'];
                // Tính toán giá sau khi được giảm giá
                $sale = $basePrice - ($basePrice * $discount / 100);
                ?>
                <div class="product__item">
                    <div onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="product__item-wrapper-img" style="min-height: 300px;">
                        <?php if ($product['discount'] != 0) : ?>
                            <span id="discount-stick" class="shadow fs-4 position-absolute">
                                –<?= $product['discount'] ?>%
                            </span>
                        <?php endif; ?>
                        <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" class="product__item-img">
                    </div>
                    <div class="product__item-btn-overlay">
                        <button onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="btn btn-outline-danger px-4 fs-3">View</button>
                    </div>
                    <div class="product__item-details w-100">
                        <h4 class="product__item-name fs-3">
                            <?= $product['name'] ?>
                        </h4>
                        <p class="product__item-price fs-3">
                            <?php if ($sale == $basePrice) : ?>
                                <span>£<?= number_format($basePrice, 0, '.', ',') ?></span>
                            <?php else : ?>
                                <span class="text-secondary fw-light text-decoration-line-through">£<?= number_format($basePrice, 0, '.', ',') ?></span>
                                <span>£<?= number_format($sale, 0, '.', ',') ?></span>
                            <?php endif; ?>
                            <span class="float-end fs-5 text-secondary"><i class="fa-regular fa-eye me-2"></i><?= $product['view'] ?></span>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>