<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Feature Banners
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" name="search" placeholder="Search Banner">
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Category</th>
                            <th class="col-1">Grid</th>
                            <th class="col-2">Title</th>
                            <th class="col-4 text-center">Image</th>
                            <th class="col-1">Status</th>
                            <th class="col-2">
                                <span class="float-end">
                                    Actions
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        foreach ($list as $item) :
                            if ($item['status'] == 1) :
                        ?>
                                <tr>
                                    <td><?= $item['c_name'] ?></td>
                                    <td><?= $item['grid'] ?></td>
                                    <td><?= $item['title'] ?></td>
                                    <td class="text-center">
                                        <img src="<?= PATH_UPLOAD . $item['image'] ?>" width="200px" alt="">
                                    </td>
                                    <td>
                                        <span class="badge bg-label-success">
                                            <?php
                                            if ($item['status'] == 1) {
                                                echo 'Active';
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="float-end">
                                            <a href="?act=update-banner&id=<?= $item['id'] ?>" class="btn btn-primary p-2">
                                                <i class="bx bx-edit-alt"></i>
                                            </a>
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