<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Order List
        </h4>

        <!-- Order List Widget -->
        <div class="card mb-4">
            <div class="card-widget-separator-wrapper">
                <div class="card-body card-widget-separator">
                    <div class="row gy-4 gy-sm-1">
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                <div>
                                    <h3 class="mb-2">56</h3>
                                    <p class="mb-0">Pending Payment</p>
                                </div>
                                <div class="avatar me-sm-4">
                                    <span class="avatar-initial rounded bg-label-info">
                                        <i class="bx bx-calendar bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none me-4">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                <div>
                                    <h3 class="mb-2">12,689</h3>
                                    <p class="mb-0">Completed</p>
                                </div>
                                <div class="avatar me-lg-4">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bx-check-double bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                            <hr class="d-none d-sm-block d-lg-none">
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                <div>
                                    <h3 class="mb-2">124</h3>
                                    <p class="mb-0">Refunded</p>
                                </div>
                                <div class="avatar me-sm-4">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="bx bx-wallet bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h3 class="mb-2">32</h3>
                                    <p class="mb-0">Failed</p>
                                </div>
                                <div class="avatar">
                                    <span class="avatar-initial rounded bg-label-danger">
                                        <i class="bx bx-error-alt bx-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Order List Widget -->

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" name="search" placeholder="Search Order">
                </div>
                <div class="col"></div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">Date</th>
                            <th class="col-2">Customers</th>
                            <th class="col-2">Payment</th>
                            <th class="col-2">Delivery</th>
                            <th class="col-2">Method</th>
                            <th class="col-1">
                                <span class="float-end">
                                    Actions
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <?php foreach ($list as $item) : ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['date'] ?></td>
                                <td><?= $item['customer_name'] ?></td>
                                <td>
                                    <span class="badge <?= ($item['payment_status'] == 0) ? 'bg-label-warning' : (($item['payment_status'] == 1) ? 'bg-label-success' : 'bg-label-danger') ?> mx-3">
                                        <?= ($item['payment_status'] == 0) ? 'Pending' : (($item['payment_status'] == 1) ? 'Paid' : 'Canceled') ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge <?= ($item['delivery_status'] == 0) ? 'bg-label-warning' : (($item['delivery_status'] == 1) ? 'bg-label-primary' : (($item['delivery_status'] == 2) ? 'bg-label-success' : 'bg-label-danger')) ?>">
                                        <?= ($item['delivery_status'] == 0) ? 'Pending' : (($item['delivery_status'] == 1) ? 'In transit' : (($item['delivery_status'] == 2) ? 'Delivered' : 'Delivery failed')) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge <?= ($item['method'] == 0) ? 'bg-label-warning' : 'bg-label-primary' ?>">
                                        <?= ($item['method'] == 0) ? 'Cash on delivery' : 'Online payment' ?>
                                    </span>

                                </td>
                                <td>
                                    <div class="float-end">
                                        <a href="?act=order-details&id=<?= $item['id'] ?>" class="btn btn-primary p-2">
                                            <i class="bx bx-show-alt"></i>
                                        </a>
                                        <button onclick="" class="btn btn-danger p-2">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>