<div class="grid wide">
    <div id="home" class="category__header">
        <span class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-chevron-left">
                <path d="M15 6l-6 6l6 6"></path>
            </svg><a href="#" onclick="goBack()" class="header__navbar-menu-link fs-3">Back</a>
        </span>
        <h3 class="text-center fs-1 fw-semibold p-4">
            Search Results for:
            “<?= $kw ?>”
        </h3>
    </div>
</div>

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
                <div class="product__item">
                    <div class="product__item-wrapper-img" style="min-height: 300px;">
                        <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" class="product__item-img">
                    </div>
                    <div class="product__item-btn-overlay">
                        <button class="product__item-btn">ADD TO CART</button>
                    </div>
                    <div class="product__item-details">
                        <h4 class="product__item-name fs-4"><?= $product['name'] ?></h4>
                        <p class="product__item-price fs-3">£<?= $product['price'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>