<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            List of Categories
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <label class="col-12 col-sm-3">
                    <input type="search" class="form-control" placeholder="Search Category">
                </label>
                <div class="col">
                    <a href="?act=add-category" class="btn btn-secondary add-new btn-primary float-end" type="button">
                        <i class="bx bx-plus me-0 me-sm-1"></i>
                        Add Category
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>iD</th>
                            <th>Name</th>
                            <th>
                                <span class="float-end">
                                    Actions
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <?php foreach($list as $item) : ?>
                        <tr>
                            <td>
                                <?= $item['id_category'] ?>
                            </td>
                            <td>
                                <?= $item['name_category'] ?>
                            </td>
                            <td>
                                <div class="float-end">
                                    <a href="" class="badge bg-label-success">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <a href="" class="badge bg-label-danger">
                                        <i class="bx bx-trash me-1"></i>
                                    </a>
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