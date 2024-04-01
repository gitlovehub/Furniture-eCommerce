<section id="intro">
    <div class="grid wide pt-5">
        <span class="header__navbar-menu-link">
            <i class="fa-solid fa-chevron-left"></i>
            <span onclick="goBack()" class="fs-3">Back</span>
        </span>
        <?php
        $currentName = '';
        foreach ($listCategory as $categoryItem) {
            if ($categoryItem['id'] == $_GET['id']) {
                $currentName = $categoryItem['name'];
                break;
            }
        }
        ?>
        <h3 class="text-center fs-1 fw-semibold p-4">
            <?= $currentName ?>
        </h3>
        <div class="category__menu hide-on-mobile">
            <a href="?act=categories" class="category__menu-btn">
                <button>All</button>
            </a>
            <?php foreach ($listCategory as $category) : ?>
                <?php $isActive = ($category['id'] == $_GET['id']); ?>
                <a href="?act=category-menu&id=<?= $category['id'] ?>" class="category__menu-btn <?= $isActive ? 'active' : '' ?>">
                    <button>
                        <?= $category['name'] ?>
                    </button>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

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