<?php require_once 'show-toast.php'; ?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Add a new Image
            <a href="?act=product-list" class="btn btn-secondary float-end" type="button">
                <i class="bx bx-arrow-back me-0 me-sm-1"></i>
                Back to list
            </a>
        </h4>
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>
                            <?= $show['name'] ?>
                        </h4>
                        <img src="<?= '../' . $show['thumbnail'] ?>" width="400px">
                    </div>
                    <div class="card-body row">
                        <?php foreach ($list as $item) : ?>
                            <div class="col-md-4 mb-4 position-relative">
                                <a href="?act=delete-image&id=<?= $item['id'] ?>&back=<?= $_GET["id"] ?>" class="img-link d-block position-relative">
                                    <div class="ovl position-absolute top-50 start-50 translate-middle">
                                        <i class="bx bx-x-circle position-absolute top-50 start-50 translate-middle fs-2"></i>
                                    </div>
                                    <img src="<?= '../' . $item['url'] ?>" width="100%" height="100%" class="img-thumbnail shadow-lg">
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Media</h5>
                        </div>

                        <div class="card-body">
                            <label class="form-label" for="product-gallery">Product gallery</label>
                            <input type="file" name="productGallery" class="form-control" id="product-gallery">
                        </div>

                        <div class="card-footer">
                            <div class="float-end">
                                <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                                <button class="btn btn-primary" name="add" type="submit">
                                    <i class="bx bx-upload me-0 me-sm-1"></i>
                                    Publish Image
                                </button>
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