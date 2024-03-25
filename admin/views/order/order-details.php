<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Order Details
            <a href="?act=order-list" class="btn btn-secondary float-end" type="button">
                <i class="bx bx-arrow-back me-0 me-sm-1"></i>
                Back to list
            </a>
        </h4>

        <!-- Order Details Table -->
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <span class="badge bg-label-primary">
                            Order:
                            <?php foreach ($list as $item) {
                                extract($item);
                            } ?>
                            #<?= $item['order_id'] ?>
                        </span>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-5">Products</th>
                                    <th class="col-1">Price</th>
                                    <th class="col-1">Discount</th>
                                    <th class="col-1">Sales</th>
                                    <th class="col-1">Quantity</th>
                                    <th class="col-1 text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom">

                                <?php $payment = 0; ?>
                                <?php foreach ($list as $item) : ?>
                                    <?php
                                    $basePrice      = $item['product_price'];
                                    $discount       = $item['product_discount'];
                                    $discountAmount = $basePrice * ($discount / 100);
                                    $sales          = $basePrice - $discountAmount;
                                    $qty            = $item['product_quantity'];
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="<?= PATH_UPLOAD . $item['product_thumbnail'] ?>" width="80px">
                                                <?= $item['product_name'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $basePrice ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $discount ?>%
                                        </td>
                                        <td>
                                            <?= $sales ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $qty ?>
                                        </td>
                                        <td class="text-end">
                                            <?= $sales * $qty ?>
                                        </td>
                                    </tr>
                                    <?php $payment += $sales * $qty; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" style="padding: 20px;">
                        <div class="d-flex float-end">
                            <h5 class="w-px-100">Payment:</h5>
                            <h5>
                                <?= $payment; ?>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Customer name</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-4">
                            <img src="<?= PATH_UPLOAD . $item['customer_avatar'] ?>" class="rounded-circle me-2" width="50px">
                            <div class="d-flex flex-column">
                                <h5 class="mb-0">
                                    <?= $item['customer_name'] ?>
                                </h5>
                                <small class="text-muted">Customer ID:
                                    <?= $item['customer_id'] ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Contact info</h5>
                    </div>
                    <div class="card-body">
                        <p>
                            <i class="bx bx-envelope fs-3 me-0 me-sm-1"></i>
                            <?= $item['customer_email'] ?>
                        </p>
                        <p class="mb-0">
                            <i class="bx bx-phone fs-3 me-0 me-sm-1"></i>
                            <?= $item['customer_phone'] ?>
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Shipping address</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            <i class="bx bx-navigation fs-3 me-0 me-sm-1"></i>
                            <?= $item['customer_address'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Order Details Table -->

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>