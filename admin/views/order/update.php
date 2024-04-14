<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="py-3 mb-4 d-flex flex-wrap justify-content-between align-items-center">
            <span class="fs-3 fw-bold">Update Payment and Delivery Status</span>
            <a href="?act=order-list" class="btn btn-secondary" type="button">
                <i class="bx bx-arrow-back me-1"></i>
                Back to list
            </a>
        </div>

        <h5 class="mb-3 ms-1">Customer:
            <span class="fw-semibold"><?= $item['customer_name'] ?></span>
        </h5>
        <h5 class="mb-3 ms-1">Order date:
            <span class="fw-semibold"><?= $status['date'] ?></span>
        </h3>
        <h5 class="mb-3 ms-1">Payment method:
            <span class="badge fw-semibold <?= ($status['method'] == 0) ? 'bg-label-info' : 'bg-label-primary' ?>">
                <?= ($status['method'] == 0) ? 'Cash on delivery' : 'Online payment' ?>
            </span>
        </h5>

        <form action="?act=update-order&id=<?= $status['id'] ?>" method="post">
            <div class="row gy-4">
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <span class="fs-5 fw-bold me-2">Payment Status</span>
                            <span class="fw-semibold fs-5 badge <?= ($status['payment_status'] == 0) ? 'bg-label-warning' : (($status['payment_status'] == 1) ? 'bg-label-success' : 'bg-label-danger') ?>">
                                <?= ($status['payment_status'] == 0) ? 'Unpaid' : (($status['payment_status'] == 1) ? 'Paid' : 'Refunded') ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <select name="paymentValue" class="form-select form-select-lg mb-3">
                                <option disabled selected>Open this select menu</option>
                                <option value="1">Paid</option>
                                <option value="2">refunded</option>
                            </select>

                            <button type="submit" name="btnUpdatePayment" class="btn btn-primary my-2 float-end <?= ($status['payment_status'] == 2) ? 'disabled' : '' ?>">Update Payment</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <span class="fs-5 fw-bold me-2">Delivery Status</span>
                            <span class="fw-semibold fs-5 badge <?= ($status['delivery_status'] == 0) ? 'bg-label-warning' : (($status['delivery_status'] == 1) ? 'bg-label-primary' : (($status['delivery_status'] == 2) ? 'bg-label-success' : 'bg-label-danger')) ?>">
                                <?= ($status['delivery_status'] == 0) ? 'Pending' : (($status['delivery_status'] == 1) ? 'In transit' : (($status['delivery_status'] == 2) ? 'Delivered' : 'failed')) ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <select name="deliveryValue" class="form-select form-select-lg mb-3">
                                <option disabled selected>Open this select menu</option>
                                <option value="1">In Transit</option>
                                <option value="2">Delivered</option>
                                <option value="3">Failed</option>
                            </select>

                            <button type="submit" name="btnUpdateDelivery" class="btn btn-primary my-2 float-end <?= ($status['delivery_status'] == 3) ? 'disabled' : '' ?>">Update Delivery</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>