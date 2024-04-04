<?php 

function addToCart($id) {

    if (isset($_POST['btnAddToCart'])) {
        // kiểm tra xem đăng nhập chưa
        if (isset($_SESSION["user"])) {
            $product  = $id ?? null;
            $customer = $_SESSION["user"]['id'] ?? null;
            $quantity = $_POST["quantity"] ?? null;
            $color    = $_POST["color"] ?? null;
    
            if (empty($color)) {
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
        } else {
            $_SESSION["login-first"] = 'Please Log in First! 😊';
        }
    }
    header('Location: ?act=product-detail&id=' . $id);
    exit();
}

function deleteQuickCartItem($id) {
    deleteOne('tbl_carts', $id);
    $_SESSION["cart-overlay"]=true;
    echo "<script>window.history.back();</script>";
}

function reviewCart() {
    $titleBar = 'Review Cart';
    $view     = 'cart/review';

    require_once PATH_VIEW . 'layouts/master.php';
}

function updateCart($id) {
    $titleBar = 'Review Cart';
    $view     = 'cart/review';
    $success  = true;

    if(isset($_POST['btnUpdateCart'])) {
        // Lặp qua các sản phẩm trong giỏ hàng
        foreach($_POST['productQty'] as $id => $newQuantity) {
            // Cập nhật số lượng sản phẩm trong cơ sở dữ liệu
            if(!updateCartItemQuantity($id, $newQuantity)) {
                $success = false;
                break; // Thoát khỏi vòng lặp
            }
        }
        if($success) {
            $_SESSION["updatecart-success"] = 'Your cart got a stylish upgrade! 🛒✨';
        }
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function removeCartItem($id) {
    $titleBar = 'Review Cart';
    $view     = 'cart/review';
    deleteOne('tbl_carts', $id);
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function checkout() {
    $titleBar = 'Checkout';
    $view     = 'cart/checkout';

    require_once PATH_VIEW . 'layouts/blank.php';
}