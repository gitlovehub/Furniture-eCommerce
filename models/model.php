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

if (!function_exists('getColorName')) {
    function getColorName($tableName, $id) {
        try {
            $sql = "SELECT c.name AS color_name
            FROM tbl_colors AS c
            JOIN tbl_products AS p ON c.id_product = p.id
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