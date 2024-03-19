<?php

// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiadb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    debug("Connection failed: " . $e->getMessage());
}