<?php
// Kiểm tra xem có thông báo thành công từ session không?
if (isset($_SESSION["success"])) {
    // Hiển thị toast
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".bs-toast").classList.add("show");
                setTimeout(function() {
                    document.querySelector(".bs-toast").classList.remove("show");
                }, 3000);
            });
        </script>';

    // Xóa thông báo thành công từ session
    unset($_SESSION["success"]);
}
?>