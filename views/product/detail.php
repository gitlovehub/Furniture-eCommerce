<section id="intro">
    <div class="grid wide pt-5">
        <nav class="breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb fs-3 fw-semibold">
                <li class="breadcrumb-item"><a href="?act=home-page">Home</a></li>
                <li class="breadcrumb-item"><a href="?act=categories">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product details</li>
            </ol>
        </nav>

        <h1 class="product__name fs-1">
            <?= $item['name'] ?>
            <?php if ($item['discount'] != 0) : ?>
                <span id="discount-stick" class="fs-3 ms-4 shadow">
                    –<?= $item['discount'] ?>%
                </span>
            <?php endif; ?>
        </h1>
        <div class="product__container">
            <div class="product__left">
                <div class="big-img">
                    <img src="<?= BASE_URL . $item['thumbnail'] ?>" id="big-image">
                </div>
                <div class="small-imgs">
                    <img onclick="changeImage(this)" src="<?= BASE_URL . $item['thumbnail'] ?>" class="shadow-sm">
                    <?php foreach ($gallery as $image) : ?>
                        <img onclick="changeImage(this)" src="<?= BASE_URL . $image['url'] ?>" class="shadow-sm">
                    <?php endforeach ?>
                </div>
            </div>
            <div class="product__right">
                <p class="product__desc fs-2 lh-sm">
                    <?= $item['description'] ?>
                </p>
                <form action="?act=add-to-cart&id=<?= $item['id'] ?>" method="post">
                    <input type="hidden" name="name" value="<?= $item['name'] ?>">
                    <input type="hidden" name="discount" value="<?= $item['discount'] ?>">
                    <h2>Color:</h2>
                    <div class="product__clr">
                        <?php $i = 1 ?>
                        <?php foreach ($colors as $color) : ?>
                            <div class="variant-input">
                                <input type="radio" value="<?= $color['id'] ?>" id="clr-<?= $i ?>" name="color" autofocus>
                                <label for="clr-<?= $i ?>" style="background: #<?= $color['hex'] ?>;"></label>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </div>
                    <h2 class="fs-1">Quantity:</h2>
                    <div class="product__qty">
                        <div class="product__qty-btns">
                            <button type="button" onclick="updateQuantity(-1)">–</button>
                            <p id="qty" class="product__qty-number">1</p>
                            <input type="hidden" min="1" name="quantity" value="1" class="number" id="qty-hidden" readonly>
                            <button type="button" onclick="updateQuantity(+1)">+</button>
                        </div>
                        <div class="product__price">
                            <?php if ($sale == $basePrice) : ?>
                                <span id="price">£<?= number_format($sale, 0, '.', ',') ?></span>
                            <?php else : ?>
                                <span class="text-secondary fw-light text-decoration-line-through">£<?= number_format($basePrice, 0, '.', ',') ?></span>
                                <span id="price" class="fs-1">£<?= number_format($sale, 0, '.', ',') ?></span>
                            <?php endif; ?>
                            <input type="hidden" name="price" value="<?= $sale ?>">
                        </div>
                    </div>
                    <input type="hidden" id="instockValue" value="<?= $item['instock'] ?>">
                    <?php if ($item['instock'] > 10) : ?>
                        <p class="py-4">In stock, ready to ship 🚀</p>
                    <?php elseif ($item['instock'] == 0) : ?>
                        <p class="py-4 text-danger fw-bold">😭 Sold out.</p>
                    <?php else : ?>
                        <p class="py-4">☹️ Low stock - only <?= $item['instock'] ?> items left!</p>
                    <?php endif; ?>
                    <div class="product__act">
                        <button type="submit" name="btnAddToCart" class="product-outline-btn fs-3">Add to cart</button>
                        <button type="submit" name="btnBuyNow" class="product__item-btn fs-3">Buy now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Reviews -->
<section>
    <div class="grid wide">
        <h2 class="page-title fs-1">Reviews</h2>
        <div class="card border-0 p-2 col-12 col-xl-6">
            <?php $totalReviews = count($reviews); ?>
            <?php if (($totalReviews ?? 0) > 0) : ?>
                <div class="card border mb-4 h-100">
                    <div class="card-body row p-4">
                        <div class="col-sm-5 border-shift">
                            <h2 class="text-warning fs-1">
                                <?php $averageRating = calculateAverageRating($reviews); ?>
                                <?= $averageRating ?>
                                <?php for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $averageRating) {
                                        echo '<i class="fa-solid fa-star"></i>';
                                    } elseif ($i - 0.5 <= $averageRating) {
                                        echo '<i class="fa-regular fa-star-half-stroke"></i>';
                                    } else {
                                        echo '<i class="fa-regular fa-star"></i>';
                                    }
                                }
                                ?>
                            </h2>
                            <div class="pt-3">
                                <p class="fw-medium">Total <?= $totalReviews ?> reviews</p>
                                <p class="text-muted pt-2">All reviews are from genuine customers</p>
                            </div>
                            <hr class="d-sm-none">
                        </div>

                        <div class="col-sm-7 gy-1 text-nowrap d-flex flex-column justify-content-between ps-4 gap-2 pe-3">
                            <?php
                            // Khởi tạo mảng chứa số lượt đánh giá cho mỗi số sao
                            $starRatings = array(
                                5 => 0,
                                4 => 0,
                                3 => 0,
                                2 => 0,
                                1 => 0
                            );
                            // Đếm số lượt đánh giá cho mỗi số sao
                            foreach ($reviews as $review) {
                                $rating = $review['rating'];
                                $starRatings[$rating]++;
                            }
                            ?>
                            <?php foreach ($starRatings as $star => $count) : ?>
                                <?php $percentage = !empty($reviews) ? ($count / count($reviews)) * 100 : 0; ?>
                                <div class="d-flex align-items-center gap-3">
                                    <small><?= $star ?> Star</small>
                                    <div class="progress w-100" style="height:10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percentage ?>%" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p style="width: 65px;" class="text-end"><?= round($percentage) ?>%</p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <h3 class="text-center fs-2 py-4">Feel free to leave your feedback here! 🌟</h3>
            <?php endif; ?>
            <div style="max-height: 370px; overflow: hidden;">
                <?php foreach ($limitedReviews as $review) : ?>
                    <div class="card border-0 pb-3 border-bottom mb-4">
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-4 justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="reviewer-avatar rounded-circle" style="width: 40px;">
                                        <?php
                                        $defaultAvatar = 'https://i.stack.imgur.com/l60Hf.png';
                                        $avatar = !empty($review['customer_avatar']) ? BASE_URL . $review['customer_avatar'] : $defaultAvatar;
                                        ?>
                                        <img src="<?= $avatar ?>" alt="avatar" height="40px" class="rounded-circle object-fit-cover">
                                    </div>
                                    <div class="ms-3 lh-base">
                                        <p class="fs-3 fw-bold">
                                            <span><?= $review['customer_name'] ?></span>
                                            <span class="fs-5 bg-label-success"><i class="fa-regular fa-circle-check me-2"></i>Purchased</span>
                                        </p>
                                        <span class="text-warning">
                                            <?php
                                            $rating = $review['rating'];
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fa-solid fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa-regular fa-star"></i>';
                                                }
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <span><?= date('d/m/Y', strtotime($review['review_date'])) ?></span>
                            </div>
                            <p class="pt-3"><?= $review['review_text'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="d-flex gap-3 mt-4">
                <?php if (count($reviews) >= 3) : ?>
                    <button type="button" class="w-100 fs-3 py-2 btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#listReviewModal">View more</button>
                <?php endif; ?>
                <button type=" button" class="w-100 fs-3 py-2 btn-label-primary effect py-4" data-bs-toggle="modal" data-bs-target="#ratingReviewModal">Write a review</button>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="ratingReviewModal" tabindex="1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="" class="modal-content" method="post">
            <div class="modal-header border-0 pb-0 pt-4">
                <h2 class="modal-title w-100 fw-bold text-center">Rate your experience</h2>
                <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <p class="fs-3 lh-sm">
                    We highly value your feedback! Kindly take a moment to rate your experience and provide us with your valuable feedback.
                </p>
                <div class="star-rating text-center my-5">
                    <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-1" value="1">
                    <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-2" value="2" checked>
                    <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-3" value="3">
                    <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-4" value="4">
                    <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" name="rating" id="rate-5" value="5">
                </div>

                <div class="form-floating">
                    <textarea class="form-control pt-5 fs-3" name="textarea" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
                    <label for="floatingTextarea">Share more feedback</label>
                </div>
            </div>
            <div class="modal-footer px-5 border-0">
                <button type="submit" name="btnSendReview" class="btn btn-success fs-2 px-5">Send</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="listReviewModal" tabindex="1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-0 py-4">
                <h2 class="modal-title w-100 fw-bold text-center">List Review</h2>
                <button type="button" class="btn-close me-2" data-bs-dismiss="modal" style="cursor: pointer;" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 scroll-bar">
                <?php foreach ($reviews as $review) : ?>
                    <div class="card border-0 pb-3 border-bottom mb-5">
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-4 justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="reviewer-avatar rounded-circle" style="width: 40px;">
                                        <?php
                                        $defaultAvatar = 'https://www.gravatar.com/avatar/0?d=mp&f=y';
                                        $avatar = !empty($review['customer_avatar']) ? BASE_URL . $review['customer_avatar'] : $defaultAvatar;
                                        ?>
                                        <img src="<?= $avatar ?>" alt="" height="40px" class="rounded-circle">
                                    </div>
                                    <div class="ms-3 lh-base">
                                        <p class="fs-3 fw-bold">
                                            <span><?= $review['customer_name'] ?></span>
                                            <span class="fs-5 bg-label-success"><i class="fa-regular fa-circle-check me-2"></i>Purchased</span>
                                        </p>
                                        <span class="text-warning">
                                            <?php
                                            $rating = $review['rating'];
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fa-solid fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa-regular fa-star"></i>';
                                                }
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <span><?= date('d/m/Y', strtotime($review['review_date'])) ?></span>
                            </div>
                            <p class="pt-3"><?= $review['review_text'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- More like this -->
<section class="carousel">
    <div class="grid wide">
        <h2 class="page-title fs-1">More like this</h2>

        <div class="carousel-container">
            <div class="carousel-slider" id="slider">

                <?php foreach ($sameCate as $product) : ?>
                    <?php
                    $basePrice = $product['price'];
                    $discount  = $product['discount'];
                    // Tính toán giá sau khi được giảm giá
                    $salte = $basePrice - ($basePrice * $discount / 100);
                    ?>
                    <div class="product__item">
                        <div onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="product__item-wrapper-img" style="min-height: 220px;">
                            <?php if ($product['discount'] != 0) : ?>
                                <span id="discount-stick" class="shadow fs-5 position-absolute">
                                    –<?= $product['discount'] ?>%
                                </span>
                            <?php endif; ?>
                            <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="" class="product__item-img">
                        </div>
                        <div class="product__item-btn-overlay">
                            <button onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="btn btn-outline-danger px-4 fs-4">View</button>
                        </div>
                        <div class="product__item-details w-100">
                            <h4 class="product__item-name fs-4"><?= $product['name'] ?></h4>
                            <p class="product__item-price fs-3">
                                <?php if ($sale == $basePrice) : ?>
                                    <span>£<?= $basePrice ?></span>
                                <?php else : ?>
                                    <span class="text-secondary fw-light text-decoration-line-through">£<?= $basePrice ?></span>
                                    <span>£<?= $sale ?></span>
                                <?php endif; ?>
                                <span class="float-end fs-5 text-secondary"><i class="fa-regular fa-eye me-2"></i><?= $product['view'] ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="carousel-controls">
                <div class="carousel-btn-prev"></div>
                <div class="carousel-btn-next"></div>
            </div>
        </div>
    </div>
</section>

<script>
    function changeImage(image) {
        var bigImage = document.getElementById('big-image');
        // Thay đổi ảnh lớn với hiệu ứng slide
        bigImage.src = image.src;
        bigImage.classList.add('slide-img');
        // Loại bỏ lớp slide-in sau khi hoàn thành animation
        bigImage.addEventListener('animationend', function() {
            bigImage.classList.remove('slide-img');
        });
    }

    function updateQuantity(change) {
        var quantityHidden = document.getElementById('qty-hidden');
        var currentQuantity = parseInt(quantityHidden.value);
        var newQuantity = currentQuantity + change;
        if (newQuantity > 0) {
            quantityHidden.value = newQuantity;
            updatePrice(newQuantity);
            updateQuantityDisplay(newQuantity);
        }
    }

    function updateQuantityDisplay(quantity) {
        var quantityDisplay = document.getElementById('qty');
        quantityDisplay.textContent = quantity;
    }

    function updatePrice(quantity) {
        var priceElement = document.getElementById('price');
        var price = parseFloat('<?= $sale ?>');
        var totalPrice = price * quantity;

        // Tạo một đối tượng Intl.NumberFormat
        var formatter = new Intl.NumberFormat('en-UK');
        var formattedTotalPrice = formatter.format(totalPrice);
        priceElement.textContent = '£' + formattedTotalPrice;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const labels = document.querySelectorAll('.variant-input label');
        let focusedInput = null;

        labels.forEach(label => {
            label.addEventListener('click', function() {
                // Lấy input tương ứng với label và focus vào nó
                const input = label.previousElementSibling;
                input.focus();
                focusedInput = input;
            });
        });

        document.addEventListener('click', function(event) {
            // Kiểm tra xem click có nằm ngoài input đang được focus hay không
            if (focusedInput && !focusedInput.contains(event.target)) {
                // Nếu click ngoài input đang được focus, giữ lại focus cho input đó
                focusedInput.focus();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Lấy giá trị tồn kho từ thẻ input ẩn
        var instock = document.getElementById('instockValue').value;

        // Lấy các nút "Add to cart" và "Buy now"
        var addToCartBtn = document.querySelector('[name="btnAddToCart"]');
        var buyNowBtn = document.querySelector('[name="btnBuyNow"]');

        // Kiểm tra nếu số lượng tồn kho bằng 0, thì vô hiệu hóa cả hai nút
        if (instock == 0) {
            addToCartBtn.disabled = true;
            buyNowBtn.disabled = true;
            addToCartBtn.classList.add('pointer-none');
            buyNowBtn.classList.add('pointer-none');
        }
    });
</script>