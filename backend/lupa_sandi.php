<?php
//Mulai sesi
session_start();

// Ambil database
require "../connection/db_tukp.php";
// Ambil fungsi untuk membuat API
require "generate_api.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {

        // Jika ada limit
            $query = "SELECT * FROM reset_sandi ORDER BY id_reset_sandi DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        

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
// Request POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Buat notifikasi
    if (isset($_POST["kirim_data_lupa_sandi"])) {

        $cariPengguna  = htmlspecialchars($_POST["cari_pengguna"]);

        try {
            $sql = "INSERT INTO reset_sandi (`id_reset_sandi`,  `cari_pengguna`) VALUES (null,  :cari_pengguna)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "cari_pengguna"  => $cariPengguna,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Permintaan Reset Sandi Telah Dikirim", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
}
// Untuk hapus
if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    // Ambil data yang dikirim client
    $jsonData = file_get_contents('php://input');
    $jsonData = json_decode($jsonData, true);
// pengumuman
    if (isset($jsonData["hapus_reset_sandi"])) {
        try {
            $sql = "DELETE FROM reset_sandi WHERE `id_reset_sandi` = :idData";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idData" => $jsonData["id_reset_sandi"],
            ]);

            echo json_encode(generateAPI("success", 200, "Data Berhasil Dihapus", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    } 
}
?>