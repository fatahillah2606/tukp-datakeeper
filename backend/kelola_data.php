<?php
//Mulai sesi
session_start();

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

    // Request satu data barang internal
    if (isset($_GET["barang_internal"])) {
        try {
            $idBarang = htmlspecialchars($_GET["barang_internal"]);
            $sql = "SELECT * FROM data_barang_internal WHERE id_barang_internal = :id_barang";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["id_barang" => $idBarang]);

            $hasil = $stmt->fetch();
            if (empty($hasil)) {
                echo json_encode(generateAPI("failed", 404, "Data tidak tersedia", []), JSON_PRETTY_PRINT);
            } else {
                echo json_encode(generateAPI("success", 200, "Data tersedia", $hasil), JSON_PRETTY_PRINT);
            }
            
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
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
     // Request data mobil
    if (isset($_GET["data_mobil"])) {

        $query = null;
        $stmt = null;

        // Jika ada limit
        if (isset($_GET["limit"])) {
            $query = "SELECT * FROM data_mobil ORDER BY id_mobil DESC LIMIT :batasan";
            $limit = htmlspecialchars($_GET["limit"]);

            $stmt = $pdo->prepare($query);
            $stmt->execute(["batasan" => $limit]);
        } else {
            $query = "SELECT * FROM data_mobil ORDER BY id_mobil DESC";
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
    // Request data pengunjung
    if (isset($_GET["data_pengunjung"])) {

        $query = null;
        $stmt = null;

        // Jika ada limit
        if (isset($_GET["limit"])) {
            $query = "SELECT * FROM data_pengunjung ORDER BY id_pengunjung DESC LIMIT :batasan";
            $limit = htmlspecialchars($_GET["limit"]);

            $stmt = $pdo->prepare($query);
            $stmt->execute(["batasan" => $limit]);
        } else {
            $query = "SELECT * FROM data_pengunjung ORDER BY id_pengunjung DESC";
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

// Request POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Catat pengunjung
    if (isset($_POST["kirim_data_pengunjung"])) {
        $namaPengunjungRaw = array_map("htmlspecialchars", $_POST['nama_pengunjung']) ?? [];
        if (!is_array($namaPengunjungRaw)) $namaPengunjungRaw = [$namaPengunjungRaw];

        // rapikan & validasi ringan
        $namaPengunjung = array_values(array_filter(array_map(function($v){
            $v = trim($v);
            return mb_substr($v, 0, 100);
        }, $namaPengunjungRaw), fn($v)=>$v !== ''));

        // simpan sebagai JSON -> ["Muhammad","Budi",...]
        $jsonNama = json_encode($namaPengunjung, JSON_UNESCAPED_UNICODE);

        $namaPerusahaan = htmlspecialchars($_POST["nama_perusahaan"]);
        $nomorKendaraan = htmlspecialchars($_POST["nomor_kendaraan"]);
        $tanggal = htmlspecialchars($_POST["tanggal"]);
        $nomorTelepon = htmlspecialchars($_POST["nomor_telepon"]);
        $keperluan = htmlspecialchars($_POST["keperluan"]);
        $safetyInduction = $_POST["safety_induction"] ?? false;

        try {
            $sql = "INSERT INTO data_pengunjung (`id_pengunjung`,  `id_pengguna`, `nama_pengunjung`,	`nama_perusahaan`,	`no_kendaraan`, `tanggal`,	`no_telpon`, `keperluan`, `safety_induction`) VALUES (null, :id_pengguna, :nama_pengunjung, :nama_perusahaan, :nomor_kendaraan, :tanggal, :nomor_telepon, :keperluan, :safety_induction)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "id_pengguna" => $_SESSION["id_pengguna"],
                "nama_pengunjung" => $jsonNama,
                "nama_perusahaan" => $namaPerusahaan,
                "nomor_kendaraan" => $nomorKendaraan,
                "tanggal" => $tanggal,
                "nomor_telepon" => $nomorTelepon,
                "keperluan" => $keperluan,
                "safety_induction" => $safetyInduction,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data terkirim", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
}
?>