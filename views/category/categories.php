<div class="grid wide">
    <div id="home" class="category__header home">
        <a href="?act=home-page" class="category__title-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-chevron-left">
                <path d="M15 6l-6 6l6 6"></path>
            </svg>
            Home
        </a>
        <h3 class="text-center fs-1 fw-semibold p-4">All</h3>
        <div class="category__filter hide-on-mobile">
            <a href="?act=categories" class="category__filter-btn">
                <button>All</button>
            </a>
            <?php foreach ($listCategory as $category) : ?>
                <?php
                // Đếm số lượng sản phẩm trong mỗi danh mục
                $productCount = count(selectProductsByCategoryId($category['id']));
                ?>
                <a href="?act=category-filter&id=<?= $category['id'] ?>" class="category__filter-btn">
                    <button>
                        <?= $category['name'] ?>
                    </button>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

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