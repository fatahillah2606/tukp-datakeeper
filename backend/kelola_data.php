<?php
//Mulai sesi
// session_start();

// Ambil database
require "../connection/db_tukp.php";
// Ambil fungsi untuk membuat API
require "generate_api.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    
    // Request data barang internal
    if (isset($_GET["data_internal"])) {

        $query = null;
        $stmt = null;

        // Jika ada limit
        if (isset($_GET["limit"])) {
            $query = "SELECT * FROM data_barang_internal ORDER BY id_barang_internal DESC LIMIT :batasan";
            $limit = htmlspecialchars($_GET["limit"]);

            $stmt = $pdo->prepare($query);
            $stmt->execute(["batasan" => $limit]);
        } else {
            $query = "SELECT * FROM data_barang_internal ORDER BY id_barang_internal DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        }

        // Fetch hasilnya
        $hasil = $stmt->fetchAll();

        // cek hasil
        if (empty($hasil)) {
            echo json_encode(generateAPI("failed", 404, "Data tidak tersedia", []), JSON_PRETTY_PRINT);
        } else {
            // Tampilkan hasil
            echo json_encode(generateAPI("success", 200, "Data tersedia", $hasil), JSON_PRETTY_PRINT);
        }
    }
    // Request data barang eksternal
    if (isset($_GET["data_eksternal"])) {

        $query = null;
        $stmt = null;

        // Jika ada limit
        if (isset($_GET["limit"])) {
            $query = "SELECT * FROM data_barang_eksternal ORDER BY id_barang_eksternal DESC LIMIT :batasan";
            $limit = htmlspecialchars($_GET["limit"]);

            $stmt = $pdo->prepare($query);
            $stmt->execute(["batasan" => $limit]);
        } else {
            $query = "SELECT * FROM data_barang_eksternal ORDER BY id_barang_eksternal DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        }

        // Fetch hasilnya
        $hasil = $stmt->fetchAll();

        // cek hasil
        if (empty($hasil)) {
            echo json_encode(generateAPI("failed", 404, "Data tidak tersedia", []), JSON_PRETTY_PRINT);
        } else {
            // Tampilkan hasil
            echo json_encode(generateAPI("success", 200, "Data tersedia", $hasil), JSON_PRETTY_PRINT);
        }
    }
}
?>