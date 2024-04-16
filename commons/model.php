<?php 

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

if (!function_exists('getStatusActive')) {
    function getStatusActive($tableName) {
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

if (!function_exists('getStatusInactive')) {
    function getStatusInactive($tableName) {
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
            return true;
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
            $sql = "INSERT INTO $tableName ($strKeys) VALUES ($virtualParams)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $columnName => &$value) {
                $stmt->bindParam(":$columnName", $value);
            }
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            debug($e);
            return false;
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

if (!function_exists('deleteOne')) {
    function deleteOne($tableName, $id) {
        try {
            $sql = "DELETE FROM $tableName WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getEntitiesProduct')) {
    function getEntitiesProduct($tableName, $id) {
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

if (!function_exists('checkUniqueEmail')) {
    function checkUniqueEmail($e) {
        try {
            $sql = "SELECT * FROM tbl_accounts WHERE email = :email LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email", $e);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkLogin')) {
    function checkLogin($e, $pw) {
        try {
            $sql = "SELECT * FROM tbl_accounts WHERE email = :email LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email", $e);
            $stmt->execute();
            $user = $stmt->fetch();
            // Kiểm tra xem email tồn tại và mật khẩu phù hợp
            if ($user && ($pw === $user['password'])) {
                if ($user['status'] == 0) {
                    return 'blocked'; // Tài khoản đã bị khoá
                } elseif ($user['status'] == 1) {
                    return $user; // Đăng nhập thành công với tài khoản đã được xác minh
                } elseif ($user['status'] == 2) {
                    return 'unverified'; // Đăng nhập thành công nhưng tài khoản chưa được xác minh
                }
            } else {
                return false; // Sai thông tin đăng nhập
            }
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('updateTokenOptions')) {
    function updateTokenOptions($tableName, $token, $col, $value) {
        try {
            $sql = "UPDATE $tableName SET $col = :value WHERE token = :token";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":value", $value);
            $stmt->bindParam(":token", $token);
            $stmt->execute();
            return true;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getLastByToken')) {
    function getLastByToken($tableName, $token) {
        try {
            $sql = "SELECT * FROM $tableName WHERE token = :token ORDER BY id DESC LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getEmailByToken')) {
    function getEmailByToken($tableName, $token) {
        try {
            $sql = "SELECT email FROM $tableName WHERE token = :token ORDER BY id DESC LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['email']; // Trả về email
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getLastId')) {
    function getLastId($tableName) {
        try {
            $sql = "SELECT id FROM $tableName ORDER BY id DESC LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}