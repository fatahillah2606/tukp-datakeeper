<?php
$host = "localhost";
$db_name = "tukp-datakeeper";
$username = "andikakurniawan";
$password = "CODOTERSNA29";

try {
    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";
    $option = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $option);
} catch (Throwable $e) {
    header('Content-Type: application/json; charset=utf-8');
    $data = [
        "status" => "error",
        "code" => 500,
        "message" => "Gagal terhubung ke database",
        "details" => $e
    ];
    echo json_encode($data);
}
?>