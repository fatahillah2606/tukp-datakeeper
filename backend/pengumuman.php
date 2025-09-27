<?php
//Mulai sesi
session_start();

// Ambil database
require "../connection/db_tukp.php";
// Ambil fungsi untuk membuat API
require "generate_api.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {

        // Jika ada limit
            $query = "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC";
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
// Buat Pengumuman
    if (isset($_POST["kirim_data_pengumuman"])) {

        $judulPengumuman  = htmlspecialchars($_POST["judul_pengumuman"]);
        $isiPengumuman   = htmlspecialchars($_POST["isi_pengumuman"]);

        try {
            $sql = "INSERT INTO pengumuman (`id_pengumuman`,  `id_pengguna`, `judul_pengumuman`, `isi_pengumuman`) VALUES (null,  :id_pengguna, :judul_pengumuman, :isi_pengumuman)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "id_pengguna"    => $_SESSION["id_pengguna"],
                "judul_pengumuman"  => $judulPengumuman,
                "isi_pengumuman"    => $isiPengumuman,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data Berhasil Disimpan", []), JSON_PRETTY_PRINT);
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
    if (isset($jsonData["hapus_pengumuman"])) {
        try {
            $sql = "DELETE FROM pengumuman WHERE `id_pengumuman` = :idData";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idData" => $jsonData["id_pengumuman"],
            ]);

            echo json_encode(generateAPI("success", 200, "Data Berhasil Dihapus", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    } 
}
// Update data pengumuman
if (isset($_POST['update_pengumuman'])) {
    $id    = $_POST['id_pengumuman'] ?? null;
    $judul = trim($_POST['judul_pengumuman'] ?? '');
    $isi   = trim($_POST['isi_pengumuman'] ?? '');

    if (!$id || $judul === '' || $isi === '') {
        echo "Data tidak lengkap!";
        exit;
    }

    try {
        $sql = "UPDATE pengumuman 
                   SET judul_pengumuman = :judul, 
                       isi_pengumuman   = :isi
                 WHERE id_pengumuman   = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'judul' => $judul,
            'isi'   => $isi,
            'id'    => $id
        ]);

        // Redirect balik setelah update berhasil
        header("Location: /pages/pengumuman.php?status=updated");
        exit;
    } catch (PDOException $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}


?>