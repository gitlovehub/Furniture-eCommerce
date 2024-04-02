<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
        Show Inactive Categories
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" name="search" placeholder="Search Category">
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="?act=category-list" class="btn btn-secondary" type="button">
                            <i class="bx bx-arrow-back me-1"></i>
                            Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-8">Name</th>
                            <th class="col-2">Status</th>
                            <th class="col-2">
                                <span class="float-end">
                                    Actions
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <?php foreach ($list as $item) : ?>
                            <tr>
                                <td><?= $item['name'] ?></td>
                                <td>
                                    <span class="badge bg-label-secondary">
                                        <?php
                                        if ($item['status'] == 0) {
                                            echo 'Inactive';
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="float-end">
                                        <button onclick="openModalUpdateStatus(<?= $item['id'] ?>, 1, 'category', 'Active now?', '')" class="btn btn-success p-2">
                                            Active
                                        </button>
                                        <button onclick="openModalDelete(<?= $item['id'] ?>, 'delete-category')" class="btn btn-danger p-2">
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