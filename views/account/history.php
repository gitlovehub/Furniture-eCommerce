<section id="intro">
    <div class="grid wide pt-5">
        <div class="d-flex align-items-center" style="line-height: 18px;">
            <i class="fa-solid fa-angle-left fs-3"></i>
            <span onclick="goHome()" class="header__navbar-menu-link fs-3">Home</span>
        </div>

        <h1 class="text-center mt-3 pt-5">
            Order History
        </h1>
        <div class="account-container">
            <aside class="account__navigation">
                <a href="?act=setting-info&id=<?= $customer['id'] ?>" class="account__navigation-link">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Account Details</span>
                </a>
                <a href="?act=order-history&id=<?= $customer['id'] ?>" class="account__navigation-link active">
                    <i class="fa-solid fa-dolly"></i>
                    <span>Order History</span>
                </a>
                <a href="setting-password" class="account__navigation-link">
                    <i class="fa-solid fa-key"></i>
                    <span>Password</span>
                </a>
                <a href="?act=logout" class="account__navigation-link">
                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.68113 10.86H6.70132V2.91386H9.68113V4.99972H10.9393V2.26824C10.9393 1.93715 10.6744 1.67228 10.3433 1.67228H6.70132V0.430692C6.70132 0.116157 6.38679 -0.0824967 6.10536 0.0333846L1.05625 2.30135C0.774825 2.43378 0.576172 2.71521 0.576172 3.02974V10.7607C0.576172 11.0752 0.758271 11.3566 1.05625 11.4891L6.10536 13.757C6.38679 13.8895 6.70132 13.6743 6.70132 13.3597V12.1181H10.3433C10.6744 12.1181 10.9393 11.8533 10.9393 11.5222V8.77414H9.68113V10.86Z" fill="black"></path>
                        <path d="M16.1542 6.57244L13.1413 4.12238C12.8764 3.90717 12.4626 4.08927 12.4626 4.45347V5.8606H7.89354C7.69489 5.8606 7.5459 6.02614 7.5459 6.20824V7.59882C7.5459 7.79747 7.71144 7.94646 7.89354 7.94646H12.4626V9.35359C12.4626 9.70123 12.8764 9.89989 13.1413 9.68468L16.1542 7.21806C16.3529 7.05252 16.3529 6.73798 16.1542 6.57244Z" fill="black"></path>
                    </svg>
                    <span>Log Out</span>
                </a>
            </aside>

            <div class="nav-align-top mb-4 w-100">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="btn w-100 fs-2 py-3 text-dark active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true" tabindex="-1">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="btn w-100 fs-2 py-3 text-warning" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-payment" aria-controls="navs-justified-payment" aria-selected="true" tabindex="-1">Pending Payment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="btn w-100 fs-2 py-3 text-primary" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-intransit" aria-controls="navs-justified-intransit" aria-selected="true" tabindex="-1">In Transit</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="btn w-100 fs-2 py-3 text-success" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-completed" aria-controls="navs-justified-completed" aria-selected="true" tabindex="-1">Completed</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="btn w-100 fs-2 py-3 text-danger" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-cancelled" aria-controls="navs-justified-cancelled" aria-selected="true" tabindex="-1">cancelled</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="btn w-100 fs-2 py-3 text-secondary" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-refunded" aria-controls="navs-justified-refunded" aria-selected="true" tabindex="-1">Refunded</button>
                    </li>
                </ul>
                <div class="tab-content pt-5">
                    <div class="tab-pane fade active show" id="navs-justified-home" role="tabpanel">
                        
                        <?php foreach ($orders as $order) : ?>

                            <div class="card mb-4">
                                <div class="d-flex pt-4 px-5 justify-content-between align-items-center">
                                    <h3 class="fs-3 fw-bold py-3">
                                        ORDER ID: #<?= $order['id'] ?>
                                    </h3>
                                    <h3>
                                        <span class="fw-semibold shadow-sm text-uppercase <?= ($order['payment_status'] == 0) ? 'bg-label-warning' : (($order['payment_status'] == 1) ? 'bg-label-success' : 'bg-label-danger') ?>">
                                            <?= ($order['payment_status'] == 0) ? 'Unpaid' : (($order['payment_status'] == 1) ? 'Paid' : 'Refunded') ?>
                                        </span>
                                    </h3>
                                </div>
                                <?php $products = getProductsByOrder($order['id']); ?>
                                <?php foreach ($products as $product) : ?>
                                <div class="card-body p-5 pt-4 d-flex flex-column gap-4">
                                        <div class="cart-item border-0 border-bottom pb-4" style="height: 100px; background-color: #fff;">
                                            <div onclick="redirectToProductDetail(<?= $product['product_id'] ?>)" class="cart-item-start border" style="width: 150px;">
                                                <?php if (!empty($product['color_thumbnail'])) : ?>
                                                    <img src="<?= BASE_URL . $product['color_thumbnail'] ?>" alt="product img" class="cart-item-img">
                                                <?php else : ?>
                                                    <img src="<?= BASE_URL . $product['thumbnail'] ?>" alt="product img" class="cart-item-img">
                                                <?php endif; ?>
                                            </div>
                                            <div class="w-100 ps-3 pt-2">
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <div class="d-flex flex-column gap-3">
                                                        <h4 class="fs-3 fw-bold"><?= $product['product_name'] ?></h4>
                                                        <?php if (!empty($product['color'])) : ?>
                                                            <span>Color:
                                                                <span class="fs-4 fw-bold"><?= $product['color_name'] ?></span>
                                                            </span>
                                                        <?php endif; ?>
                                                        <div>
                                                            <span>Qty:</span>
                                                            <span class="fw-bold"><?= $product['quantity'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="text-end lh-sm">
                                                        <p class="fs-3 fw-bold">£<?= calculateTotalPrice($product['price'], $product['discount'], $product['quantity']) ?></p>
                                                        <?php $unitPrice = $product['price'] - ($product['price'] * $product['discount'] / 100); ?>
                                                        <span class="fs-4 text-secondary">£<?= number_format($unitPrice, 0, '.', ',') ?> each</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <?php endforeach; ?>
                                <div class="card-footer py-4 px-5 d-flex gap-4 justify-content-end align-items-center">
                                    <div>
                                        <button type="button" class="btn btn-primary fs-3 px-4 me-2">Pay Now</button>
                                        <button type="button" class="btn btn-outline-primary fs-3 px-4">Contact</button>
                                    </div>
                                    <div class="fs-3 fw-bold">
                                        <span>Total:</span>
                                        <span>₤0,00</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="tab-pane fade" id="navs-justified-payment" role="tabpanel">
                        <h2>h2</h2>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-intransit" role="tabpanel">
                        <h3>h3</h3>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-completed" role="tabpanel">
                        <h4>h4</h4>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-cancelled" role="tabpanel">
                        <h5>h5</h5>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-refunded" role="tabpanel">
                        <h6>h6</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>