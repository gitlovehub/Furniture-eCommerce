<section id="intro">
    <div class="grid wide pt-5">

        <?php
        $currentName = '';
        foreach ($listCategory as $categoryItem) {
            if ($categoryItem['id'] == $_GET['id']) {
                $currentName = $categoryItem['name'];
                break;
            }
        }
        ?>

        <nav class="breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb fs-3 fw-semibold">
                <li class="breadcrumb-item"><a href="?act=home-page">Home</a></li>
                <li class="breadcrumb-item"><a href="?act=categories">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $currentName ?>
                </li>
            </ol>
        </nav>

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
                        <button onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="btn btn-outline-danger px-4 fs-3">View</button>
                    </div>
                    <div class="product__item-details">
                        <h4 class="product__item-name fs-3">
                            <?= $product['name'] ?>
                        </h4>
                        <p class="product__item-price fs-3">
                            <?php if ($price == $basePrice) : ?>
                                <span>£<?= number_format($basePrice, 2, '.', ',') ?></span>
                            <?php else : ?>
                                <span class="text-secondary fw-light text-decoration-line-through">£<?= number_format($basePrice, 2, '.', ',') ?></span>
                                <span>£<?= number_format($price, 2, '.', ',') ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>