<div class="grid wide">
    <div id="home" class="category__header">
        <span class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-chevron-left">
                <path d="M15 6l-6 6l6 6"></path>
            </svg><a href="#" onclick="goBack()" class="header__navbar-menu-link fs-3">Back</a>
        </span>
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

        <div class="bg-light mt-4 p-4 shadow-sm rounded-3">
            <form action="?act=range-price" method="post" class="col-12 col-lg-6">
                <h3 class="fw-semibold text-uppercase">Price</h3>
                <div class="price-input w-100 d-flex gap-5 my-4">
                    <div class="field d-flex align-items-center">
                        <span>Min</span>
                        <input type="number" class="form-control text-center fs-4 input-min" value="2500">
                    </div>
                    <div class="field d-flex align-items-center">
                        <span>Max</span>
                        <input type="number" class="form-control text-center fs-4 input-max" value="7500">
                    </div>
                    <button class="btn btn-outline-dark fs-4 px-5" type="submit" name="btnRange">Submit</button>
                </div>
                <div class="slider">
                    <div class="progress bg-primary"></div>
                </div>
                <div class="range-input">
                    <input type="range" class="range-min" min="0" max="10000" value="2500" step="100" name="min">
                    <input type="range" class="range-max" min="0" max="10000" value="7500" step="100" name="max">
                </div>
            </form>
        </div>

    </div>
</div>

<section class="product">
    <div class="grid wide">
        <div class="grid-products">

            <?php foreach ($listProducts as $product) : ?>
                <div class="product__item">
                    <div onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="product__item-wrapper-img" style="min-height: 300px;">
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