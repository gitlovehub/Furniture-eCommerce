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

if (!function_exists('getBanners')) {
    function getBanners() {
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
                        a.`id` AS customer_id, 
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
    function getOrderDetails($orderId) {
        try {
            $sql = "SELECT 
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
                        o.note AS note,
                        o.payment_status,
                        o.delivery_status,
                        o.method,
                        acc.id AS customer_id,
                        acc.avatar AS avatar,
                        acc.name AS customer_name,
                        acc.email AS email,
                        acc.city AS city,
                        acc.district AS district,
                        acc.ward AS ward,
                        acc.address AS address,
                        acc.phone AS phone
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
                    WHERE 
                        o.id = ? 
                    ORDER BY od.quantity DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute([$orderId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getReviews')) {
    function getReviews() {
        try {
            $sql = "SELECT 
                        p.thumbnail AS product_thumbnail,
                        p.name AS product_name,
                        a.avatar AS customer_avatar,
                        a.name AS customer_name,
                        a.email AS customer_email,
                        r.review_text AS review_text,
                        r.rating AS rating,
                        r.status AS review_status,
                        r.review_date AS review_date,
                        r.id AS review_id
                    FROM 
                        tbl_reviews r
                    INNER JOIN 
                        tbl_products p ON r.id_product = p.id
                    INNER JOIN 
                        tbl_accounts a ON r.id_customer = a.id
                    ORDER BY 
                        r.review_date DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}