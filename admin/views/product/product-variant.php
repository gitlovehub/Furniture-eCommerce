<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="py-3 mb-4 d-flex flex-wrap justify-content-between align-items-center">
            <span class="fs-3 fw-bold">Add color variant for Product – <span><?= $product["name"] ?></span></span>
            <a href="?act=product-list" class="btn btn-secondary" type="button">
                <i class="bx bx-arrow-back me-1"></i>
                Back to list
            </a>
        </div>

        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <?php foreach ($colors as $color) : ?>
                    <img class="shadow-sm mb-2" src="<?= PATH_UPLOAD . $color['color_thumbnail'] ?>" width="100%" alt="">
                <?php endforeach; ?>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <input type="search" class="form-control" id="searchInput" placeholder="Search Color Name">
                    </div>
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
                                                <a href="?act=delete-color&id=<?= $color['id'] ?>&product=<?= $product["id"] ?>" class="btn btn-danger p-2">
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
                            <div class="card-title mb-0">
                                <label for="exampleColorInput" class="form-label">Color picker</label>
                                <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
                            </div>
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

<script>
    var style = document.createElement('style');
    style.textContent = `
                        .highlight {
                            background-color: yellow;
                            font-weight: bold;
                        }
                    `;
    document.head.appendChild(style);

    // Lắng nghe sự kiện input trên ô tìm kiếm
    document.getElementById("searchInput").addEventListener("input", function() {
        var searchTerm = this.value.trim().toLowerCase(); // Lấy giá trị từ ô tìm kiếm và chuyển về chữ thường, loại bỏ các khoảng trắng thừa
        var tableRows = document.querySelectorAll(".table tbody tr");

        tableRows.forEach(function(row) {
            var productName = row.querySelector("td:nth-child(1)").textContent.toLowerCase(); // Lấy tên sản phẩm và chuyển về chữ thường
            var matchIndex = productName.indexOf(searchTerm); // Tìm vị trí của từ khóa tìm kiếm trong tên sản phẩm

            if (matchIndex !== -1) {
                var textContent = row.querySelector("td:nth-child(1)").textContent;
                var highlightedText = textContent.substring(0, matchIndex) + "<span class='highlight'>" + textContent.substring(matchIndex, matchIndex + searchTerm.length) + "</span>" + textContent.substring(matchIndex + searchTerm.length);
                row.querySelector("td:nth-child(1)").innerHTML = highlightedText;
                row.style.display = ""; // Hiển thị hàng nếu có từ khóa tìm kiếm
            } else {
                row.style.display = "none"; // Ẩn hàng nếu không có từ khóa tìm kiếm
            }
        });
    });
</script>