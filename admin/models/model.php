<?php 

if (!function_exists('getAdmin')) {
    function getAdmin($e, $pw) {
        try {
            $sql = "SELECT * FROM tbl_accounts WHERE email = :email AND password = :password AND role = 1 LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email", $e);
            $stmt->bindParam(":password", $pw);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueCreateCategory')) {
    function checkUniqueCreateCategory($name) {
        try {
            $sql = "SELECT * FROM tbl_categories WHERE name = :name LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueUpdateCategory')) {
    function checkUniqueUpdateCategory($id, $name) {
        try {
            $sql = "SELECT * FROM tbl_categories WHERE name = :name AND id <> :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getBanner')) {
    function getBanner() {
        try {
            $sql = "SELECT 
                        b.`id`, 
                        b.`grid`,
                        b.`title`, 
                        b.`image`, 
                        b.`status`, 
                        c.`name` AS `c_name`
                    FROM 
                        `tbl_banner` AS b
                    LEFT JOIN 
                        `tbl_categories` AS c ON b.`id_category` = c.`id`
                    WHERE 
                        1 ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// liên kết id_category từ bảng tbl_products với id từ bảng tbl_categories và hiển thị tên của category thay vì id
if (!function_exists('getProducts')) {
    function getProducts() {
        try {
            $sql = "SELECT 
                        p.`id`, 
                        p.`thumbnail`, 
                        p.`name`, 
                        p.`description`, 
                        p.`price`, 
                        p.`discount`, 
                        p.`instock`, 
                        p.`status`, 
                        c.`name` AS `c_name`
                    FROM 
                        `tbl_products` AS p
                    LEFT JOIN 
                        `tbl_categories` AS c ON p.`id_category` = c.`id`
                    WHERE 
                        1 ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getOrders')) {
    function getOrders() {
        try {
            $sql = "SELECT 
                        o.`id` AS id, 
                        o.`date`, 
                        a.`name` AS customer_name, 
                        o.`payment_status`, 
                        o.`delivery_status`, 
                        o.`method`
                    FROM 
                        `tbl_orders` o
                    JOIN 
                        `tbl_accounts` a ON o.`id_customer` = a.`id` ORDER BY date DESC";
            $stmt = $GLOBALS['conn']->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getOrderDetails')) {
    function getOrderDetails($id) {
        try {
            $sql = "SELECT 
                        p.name AS product_name,
                        p.price AS product_price,
                        p.discount AS product_discount,
                        od.quantity AS product_quantity,
                        p.thumbnail AS product_thumbnail,
                        (p.price * od.quantity) AS total_price,
                        o.id AS order_id,
                        o.date AS order_date,
                        o.payment_status,
                        o.delivery_status,
                        o.method,
                        a.id AS customer_id,
                        a.avatar AS customer_avatar,
                        a.name AS customer_name,
                        a.email AS customer_email,
                        a.address AS customer_address,
                        a.phone AS customer_phone
                    FROM 
                        tbl_products p
                    INNER JOIN 
                        tbl_order_details od ON p.id = od.id_product
                    INNER JOIN 
                        tbl_orders o ON od.id_order = o.id
                    INNER JOIN 
                        tbl_accounts a ON o.id_customer = a.id
                    WHERE 
                        o.id = ? ORDER BY od.quantity DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}