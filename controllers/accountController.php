<?php 

function settings() {
    $titleBar = 'Settings';
    $view     = 'account/settings';
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function settingInfo($id) {
    $js       = BASE_URL.'assets/js/form.js';
    $css      = BASE_URL.'assets/css/form.css';
    $titleBar = 'Account Details';
    $view     = 'account/info';

    $customer = selectOne('tbl_accounts', $id);

    if(isset($_POST['btnSaveInfo'])) {
        $data = [
            'name'     => $_POST["username"]?? null,
            'email'    => $_POST["email"]?? null,
            'city'     => $_POST["city"]?? null,
            'district' => $_POST["district"]?? null,
            'ward'     => $_POST["ward"]?? null,
            'address'  => $_POST["address"]?? null,
            'phone'    => $_POST["phone"]?? null,
        ];

        // Xử lý file
        $img = $_FILES['avatar'] ?? null;
        if ($img['error'] === UPLOAD_ERR_OK) { // Kiểm tra xem có lỗi khi upload không
            $data['avatar'] = upload_avatar($img, 'uploads/avatar/');
            // Xóa hình ảnh cũ nếu tồn tại
            if (!empty($_POST['img-current']) && file_exists($_POST['img-current'])) {
                unlink($_POST['img-current']);
            }
        } else {
            // Nếu người dùng không upload hình ảnh mới, giữ nguyên đường dẫn của hình ảnh hiện tại
            $data['avatar'] = $_POST['img-current'] ?? null;
        }

        // Validate
        $errors = validateUpdateInfo($data);
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["data"]   = $data ;
            header('Location: ?act=setting-info&id=' . $id);
            exit();
        } else {
            update('tbl_accounts', $id, $data);
            $_SESSION["save-info"]='Your info has been saved, mission accomplished! 🎈📁';
        }
        header('Location: ?act=setting-info&id=' . $id);
        exit();
    }
    
    require_once PATH_VIEW . 'layouts/master.php';
}

function orderHistory($customerId) {
    $titleBar = 'Order History';
    $view     = 'account/history';
    
    // Lấy thông tin khách hàng
    $customer = selectOne('tbl_accounts', $customerId);

    // Lấy danh sách đơn hàng của khách hàng
    $orders = selectAll('tbl_orders', ['id_customer' => $customerId]);

    // Lặp qua từng đơn hàng để lấy thông tin chi tiết
    $orderDetails = [];
    foreach ($orders as $order) {
        // Lấy thông tin chi tiết của đơn hàng
        $orderDetail = getOrderDetailsByCustomer($order['id']);
        // Thêm thông tin chi tiết vào mảng $orderDetails
        $orderDetails[] = [
            'order' => $order,
            'orderDetail' => $orderDetail
        ];
    }


    require_once PATH_VIEW . 'layouts/master.php';
}

function validateUpdateInfo($data) {
    $errors = [];

    // Validate name
    if (empty($data['name'])) {
        $errors['username'] = 'Looks like you forgot to enter your username.';
    } elseif (strlen($data['name']) > 50) {
        $errors['username'] = 'Please enter between 1 and 50 characters.';
    }

    // Validate email
    if (empty($data['email'])) {
        $errors['email'] = 'Please enter your email address.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    // Validate phone
    if (!isset($data['phone']) || $data['phone'] === '') {
        $errors['phone'] = 'We need to contact you about your order.';
    } elseif (!is_numeric($data['phone']) || strlen($data['phone']) != 10) {
        $errors['phone'] = 'Phone must be a 10-digit numeric value.';
    }

    // Validate select boxes
    if (empty($data['city']) || empty($data['district']) || empty($data['ward'])) {
        $errors['city'] = 'Please select city, district, and ward.';
    }

    // Validate address
    if (empty($data['address'])) {
        $errors['address'] = 'Looks like you forgot to enter your address details.';
    } elseif (strlen($data['address']) > 255) {
        $errors['address'] = 'Please enter between 1 and 255 characters.';
    }

    $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
    $allowed = array('jpeg', 'jpg');

    if (!empty($_FILES['avatar']['name'])) {
        $fileExtension = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowed)) {
            $errors['avatar'] = 'Only JPEG images are allowed.';
        } elseif ($_FILES['avatar']['size'] > $maxFileSize) {
            $errors['avatar'] = 'Image size should not exceed 5MB.';
        }
    }

    return $errors;
}