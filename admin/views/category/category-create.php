<?php require_once 'show-toast.php'; ?>
<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Create a new Category
        </h4>

        <div class="col">
            <div class="card mb-4">
                <form action="" method="post">
                    <div class="card-header row gy-3">
                        <div class="col">
                            <h5 class="card-tile">Category information</h5>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="?act=category-list" class="btn btn-secondary" type="button">
                                    <i class="bx bx-arrow-back me-0 me-sm-1"></i>
                                    Back to list
                                </a>
                                <button type="submit" class="btn btn-primary" name="btnPublish">
                                    <i class="bx bx-upload me-0 me-sm-1"></i>
                                    Publish category
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="categoryId">iD</label>
                                <input type="number" name="categoryId" class="form-control" id="categoryId" placeholder="auto" disabled>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="categoryName">Name</label>
                                <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="Category title"
                                value="<?= isset($_SESSION["data"]) ? $_SESSION["data"]["name"] : null ?>"
                                >
                                <!-- Show errors -->
                                <?php if (isset($_SESSION["errors"]["categoryName"])) : ?>
                                    <span class="bg-label-danger">
                                        <?= $_SESSION["errors"]["categoryName"] ?>
                                    </span>
                                <?php endif; ?>
                                <?php unset($_SESSION["errors"]); ?>
                                <?php unset($_SESSION["data"]); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>