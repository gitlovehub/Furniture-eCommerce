<?php 

// CRUD

if (!function_exists('selectAll')) {
    function selectAll($tableName, $id) {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY $id ASC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('get_str_keys')) {
    function get_str_keys($data) {
        $keys = array_keys($data);
        return implode(',', $keys);
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data) {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $item) {
            $tmp[] = ":$item";
        }
        return implode(',', $tmp);
    }
}

if (!function_exists('insert')) {
    function insert($tableName, $data = []) {
        try {
            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);
            $sql = "INSERT INTO $tableName($strKeys) VALUE ($virtualParams)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $columnName => &$value) {
                $stmt->bindParam(":$columnName", $value);
            }
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}