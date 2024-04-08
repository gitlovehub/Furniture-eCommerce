<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4 fs-3 fw-bold">
            List of Customers
        </h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header row gy-3">
                <div class="col-12 col-sm-3">
                    <input type="search" class="form-control" id="searchInput" placeholder="Search Phone Number">
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="?act=customer-bin" class="btn btn-outline-dark" type="button">
                            <i class="bx bx-trash me-1"></i>
                            Recycle Bin
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-2">Name</th>
                            <th class="col-3">Email</th>
                            <th class="col-3">Address</th>
                            <th class="col-2">Phone</th>
                            <th class="col-1">Status</th>
                            <th class="col-1">
                                <span class="float-end">
                                    Actions
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <?php foreach ($list as $item) : ?>
                            <?php if ($item['role'] == 0) : ?>
                                <tr>
                                    <td>
                                        <?= $item['name'] ?>
                                        <?php
                                        $registrationTime = strtotime($item['registration_date']);
                                        $currentTime = time();
                                        $oneDayAgo = strtotime('-48 hours');

                                        if ($registrationTime >= $oneDayAgo && $registrationTime <= $currentTime) {
                                            echo '<span class="badge bg-label-primary">New</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $item['email'] ?></td>
                                    <td><?= $item['city'] ?? 'Empty' ?></td>
                                    <td><?= $item['phone'] ?? 'Empty' ?></td>
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
                                            <button onclick="openModalUpdateStatus(<?= $item['id'] ?>, 0, 'customer', 'Move to Bin?', 'You can find it in the recycle bin.')" class="btn btn-danger p-2">
                                                <i class="bx bx-block"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif ?>
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
            var productName = row.querySelector("td:nth-child(4)").textContent.toLowerCase(); // Lấy tên sản phẩm và chuyển về chữ thường
            var matchIndex = productName.indexOf(searchTerm); // Tìm vị trí của từ khóa tìm kiếm trong tên sản phẩm

            if (matchIndex !== -1) {
                var textContent = row.querySelector("td:nth-child(4)").textContent;
                var highlightedText = textContent.substring(0, matchIndex) + "<span class='highlight'>" + textContent.substring(matchIndex, matchIndex + searchTerm.length) + "</span>" + textContent.substring(matchIndex + searchTerm.length);
                row.querySelector("td:nth-child(4)").innerHTML = highlightedText;
                row.style.display = ""; // Hiển thị hàng nếu có từ khóa tìm kiếm
            } else {
                row.style.display = "none"; // Ẩn hàng nếu không có từ khóa tìm kiếm
            }
        });
    });
</script>