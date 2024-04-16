<?php 

if (!function_exists('getProductsByCategoryId')) {
    function getProductsByCategoryId($id) {
        try {
            // Sử dụng tham số truyền vào ($id) để lấy các sản phẩm theo id danh mục
            $sql  = "SELECT * FROM tbl_products WHERE id_category = :id_category AND status = 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_category', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('searchProductsByName')) {
    function searchProductsByName($keyword) {
        $sql  = "SELECT * FROM tbl_products WHERE name LIKE ? AND status = 1";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindValue(1, "%$keyword%", PDO::PARAM_STR);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}

if (!function_exists('searchProductsByPrice')) {
    function searchProductsByPrice($minPrice, $maxPrice) {
        $sql  = "SELECT * FROM tbl_products WHERE price BETWEEN ? AND ? AND status = 1";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindValue(1, $minPrice, PDO::PARAM_INT);
        $stmt->bindValue(2, $maxPrice, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}

if (!function_exists('getCartByCustomer')) {
    function getCartByCustomer($tableName, $id) {
        try {
            $sql = "SELECT c.id AS id_cart, pc.color_thumbnail AS color_thumbnail, c.id_customer, c.id_product, c.quantity, c.id_color, p.id AS id_product, p.thumbnail AS thumbnail, p.name AS product, p.price, p.discount, pc.name AS color
            FROM $tableName AS c
            LEFT JOIN tbl_products AS p ON c.id_product = p.id
            LEFT JOIN tbl_colors AS pc ON c.id_color = pc.id
            WHERE c.id_customer = :id_customer";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_customer', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getColors')) {
    function getColors($tableName, $id) {
        try {
            $sql = "SELECT clr.id, clr.name AS color_name, clr.color_thumbnail AS color_thumbnail
            FROM $tableName AS clr
            JOIN tbl_products AS p ON clr.id_product = p.id
            WHERE p.id = :product_id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':product_id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

function checkInstock($productId, $quantity) {
    try {
        // Lấy thông tin số lượng tồn kho của sản phẩm
        $sql = "SELECT instock FROM tbl_products WHERE id = :productId";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra số lượng tồn kho và xử lý
        if ($result && isset($result['instock'])) {
            $instock = $result['instock'];
            if ($quantity > $instock || $instock == 0) {
                // Nếu số lượng mua vượt quá số lượng tồn kho hoặc số lượng tồn kho bằng 0
                return true;
            }
        }
    } catch (\Exception $e) {
        debug($e);
    }
}

function insertToCart($customerId, $productId, $quantity, $colorId) {
    try {
        // Kiểm tra xem $colorId có giá trị khác 0 không
        if ($colorId != 0) {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của khách hàng chưa
            $stmt = $GLOBALS['conn']->prepare("SELECT * FROM tbl_carts WHERE id_customer = :id_customer AND id_product = :id_product AND id_color = :id_color");
            $stmt->bindParam(':id_customer', $customerId);
            $stmt->bindParam(':id_product', $productId);
            $stmt->bindParam(':id_color', $colorId);
            $stmt->execute();
            $existingCartItem = $stmt->fetch();
            // Nếu sản phẩm đã tồn tại trong giỏ hàng
            if ($existingCartItem) {
                // Tăng số lượng sản phẩm nếu cả id_product và id_color đều trùng khớp
                $newQuantity = $existingCartItem['quantity'] + $quantity;
                $stmt = $GLOBALS['conn']->prepare("UPDATE tbl_carts SET quantity = :newQuantity WHERE id = :cartItemId");
                $stmt->bindParam(':newQuantity', $newQuantity);
                $stmt->bindParam(':cartItemId', $existingCartItem['id']);
                $stmt->execute();
                return true; // Trả về true nếu cập nhật số lượng thành công
            }
        }

        // Nếu không có id_color hoặc không tìm thấy sản phẩm với id_product và id_color tương ứng
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của khách hàng chưa (không phụ thuộc vào màu sắc)
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM tbl_carts WHERE id_customer = :id_customer AND id_product = :id_product AND id_color = 0");
        $stmt->bindParam(':id_customer', $customerId);
        $stmt->bindParam(':id_product', $productId);
        $stmt->execute();
        $existingCartItem = $stmt->fetch();
        
        // Nếu sản phẩm đã tồn tại trong giỏ hàng
        if ($existingCartItem) {
            // Tăng số lượng sản phẩm
            $newQuantity = $existingCartItem['quantity'] + $quantity;
            $stmt = $GLOBALS['conn']->prepare("UPDATE tbl_carts SET quantity = :newQuantity WHERE id = :cartItemId");
            $stmt->bindParam(':newQuantity', $newQuantity);
            $stmt->bindParam(':cartItemId', $existingCartItem['id']);
            $stmt->execute();
            return true; // Trả về true nếu cập nhật số lượng thành công
        }
        
        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào cart
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO tbl_carts (id_customer, id_product, quantity, id_color) VALUES (:customerId, :productId, :quantity, :colorId)");
        $stmt->bindParam(':customerId', $customerId);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':colorId', $colorId);
        $stmt->execute();
        return true; // Trả về true nếu thêm vào giỏ hàng thành công
    } catch (\Exception $e) {
        debug($e);
    }
}

function updateCartItemQuantity($id, $newQuantity) {
    try {
        $newQuantity = intval($newQuantity);
        $sql  = "UPDATE tbl_carts SET quantity = :newQuantity WHERE id = :id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':newQuantity', $newQuantity);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true; // Trả về true nếu cập nhật số lượng thành công
    } catch (\Exception $e) {
        debug($e);
    }
}

function updateProductView($productId) {
    try {
        $sql  = "UPDATE tbl_products SET `view` = `view` + 1 WHERE id = :productId";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        return true;
    } catch (\Exception $e) {
        debug($e);
    }
}

// Hàm để xóa sản phẩm trong giỏ hàng dựa trên id_product
function deleteCartItemsByProductId($productId) {
    try {
        $sql = "DELETE FROM tbl_carts WHERE id_product = :productId";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        return true;
    } catch (\Exception $e) {
        debug($e);
    }
}

function decreaseInstock($productId, $quantity) {
    try {
        $sql  = "UPDATE tbl_products SET instock = instock - :quantity WHERE id = :productId";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (\Exception $e) {
        debug($e);
    }
}

function increaseInstock($productId, $quantity) {
    try {
        $sql  = "UPDATE tbl_products SET instock = instock + :quantity WHERE id = :productId";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (\Exception $e) {
        debug($e);
        return false;
    }
}

function updatePaymentStatus($orderId, $paid) {
    try {
        $sql  = "UPDATE tbl_orders SET payment_status = :paymentStatus WHERE id = :orderId";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':paymentStatus', $paid, PDO::PARAM_INT);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (\Exception $e) {
        debug($e);
    }
}

if (!function_exists('getReviewsByProductId')) {
    function getReviewsByProductId($tableName, $productId) {
        try {
            $sql = "SELECT r.id, r.rating, r.review_text, r.review_date, p.name AS product_name, acc.name AS customer_name, acc.avatar AS customer_avatar
                    FROM $tableName AS r
                    JOIN tbl_products AS p ON r.id_product = p.id
                    JOIN tbl_accounts AS acc ON r.id_customer = acc.id
                    WHERE r.id_product = :product_id AND r.status = 1";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productId);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkCustomerHasPurchased')) {
    function checkCustomerHasPurchased($customerId, $productId) {
        try {
            $sql = "SELECT COUNT(*) AS total 
                    FROM tbl_orders o
                    INNER JOIN tbl_order_details od ON o.id = od.id_order
                    WHERE o.id_customer = :customer_id 
                    AND od.id_product = :product_id
                    AND o.delivery_status = 2 
                    AND (o.payment_status = 1 OR o.payment_status = 2)
                    ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":customer_id", $customerId);
            $stmt->bindParam(":product_id", $productId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] > 0;
        } catch (\Exception $e) {
            debug($e);
            return false;
        }
    }
}

if (!function_exists('getOrdersByCustomer')) {
    function getOrdersByCustomer($customerId) {
        try {
            $sql = "SELECT * FROM tbl_orders WHERE id_customer = :id_customer ORDER BY date DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_customer', $customerId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getProductsByOrder')) {
    function getProductsByOrder($orderId) {
        try {
            $sql = "SELECT 
                        p.id AS product_id,
                        p.name AS product_name,
                        p.price AS price,
                        p.discount AS discount,
                        od.quantity AS quantity,
                        clr.name AS color_name,
                        clr.color_thumbnail AS color_thumbnail,
                        p.thumbnail AS thumbnail,
                        (p.price * od.quantity) AS total,
                        o.id AS order_id,
                        o.date AS date,
                        o.payment_status,
                        o.delivery_status,
                        o.method,
                        acc.id AS customer_id
                    FROM 
                        tbl_products p
                    INNER JOIN 
                        tbl_order_details od ON p.id = od.id_product
                    INNER JOIN 
                        tbl_orders o ON od.id_order = o.id
                    INNER JOIN 
                        tbl_accounts acc ON o.id_customer = acc.id
                    INNER JOIN 
                        tbl_colors clr ON od.id_color = clr.id
                    WHERE o.id = ?";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute([$orderId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getOrderBack')) {
    function getOrderBack($orderId) {
        try {
            $sql = "SELECT * FROM tbl_order_details WHERE id_order = :id_order";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id_order', $orderId);
            $stmt->execute();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $customerId = $_SESSION["user"]['id'];
                $productId  = $row['id_product'];
                $colorId    = $row['id_color'];
                $quantity   = $row['quantity'];
                
                $insertSql = "INSERT INTO tbl_carts (`id_customer`, `id_product`, `quantity`, `id_color`) VALUES (:id_customer, :id_product, :quantity, :id_color)";
                $insertStmt = $GLOBALS['conn']->prepare($insertSql);
                $insertStmt->bindParam(':id_customer', $customerId);
                $insertStmt->bindParam(':id_product', $productId);
                $insertStmt->bindParam(':quantity', $quantity); // corrected binding
                $insertStmt->bindParam(':id_color', $colorId); // corrected binding
                $insertStmt->execute();
            }
            deleteOne('tbl_orders', $orderId);
            return true;
        } catch (\Exception $e) {
            debug($e);
            return false;
        }
    }
}

if (!function_exists('getEmail')) {
    function getEmail($email) {
        try {
            $sql  = "SELECT * FROM tbl_accounts WHERE email = :email AND status = 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

function updatePassword($token, $pw) {
    try {
        $sql  = "UPDATE tbl_accounts SET password = :password WHERE token = :token";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':password', $pw);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        return true;
    } catch (\Exception $e) {
        debug($e);
    }
}