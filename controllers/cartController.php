<?php 

function addToCart($id) {

    if (isset($_POST['btnAddToCart'])) {
        $product  = $id ?? null;
        $customer = $_SESSION["user"]['id'] ?? null;
        $quantity = $_POST["quantity"] ?? null;
        $color    = $_POST["color"] ?? null;

        if (!isset($color)) {
            $_SESSION["missing-color"] = '🎨 Please select a color!';
            header('Location: ?act=product-detail&id=' . $id);
            exit();
        } elseif ($color == 0) {}
    
        // Thêm sản phẩm vào giỏ hàng và kiểm tra kết quả
        if (insertToCart($customer, $product, $quantity, $color)) {
            // Xử lý thông báo thành công
            if ($quantity == 1) {
                $_SESSION["addtocart-success"] = 'One product added to your cart.';
            } else {
                $_SESSION["addtocart-success"] = $quantity . ' Products added to your cart.';
            }
        }
    }
    header('Location: ?act=product-detail&id=' . $id);
    exit();
}

function deleteItem($id) {
    deleteOne('tbl_carts', $id);
    echo "<script>window.history.back();</script>";
}
