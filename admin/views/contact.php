<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4 fs-3 fw-bold">
            Update Contact
        </h4>

        <div class="col">
            <div class="card mb-4">
                <form action="" method="post">
                    <div class="card-header row gy-3">
                        <div class="col">
                            <h5 class="card-tile">Contact information</h5>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-primary" name="btnSave">
                                    <i class="bx bx-save me-1"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php foreach ($list as $key => $item) : ?>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-4">
                                    <label class="form-label" for="keyContact<?= $key ?>">Key contact</label>
                                    <input type="text" name="keyContact[<?= $key ?>]" class="form-control" id="keyContact<?= $key ?>" value="<?= $item['key_contact'] ?>" disabled>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <label class="form-label" for="valueContact<?= $key ?>">Value contact</label>
                                    <input type="text" name="valueContact[<?= $key ?>]" class="form-control" id="valueContact<?= $key ?>" value="<?= $item['value_contact'] ?>" placeholder="Enter your info">
                                    <!-- Show errors -->
                                    <?php if (isset($_SESSION["errors"]["valueContact"][$key])) : ?>
                                        <span class="bg-label-danger">
                                            <?= $_SESSION["errors"]["valueContact"][$key] ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php unset($_SESSION["errors"]); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>