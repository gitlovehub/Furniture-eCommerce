<?php 

// CRUD

if (!function_exists('selectAll')) {
    function selectAll($tableName) {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('selectStatusActive')) {
    function selectStatusActive($tableName) {
        try {
            $sql = "SELECT * FROM $tableName WHERE status=1 ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('selectStatusDeactivated')) {
    function selectStatusDeactivated($tableName) {
        try {
            $sql = "SELECT * FROM $tableName WHERE status=0 ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('updateStatus')) {
    function updateStatus($tableName, $id, $value) {
        try {
            $sql = "UPDATE $tableName SET status=? WHERE id=?";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindValue(1, $value, PDO::PARAM_INT);
            $stmt->bindValue(2, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('selectOne')) {
    function selectOne($tableName, $id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
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
        foreach ($keys as $columnName) {
            $tmp[] = ":$columnName";
        }
        return implode(',', $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data) {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $columnName) {
            $tmp[] = "$columnName = :$columnName";
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

if (!function_exists('update')) {
    function update($tableName, $id, $data = []) {
        try {
            $setParams = get_set_params($data);
            $sql = "UPDATE $tableName SET $setParams WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $columnName => &$value) {
                $stmt->bindParam(":$columnName", $value);
            }
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete')) {
    function delete($tableName, $id) {
        try {
            $sql = "DELETE FROM $tableName WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getGallery')) {
    function getGallery($tableName, $id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE id_product = :id_product";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id_product", $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}