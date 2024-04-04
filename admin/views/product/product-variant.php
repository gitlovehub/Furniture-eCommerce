<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Add color variant for Product
            <a href="?act=product-list" class="btn btn-secondary float-end" type="button">
                <i class="bx bx-arrow-back me-1"></i>
                Back to list
            </a>
        </h4>

        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <?php foreach ($colors as $color) : ?>
                    <img class="shadow-sm mb-2" src="<?= PATH_UPLOAD . $color['color_thumbnail'] ?>" width="100%" alt="">
                <?php endforeach; ?>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-3">Color Name</th>
                                    <th class="col-2">Hex</th>
                                    <th class="col-2 text-center">Color</th>
                                    <th class="col-2">
                                        <span class="float-end">
                                            Actions
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($colors as $color) : ?>
                                    <tr>
                                        <td><?= $color['name'] ?></td>
                                        <td>#<?= $color['hex'] ?></td>
                                        <td class="text-center">
                                            <span class="shadow-sm border" style="padding: 10px 18px; background-color: #<?= $color['hex'] ?>;"></span>
                                        </td>
                                        <td>
                                            <div class="float-end">
                                                <a href="?act=delete-color&id=<?= $color['id'] ?>&product=<?= $show["id"] ?>" class="btn btn-danger p-2">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Variants</h5>
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="name">Color Name</label>
                                <input type="text" name="colorName" class="form-control" id="name" placeholder="Color name" value="<?= isset($_SESSION["data"]) ? $_SESSION["data"]["name"] : null ?>">
                                <!-- Show errors -->
                                <?php if (isset($_SESSION["errors"]["colorName"])) : ?>
                                    <span class="bg-label-danger">
                                        <?= $_SESSION["errors"]["colorName"] ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="hex">Hex</label>
                                <div class="input-group">
                                    <span class="input-group-text">#</span>
                                    <input type="text" name="colorHex" class="form-control" id="hex" value="<?= isset($_SESSION["data"]) ? $_SESSION["data"]["hex"] : null ?>">
                                </div>
                                <!-- Show errors -->
                                <?php if (isset($_SESSION["errors"]["colorHex"])) : ?>
                                    <span class="bg-label-danger">
                                        <?= $_SESSION["errors"]["colorHex"] ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="color-thumbnail">Color thumbnail</label>
                                <input type="file" name="colorThumbnail" class="form-control" id="color-thumbnail">
                                <!-- Show errors -->
                                <?php if (isset($_SESSION["errors"]["colorThumbnail"])) : ?>
                                    <span class="bg-label-danger">
                                        <?= $_SESSION["errors"]["colorThumbnail"] ?>
                                    </span>
                                <?php endif; ?>
                                <?php unset($_SESSION["errors"]); ?>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        <button class="btn btn-primary" type="submit" name="btnPublishColor">
                            <i class="bx bx-upload me-1"></i>
                            Publish color
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>