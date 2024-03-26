<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Refresh Your Store's Look!
            <a href="?act=banner-list" class="btn btn-secondary float-end" type="button">
                <i class="bx bx-arrow-back me-0 me-sm-1"></i>
                Back to list
            </a>
        </h4>

        <form action="" method="post" class="row" enctype="multipart/form-data">
            <div class="col-sm-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Banner information</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="banner-title">Title</label>
                            <input type="text" name="bannerTitle" class="form-control" id="banner-title" placeholder="Banner title" value="<?= $show['title'] ?>">
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["bannerTitle"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["bannerTitle"] ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Media</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="banner-image">Image</label>
                            <input type="file" name="bannerImage" class="form-control" id="banner-image">
                            <input type="hidden" name="img-current" value="<?= $show['image'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Organize</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="banner-category">Category</label>
                            <select class="form-select" id="banner-category" name="bannerCategory">
                                <?php foreach ($listCategory as $value) : ?>
                                    <option <?= $value['id'] == $show['id_category'] ? 'selected' : '' ?> value="<?= $value['id'] ?>">
                                        <?= $value['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <!-- Show errors -->
                            <?php if (isset($_SESSION["errors"]["bannerCategory"])) : ?>
                                <span class="bg-label-danger">
                                    <?= $_SESSION["errors"]["bannerCategory"] ?>
                                </span>
                            <?php endif; ?>
                            <?php unset($_SESSION["errors"]); ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button class="btn btn-primary" type="submit" name="btnSave">
                        <i class="bx bx-save me-0 me-sm-1"></i>
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>