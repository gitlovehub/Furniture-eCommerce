<section id="home" class="home">
    <div class="grid wide">
        <div class="grid-home">
            <?php
            usort($listBanner, function ($a, $b) {
                return $a['grid'] - $b['grid'];
            });
            ?>
            <?php foreach (array_slice($listBanner, 0, 4) as $banner) : ?>
                <?php
                $gridClass = 'grid-' . $banner['grid'];
                ?>
                <div class="featured <?= $gridClass ?>">
                    <a href="?act=category-filter&id=<?= $banner['id_category'] ?>" class="home__featured-link">
                        <div class="overlay-img"></div>
                        <img src="<?= BASE_URL . $banner['image'] ?>" alt="" class="home__featured-img">
                        <p class="home__featured-title fs-2"><?= $banner['title'] ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<section class="product">
    <div class="grid wide">
        <h2 class="page-title fs-2">Products we are proud of</h2>
        <div class="grid-products">

            <?php foreach (array_slice($listProducts, 0, 8) as $product) : ?>
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

<section class="banner">
    <div class="grid wide">
        <div class="banner-container">
            <?php $lastBanner = end($listBanner); ?>
            <div class="banner__text-side">
                <h2 class="banner__text-title fs-2">
                    <?= $lastBanner['title'] ?>
                </h2>
                <p class="banner__text-subtitle fs-4">
                    <?= $lastBanner['description'] ?>
                </p>
                <a href="?act=category-filter&id=<?= $lastBanner['id_category'] ?>" class="banner-btn">Shop now</a>
            </div>
            <div class="banner__img-side">
                <img src="<?= BASE_URL . $lastBanner['image'] ?>" alt="" class="banner-img">
            </div>
        </div>
    </div>
</section>

<section class="trending">
    <div class="grid wide">
        <h2 class="page-title fs-2">Trending Now</h2>

        <div class="trending-container">
            <div class="trending-slider" id="slider">

                <?php foreach ($trendingProducts as $product) : ?>
                    <div class="product__item">
                        <div class="product__item-wrapper-img" style="min-height: 220px;">
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
            <div class="trending-controls">
                <div class="button-prev"></div>
                <div class="button-next"></div>
            </div>
        </div>
    </div>
</section>