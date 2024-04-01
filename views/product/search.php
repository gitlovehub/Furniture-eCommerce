<section id="intro">
    <div class="grid wide pt-5">
        <span class="header__navbar-menu-link">
            <i class="fa-solid fa-chevron-left"></i>
            <span onclick="goBack()" class="fs-3">Back</span>
        </span>
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
                $price = $basePrice - ($basePrice * $discount / 100);
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
                        <button class="product__item-btn">ADD TO CART</button>
                    </div>
                    <div class="product__item-details">
                        <h4 class="product__item-name fs-3">
                            <?= $product['name'] ?>
                        </h4>
                        <p class="product__item-price fs-3">
                            <?php if ($price == $basePrice) : ?>
                                <span>£<?= $basePrice ?></span>
                            <?php else : ?>
                                <span class="text-secondary fw-light text-decoration-line-through">£<?= $basePrice ?></span>
                                <span>£<?= $price ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>