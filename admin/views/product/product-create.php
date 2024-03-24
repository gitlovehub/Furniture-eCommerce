<?php require_once 'show-toast.php'; ?>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Add a new Product
            <a href="?act=product-list" class="btn btn-secondary float-end" type="button">
                <i class="bx bx-arrow-back me-0 me-sm-1"></i>
                Back to list
            </a>
        </h4>

        <form action="" method="post" class="row" enctype="multipart/form-data">
            <div class="col-sm-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product information</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-name">Name</label>
                            <input type="text" name="productName" class="form-control" id="product-name" placeholder="Product title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-description">
                                Description
                                <span class="text-muted">(Optional)</span>
                            </label>
                            <textarea rows="6" cols="50" name="productDescription" class="form-control" id="product-description" placeholder="Enter description here"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Media</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-thumbnail">Thumbnail</label>
                            <input type="file" name="productThumbnail" class="form-control" id="product-thumbnail">
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
                            <label class="form-label" for="product-category">Category</label>
                            <select class="form-select" id="product-category" name="productCategory">
                                <?php foreach ($listCategory as $value) : ?>
                                    <option value="<?= $value['id'] ?>">
                                        <?= $value['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Inventory</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-instock">Add to stock</label>
                            <input type="number" min="0" name="productInstock" class="form-control" id="product-instock" placeholder="Quantity">        
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pricing</h5>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product-price">Base price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" min="0" name="productPrice" class="form-control" id="product-price" placeholder="1000">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product-discount">Discount percent</label>
                            <div class="input-group">
                                <input type="number" min="0" max="100" name="productDiscount" class="form-control" id="product-discount" placeholder="10">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button class="btn btn-primary" type="submit">
                        <i class="bx bx-upload me-0 me-sm-1"></i>
                        Publish product
                    </button>
                </div>
            </div>
        </form>

    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>