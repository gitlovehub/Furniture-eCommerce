<?php

function orderSuccess() {
    $titleBar = 'Thank You';
    $view     = 'order/success';
    require_once PATH_VIEW . 'layouts/blank.php';
}

function insertOrderDetails($orderId, $productId, $colorId, $quantity, $price) {
    // Kiểm tra dữ liệu đầu vào
    if (empty($orderId) || empty($productId) || empty($colorId) || empty($quantity) || empty($price)) {
        return false;
    } else {
        $orderId   = intval($orderId);
        $productId = intval($productId);
        $colorId   = intval($colorId);
        $quantity  = intval($quantity);
    }

    $data = [
        'id_order'   => $orderId ?? null,
        'id_product' => $productId ?? null,
        'id_color'   => $colorId ?? null,
        'quantity'   => $quantity ?? null,
        'price'      => $price ?? null,
    ];
    // Trả về true nếu thêm thành công, ngược lại trả về false
    return insert('tbl_order_details', $data) ? true : false;
}

function placeOrder($customerId) {
    if (isset($_POST['btnOrder'])) {
        // Kiểm tra xem đã đăng nhập chưa
        if (!empty($_SESSION["user"])) {
            $carts = getCartByCustomer('tbl_carts', $_SESSION["user"]['id']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            
            $orderData = [
                'date'            => date('Y-m-d H:i:s'),
                'method'          => $_POST["method"] ?? null,
                'total'           => $_POST["total"] ?? null,
                'note'            => $_POST["note"] ?? null,
                'id_customer'     => $customerId ?? null,
            ];

            // Validate
            $errors = validateCheckout($orderData);
            if (!empty($errors)) {
                $_SESSION["errors"] = $errors;
                $_SESSION["data"]   = $orderData;
                header('Location: ?act=checkout&user=' . $customerId);
                exit();
            }
            
            if (insert('tbl_orders', $orderData)) {
                $orderId = getLastId('tbl_orders'); // Lấy ID của đơn hàng mới thêm vào
                updatePaymentStatus($orderId, $orderData['method']);

                if (isset($_SESSION["product-buy-now"])) {
                    // Xử lý sản phẩm mua ngay
                    $itemBuyNow = $_SESSION["product-buy-now"];
                    $unitPrice = $itemBuyNow['price'] - ($itemBuyNow['price'] * $itemBuyNow['discount'] / 100);
                    insertOrderDetails($orderId, $itemBuyNow['productId'], $itemBuyNow['colorId'], $itemBuyNow['quantity'], $unitPrice);
                    decreaseInstock($itemBuyNow['productId'], $itemBuyNow['quantity']); // Giảm số lượng hàng tồn kho
                } else {
                    // Xử lý từng sản phẩm trong giỏ hàng
                    foreach ($carts as $cart) {
                        $unitPrice = $cart['price'] - ($cart['price'] * $cart['discount'] / 100);
                        insertOrderDetails($orderId, $cart['id_product'], $cart['id_color'], $cart['quantity'], $unitPrice);
                        decreaseInstock($cart['id_product'], $cart['quantity']); // Giảm số lượng hàng tồn kho
                        deleteCartItemsByProductId($cart['id_product']); // Xóa sản phẩm trong giỏ hàng sau khi đặt hàng
                    }
                }
                header('Location: ?act=order-success');
                unset($_SESSION["product-buy-now"]);
                exit();
            } else {
                debug($orderData);
            }
        } else {
            $_SESSION["login-first"] = 'Please Log in First! 😊';
        }
    }
}



function validateCheckout($data) {
    $errors = [];
    $message = 'Oops! 🧐 Please fill in all shipping info.';

    // Validate name
    if (empty($_POST["username"])) {
        $errors['missingInfo'] = $message;
    }

    // Validate phone
    if (empty($_POST["phone"])) {
        $errors['missingInfo'] = $message;
    }

    // Validate address
    if (empty($_POST["address"])) {
        $errors['missingInfo'] = $message;
    }

    // Chuỗi cần kiểm tra
    $city = $_POST["city"];$pattern = '/[a-zA-Z]/';

    // Validate city
    if (!preg_match($pattern, $city)) {
        $errors['missingInfo'] = $message;
    }

    // Validate payment method
    if (!isset($data['method'])) {
        $errors['missingMethod'] = '💸 Please select a payment method.';
    }

    return $errors;
}