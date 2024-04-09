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
            }

            if (checkInstock($id, $quantity)) {
                $_SESSION["limited"] = 'Maximum stock reached! Please adjust quantity.';
                header('Location: ?act=product-detail&id=' . $id);
                exit();
            }

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
        header('Location: ?act=product-detail&id=' . $id);
        exit();
    }

    if (isset($_POST['btnBuyNow'])) {
        // kiểm tra xem đăng nhập chưa
        if (isset($_SESSION["user"])) {
            $colors = getColors('tbl_colors', $id);
            $thumbnail = null;
            $colorName = null; // Khởi tạo $thumbnail
            if (isset($colors)) {
                foreach ($colors as $color) {
                    $colorId = $color['id'];
                    if ($_POST["color"] == $colorId) {
                        $thumbnail = $color['color_thumbnail'];
                        $colorName = $color['color_name']; // Gán thumbnail tương ứng
                        break; // Thoát vòng lặp sau khi đã tìm thấy thumbnail
                    }
                }
            }

            $data = [
                'productId' => $id ?? null,
                'customer'  => $_SESSION["user"]['id'] ?? null,
                'name'      => $_POST["name"] ?? null,
                'price'     => $_POST["price"] ?? null,
                'discount'  => $_POST["discount"] ?? null,
                'quantity'  => $_POST["quantity"] ?? null,
                'colorId'   => $_POST["color"] ?? null,
                'color'     => $colorName,
                'thumbnail' => $thumbnail, // Thêm thumbnail vào mảng data
            ];

            if (empty($data['color'])) {
                $_SESSION["missing-color"] = '🎨 Please select a color!';
                header('Location: ?act=product-detail&id=' . $id);
                exit();
            } else {
                
                if (checkInstock($id, $data['quantity'])) {
                    $_SESSION["limited"] = 'Maximum stock reached! Please adjust quantity.';
                    header('Location: ?act=product-detail&id=' . $id);
                    exit();
                }

                $_SESSION["buy-now"] = $data;
                $_SESSION["product-buy-now"] = $data;
                header('Location: ?act=checkout&user=' . $data['customer']);
                exit();
            }

        } else {
            $_SESSION["login-first"] = 'Please Log in First! 😊';
            header('Location: ?act=product-detail&id=' . $id);
            exit();
        }
    }
}

function deleteQuickCartItem($id) {
    deleteOne('tbl_carts', $id);
    $_SESSION["cart-overlay"]=true;
    echo "<script>window.history.back();</script>";
}

function reviewCart() {
    $titleBar = 'Review Cart';
    $view     = 'cart/review-cart';
    require_once PATH_VIEW . 'layouts/master.php';
}

function updateCart($id) {
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
            header('Location: ?act=review-cart');
            exit();
        }
    }
}

function removeCartItem($id) {
    $titleBar = 'Review Cart';
    $view     = 'cart/review-cart';
    deleteOne('tbl_carts', $id);
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function checkout($id) {
    $titleBar = 'Checkout';
    $view     = 'cart/checkout';
    $customer = selectOne('tbl_accounts', $id);

    require_once PATH_VIEW . 'layouts/blank.php';
}