<?php require_once 'show-toast.php'; ?>
<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
        Show Deactivated Products
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" name="search" placeholder="Search Product">
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="?act=product-list" class="btn btn-secondary" type="button">
                            <i class="bx bx-arrow-back me-0 me-sm-1"></i>
                            Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Category</th>
                            <th class="col-2">Name</th>
                            <th class="col-1">Base Price</th>
                            <th class="col-1">Discount</th>
                            <th class="col-1">Instock</th>
                            <th class="col-3 text-center">Thumbnail</th>
                            <th class="col-1 text-center">Status</th>
                            <th class="col-1">
                                <span class="float-end">
                                    Actions
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($list as $item) : 
                            if ($item['status'] == 0) : 
                        ?>
                        <tr>
                            <td><?= $item['c_name'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td class="text-center"><?= $item['price'] ?></td>
                            <td class="text-center"><?= $item['discount'] ?>%</td>
                            <td class="text-center"><?= $item['instock'] ?></td>
                            <td class="text-center">
                                <img src="<?='../'.$item['thumbnail'] ?>" width="100px" alt="">
                            </td>
                            <td>
                                <span class="badge bg-label-secondary">
                                    <?php
                                    if ($item['status'] == 0) {
                                        echo 'Deactivated';
                                    }
                                    ?>
                                </span>
                            </td>
                            <td>
                                <div class="float-end">
                                    <button onclick="openModalStatus(<?= $item['id'] ?>, 1, 'product', 'Active item?', '')" class="btn btn-success p-2">
                                        Active
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            endif;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>