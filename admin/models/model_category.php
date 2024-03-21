<?php 

if (!function_exists('checkUniqueCreate')) {
    function checkUniqueForCreate($name) {
        try {
            $sql = "SELECT * FROM tbl_categories WHERE name_category = :name_category LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":name_category", $name);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueUpdate')) {
    function checkUniqueForUpdate($id, $name) {
        try {
            $sql = "SELECT * FROM tbl_categories WHERE name_category = :name_category AND id <> :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":name_category", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}