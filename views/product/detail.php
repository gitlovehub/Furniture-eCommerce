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
                            <?php if ($sale == $cost) : ?>
                                <span id="price">£<?= number_format($sale, 0, '.', ',') ?></span>
                            <?php else : ?>
                                <span class="text-secondary fw-light text-decoration-line-through">£<?= number_format($cost, 0, '.', ',') ?></span>
                                <span id="price" class="fs-1">£<?= number_format($sale, 0, '.', ',') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product__act">
                        <button type="submit" name="btnAddToCart" class="product-outline-btn fs-3">add to cart</button>
                        <button type="submit" name="btnBuyNow" class="product__item-btn fs-3">buy now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Comments here -->
<section class="comments">
    <div class="grid wide">
        <h2 class="page-title fs-1">Comments</h2>
        <div class="col-12 col-xl-6">
            <!-- comment box -->
            <div style="height: 300px;">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <img src="" alt="avatar" width="40" height="40">
                                <p class="ms-3 fs-3 fw-bold">Johny</p>
                            </div>
                            <span>28/02/2024</span>
                        </div>
                        <p class="pt-3">Type your note, and hit enter to add it</p>
                    </div>
                </div>

                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <img src="" alt="avatar" width="40" height="40">
                                <p class="ms-3 fs-3 fw-bold">Johny</p>
                            </div>
                            <span>29/02/2024</span>
                        </div>
                        <p class="pt-3">Type your note, and hit enter to add it</p>
                    </div>
                </div>

                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <img src="" alt="avatar" width="40" height="40">
                                <p class="ms-3 fs-3 fw-bold">Johny</p>
                            </div>
                            <span>30/02/2024</span>
                        </div>
                        <p class="pt-3">Type your note, and hit enter to add it</p>
                    </div>
                </div>
            </div>

            <div class="mt-3 mb-5">
                <span class="fs-2 text-decoration: none; transition: all ease 0.3s;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'" style="cursor: pointer;">
                    <span><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24" fill="none" transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path d="M9.2773 7.77888C9.57 7.48578 9.56967 7.01091 9.27658 6.71822C8.98349 6.42552 8.50861 6.42585 8.21592 6.71894L3.21931 11.7224C2.92678 12.0153 2.92692 12.4899 3.21962 12.7826L8.21623 17.7803C8.50909 18.0732 8.98396 18.0732 9.27689 17.7804C9.56981 17.4875 9.56986 17.0126 9.277 16.7197L5.557 13H13.3988C14.9936 13 16.2099 12.758 17.2878 12.2355L17.5342 12.11C18.6427 11.5171 19.5171 10.6427 20.11 9.53424C20.7194 8.39473 21 7.11626 21 5.39877C21 4.98456 20.6642 4.64877 20.25 4.64877C19.8358 4.64877 19.5 4.98456 19.5 5.39877C19.5 6.88263 19.2723 7.91977 18.7872 8.82684C18.3342 9.67391 17.6739 10.3342 16.8268 10.7872C15.9895 11.235 15.0414 11.4635 13.7334 11.4959L13.3988 11.5H5.562L9.2773 7.77888Z" fill="#212121" />
                            </g>
                        </svg></span>View more comments
                </span>
            </div>

            <!-- Button trigger modal -->
            <p type="button" class="btn-trigger p-4 fs-3 rounded-pill border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Write a comment...
            </p>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-1" id="staticBackdropLabel">Write a comment 📝</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-floating">
                            <textarea name="inputComment" class="form-control fs-2 pt-5" id="floatingTextarea" placeholder="" style="height: 100px"></textarea>
                            <label for="floatingTextarea" class="fs-2">Hi
                                <span class="text-primary">User</span>
                                ,What's on your mind?
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btnSubmit" class="btn btn-primary fs-2">Post</button>
                    </div>
                    <input type="hidden" name="idsp" value="">
                </form>
            </div>
        </div>
    </div>
</section>

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
                    $price = $basePrice - ($basePrice * $discount / 100);
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
                            <button class="product__item-btn">ADD TO CART</button>
                        </div>
                        <div class="product__item-details">
                            <h4 class="product__item-name fs-4"><?= $product['name'] ?></h4>
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
        priceElement.textContent = '£' + totalPrice;
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
</script>