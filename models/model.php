<?php 

if (!function_exists('selectProductsByCategoryId')) {
    function selectProductsByCategoryId($id) {
        try {
            // Sử dụng tham số truyền vào ($id) để lấy các sản phẩm theo id danh mục
            $sql = "SELECT * FROM tbl_products WHERE id_category = :id_category AND status = 1";
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
        $sql = "SELECT * FROM tbl_products WHERE name LIKE ?";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindValue(1, "%$keyword%", PDO::PARAM_STR);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}