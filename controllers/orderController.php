<?php

function orderSuccess() {
    $titleBar = 'Thank You';
    $view     = 'order/success';
    require_once PATH_VIEW . 'layouts/blank.php';
}

function placeOrder($id) {
    if (isset($_POST['btnOrder'])) {
        // kiểm tra xem đăng nhập chưa
        if (!empty($_SESSION["user"])) {
            $carts = getCartByCustomer('tbl_carts', $_SESSION["user"]['id']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $data = [
                'date'            => date('Y-m-d H:i:s'),
                'payment_status'  => $_POST["payment_status"] ?? 0,
                'delivery_status' => $_POST["delivery_status"] ?? 0,
                'method'          => $_POST["method"] ?? null,
                'total'           => $_POST["total"] ?? null,
                'note'            => $_POST["note"] ?? null,
                'id_customer'     => $id ?? null,
            ];

            // Validate
            $errors = validateCheckout($data);
            if (!empty($errors)) {
                $_SESSION["errors"] = $errors;
                $_SESSION["data"]   = $data;
                header('Location: ?act=checkout&user=' . $id);
                exit();
            }
            
            if (insert('tbl_orders', $data)) {
                foreach ($carts as $cart) {
                    $productId = $cart['id_product'];
                    deleteCartItemsByProductId($productId);
                }
                header('Location: ?act=order-success');
                exit();
            } else {
                debug($data);
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

    // Validate payment method
    if (!isset($data['method'])) {
        $errors['missingMethod'] = '💸 Please select a payment method.';
    }

    return $errors;
}
