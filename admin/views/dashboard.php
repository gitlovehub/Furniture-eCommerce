<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <i class="bx bx-package fs-2 bg-label-primary rounded p-2"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-medium mb-2">Total products</h5>
                        <h3 class="card-title mb-2">
                            <?= $productCount ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <i class="bx bx-user-check fs-2 bg-label-success rounded p-2"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-medium mb-2">Total customers</h5>
                        <h3 class="card-title mb-2">
                            <?= $customerCount ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <i class="bx bx-receipt fs-2 bg-label-warning rounded p-2"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-medium mb-2">Total orders</h5>
                        <h3 class="card-title text-nowrap mb-2">
                            <?= $orderCount ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <i class="bx bx-wallet fs-2 bg-label-info rounded p-2"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-medium mb-2">Revenue</h5>
                        <h3 class="card-title mb-2">
                            ₤<?= number_format($revenue, 2, '.', ',') ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row my-4">
            <div class="col-12 col-lg-8 mb-4">
                <div class="card p-4">
                    <h3 class="card-title">7 days recently</h3>
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Top Selling Products</h3>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <?php foreach ($bestSelling as $item) : ?>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="p-1 rounded" style="width: 100px; background-color: #f2f2f2;">
                                        <img src="<?= PATH_UPLOAD .  $item['thumbnail'] ?>" class="w-100 d-block" alt="">
                                    </div>
                                    <div class="ms-2 my-auto">
                                        <h6 class="mb-2"><?= $item['name'] ?></h6>
                                        <span class="text-secondary">
                                            in stock: <?= $item['instock'] ?>
                                        </span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Daily order count',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 4,
                fontSize: 20
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>