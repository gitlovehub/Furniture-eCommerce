<section id="home">
    <div class="grid wide">
        <span class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="tabler-icon tabler-icon-chevron-left">
                <path d="M15 6l-6 6l6 6"></path>
            </svg><a href="#" onclick="goBack()" class="header__navbar-menu-link fs-3">Back</a>
        </span>
        <h1 class="product__name">
            <?= $show['name'] ?>
            <span id="discount-stick" class="shadow-sm">
                –<?= $show['discount'] ?>%
            </span>
        </h1>
        <div class="product__container">
            <div class="product__left">
                <div class="big-img">
                    <img src="<?= BASE_URL . $show['thumbnail'] ?>" id="big-image">
                </div>
                <div class="small-imgs">
                    <img onclick="changeBigImage(this)" src="<?= BASE_URL . $show['thumbnail'] ?>" class="shadow-sm">
                    <?php foreach ($gallery as $item) : ?>
                        <img onclick="changeBigImage(this)" src="<?= BASE_URL . $item['url'] ?>" class="shadow-sm">
                    <?php endforeach ?>
                </div>
            </div>
            <div class="product__right">
                <p class="product__desc">
                    <?= $show['description'] ?>
                </p>
                <h2>Color:</h2>
                <div class="product__clr">
                    <div class="variant-input">
                        <input type="radio" value="clr1" id="clr-1" name="options-clr" autofocus>
                        <label for="clr-1" style="background: #f368e0;"></label>
                    </div>
                    <div class="variant-input">
                        <input type="radio" value="clr2" id="clr-2" name="options-clr">
                        <label for="clr-2" style="background: #ff9f43;"></label>
                    </div>
                    <div class="variant-input">
                        <input type="radio" value="clr3" id="clr-3" name="options-clr">
                        <label for="clr-3" style="background: #ee5253;"></label>
                    </div>
                </div>
                <h2>Quantity:</h2>
                <div class="product__qty">
                    <div class="product__qty-btns">
                        <button onclick="updateQuantity(-1)">–</button>
                        <p class="number" id="quantity">1</p>
                        <button onclick="updateQuantity(+1)">+</button>
                    </div>
                    <?php
                    // Lấy giá cơ bản và phần trăm giảm giá từ $show
                    $basePrice = $show['price'];
                    $discount  = $show['discount'];
                    // Tính toán giá sau khi được giảm giá
                    $price = $basePrice - ($basePrice * $discount / 100);
                    ?>
                    <div class="product__price">
                        <span class="text-secondary text-decoration-line-through">£<?= $show['price'] ?></span>
                        <span id="price">£<?= $price ?></span>
                    </div>
                </div>
                <div class="product__act">
                    <button class="product__act-add product-outline-btn">add to cart</button>
                    <button class="product__act-buy product__item-btn">buy now</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comments here -->
<section class="comments">
    <div class="grid wide">
        <h2 class="page-title">Comments</h2>
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
        <h2 class="page-title">More like this</h2>

        <div class="carousel-container">
            <div class="carousel-slider" id="slider">

                <?php foreach ($similarProducts as $product) : ?>
                    <div class="product__item">
                        <div onclick="redirectToProductDetail(<?= $product['id'] ?>)" class="product__item-wrapper-img" style="min-height: 220px;">
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
            <div class="carousel-controls">
                <div class="button-prev"></div>
                <div class="button-next"></div>
            </div>
        </div>
    </div>
</section>

<script>
    function updateQuantity(change) {
        var quantityElement = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityElement.textContent);
        var newQuantity = currentQuantity + change;
        if (newQuantity > 0) {
            quantityElement.textContent = newQuantity;
            updatePrice(newQuantity);
        }
    }

    function updatePrice(quantity) {
        var priceElement = document.getElementById('price');
        var price = parseFloat('<?= $price ?>');
        var totalPrice = quantity * price;
        priceElement.textContent = '£' + totalPrice; // Làm tròn đến 2 chữ số thập phân
    }
</script>