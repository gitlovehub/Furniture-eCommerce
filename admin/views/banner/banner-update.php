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
            <div class="col-12 col-lg-8">
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
                            <label class="form-label" for="img">Image</label>
                            <input type="file" name="bannerImage" class="form-control" id="img" onchange="previewImage()">
                            <input type="hidden" name="img-current" id="img-current" value="<?= $show['image'] ?>">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mb-4">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button class="btn btn-primary" type="submit" name="btnSave">
                        <i class="bx bx-save me-0 me-sm-1"></i>
                        Save
                    </button>
                </div>
            </div>

            <div class="col-12 col-lg-4">
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

                <div class="card mb-4">
                    <img src="<?= PATH_UPLOAD . $show['image'] ?>" id="img-preview" class="w-100 d-block card" height="100px" alt="">
                </div>
            </div>
        </form>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>

<script>
    var imgPreview = document.getElementById('img-preview');
    var imgCurrent = document.getElementById('img-current');
    var input      = document.getElementById('img');

    function previewImage() {

        // Check if a file is selected
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);

            // Update the hidden input value to the new image data
            imgCurrent.value = '';
        } else {
            // If no file is selected, keep the current image
            imgPreview.src = imgCurrent.value;
        }
    }

    function deleteImage() {
        imgCurrent.value = '';
        imgPreview.src   = '';
    }
</script>