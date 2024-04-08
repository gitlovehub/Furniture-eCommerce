<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4 fs-3 fw-bold">
            Administrator
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" id="searchInput" placeholder="Search Admin">
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-3">Name</th>
                            <th class="col-3">Email</th>
                            <th class="col-3">Address</th>
                            <th class="col-2">Phone</th>
                            <th class="col-1">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <?php foreach ($list as $item) : ?>
                            <?php if ($item['role'] == 1) : ?>
                                <tr>
                                    <td>
                                        <?= $item['name'] ?>
                                        <?php
                                        $registrationTime = strtotime($item['registration_date']);
                                        $currentTime = time();
                                        $oneDayAgo = strtotime('-48 hours');

                                        if ($registrationTime >= $oneDayAgo && $registrationTime <= $currentTime) {
                                            echo '<span class="badge bg-label-primary">New</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $item['email'] ?></td>
                                    <td><?= $item['address'] ?></td>
                                    <td><?= $item['phone'] ?></td>
                                    <td>
                                        <span class="badge bg-label-success">
                                            <?php
                                            if ($item['status'] == 1) {
                                                echo 'Active';
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endif ?>
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