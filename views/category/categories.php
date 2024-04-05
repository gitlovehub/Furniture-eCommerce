<section id="intro">
    <div class="grid wide pt-5">
        <nav class="breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb fs-3 fw-semibold">
                <li class="breadcrumb-item"><a href="?act=home-page">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </nav>

        <h3 class="text-center fs-1 fw-semibold p-4">All</h3>

        <div class="category__menu hide-on-mobile">
            <a href="?act=categories" class="category__menu-btn">
                <button>All</button>
            </a>
            <?php foreach ($listCategory as $category) : ?>
                <?php
                // Đếm số lượng sản phẩm trong mỗi danh mục
                $productCount = count(getProductsByCategoryId($category['id']));
                ?>
                <a href="?act=category-menu&id=<?= $category['id'] ?>" class="category__menu-btn">
                    <button>
                        <?= $category['name'] ?>
                    </button>
                </a>
            <?php endforeach; ?>
        </div>

        <span class="filter-icon d-flex align-items-center gap-2 pt-4">
            <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24" fill="none">
                <g id="style=stroke">
                    <g id="filter-circle">
                        <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M7.75 17.5C7.75 17.0858 7.41421 16.75 7 16.75H2C1.58579 16.75 1.25 17.0858 1.25 17.5C1.25 17.9142 1.58579 18.25 2 18.25H7C7.41421 18.25 7.75 17.9142 7.75 17.5Z" fill="#000000" />
                        <path id="vector (Stroke)_2" fill-rule="evenodd" clip-rule="evenodd" d="M16.25 6.5C16.25 6.08579 16.5858 5.75 17 5.75H22C22.4142 5.75 22.75 6.08579 22.75 6.5C22.75 6.91421 22.4142 7.25 22 7.25H17C16.5858 7.25 16.25 6.91421 16.25 6.5Z" fill="#000000" />
                        <path id="vector (Stroke)_3" fill-rule="evenodd" clip-rule="evenodd" d="M22.75 17.5C22.75 17.0858 22.4142 16.75 22 16.75H13C12.5858 16.75 12.25 17.0858 12.25 17.5C12.25 17.9142 12.5858 18.25 13 18.25H22C22.4142 18.25 22.75 17.9142 22.75 17.5Z" fill="#000000" />
                        <path id="vector (Stroke)_4" fill-rule="evenodd" clip-rule="evenodd" d="M1.25 6.5C1.25 6.08579 1.58579 5.75 2 5.75H11C11.4142 5.75 11.75 6.08579 11.75 6.5C11.75 6.91421 11.4142 7.25 11 7.25H2C1.58579 7.25 1.25 6.91421 1.25 6.5Z" fill="#000000" />
                        <path id="vector (Stroke)_5" fill-rule="evenodd" clip-rule="evenodd" d="M10 15.1499C11.2426 15.1499 12.25 16.1573 12.25 17.3999C12.25 18.6425 11.2426 19.6499 10 19.6499C8.75736 19.6499 7.75 18.6425 7.75 17.3999C7.75 16.1573 8.75736 15.1499 10 15.1499ZM13.75 17.3999C13.75 15.3288 12.0711 13.6499 10 13.6499C7.92893 13.6499 6.25 15.3288 6.25 17.3999C6.25 19.471 7.92893 21.1499 10 21.1499C12.0711 21.1499 13.75 19.471 13.75 17.3999Z" fill="#000000" />
                        <path id="vector (Stroke)_6" fill-rule="evenodd" clip-rule="evenodd" d="M14 4.1499C12.7574 4.1499 11.75 5.15726 11.75 6.3999C11.75 7.64254 12.7574 8.6499 14 8.6499C15.2426 8.6499 16.25 7.64254 16.25 6.3999C16.25 5.15726 15.2426 4.1499 14 4.1499ZM10.25 6.3999C10.25 4.32883 11.9289 2.6499 14 2.6499C16.0711 2.6499 17.75 4.32883 17.75 6.3999C17.75 8.47097 16.0711 10.1499 14 10.1499C11.9289 10.1499 10.25 8.47097 10.25 6.3999Z" fill="#000000" />
                    </g>
                </g>
            </svg>
            <span onclick="" class="header__navbar-menu-link fs-3" style="line-height: 25px;">Filter</span>
        </span>
    </div>
</section>

<div class="filter-overlay">
    <div class="filter-container">
        <div class="filter-header border-bottom border-dark">
            <h1 class="filter-title fw-bold text-uppercase">Filter</h1>
            <div class="filter-close">✖</div>
        </div>

        <div class="filter-body">
            <form action="?act=filter-price" method="post" class="">
                <h3 class="fw-semibold fs-3 py-4">Price</h3>
                <div class="range-container">
                    <div class="range-field d-flex mb-4">
                        <input type="number" readonly class="w-100 border-0 text-start fs-3 p-0 input-min" value="2500">
                        <input type="number" readonly class="w-100 border-0 text-end fs-3 p-0 input-max" value="7500">
                    </div>
                    <div class="range-slider">
                        <div class="progress bg-primary"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="10000" value="2500" step="100" name="min">
                        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100" name="max">
                    </div>
                    <button type="submit" name="btnRange" class="btn btn-outline-dark fs-4 mt-4 float-end">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <div class="product__item-details w-100">
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
                            <span class="float-end fs-5 text-secondary"><i class="fa-regular fa-eye me-2"></i><?= $product['view'] ?></span>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>