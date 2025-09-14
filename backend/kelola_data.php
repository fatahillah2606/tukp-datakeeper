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
        $noKendaraan = htmlspecialchars($_POST["no_kendaraan"]);
        $tanggal = htmlspecialchars($_POST["tanggal"]);
        $nomorTelepon = htmlspecialchars($_POST["nomor_telepon"]);
        $keperluan = htmlspecialchars($_POST["keperluan"]);
        $safetyInduction = $_POST["safety_induction"] ?? false;

        try {
            $sql = "INSERT INTO data_pengunjung (`id_pengunjung`,  `id_pengguna`, `nama_pengunjung`,	`nama_perusahaan`,	`no_kendaraan`, `tanggal`,	`no_telpon`, `keperluan`, `safety_induction`) VALUES (null, :id_pengguna, :nama_pengunjung, :nama_perusahaan, :no_kendaraan, :tanggal, :nomor_telepon, :keperluan, :safety_induction)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "id_pengguna" => $_SESSION["id_pengguna"],
                "nama_pengunjung" => $jsonNama,
                "nama_perusahaan" => $namaPerusahaan,
                "no_kendaraan" => $noKendaraan,
                "tanggal" => $tanggal,
                "nomor_telepon" => $nomorTelepon,
                "keperluan" => $keperluan,
                "safety_induction" => $safetyInduction,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data Berhasil Disimpan", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
    // Catat mobil
    if (isset($_POST["kirim_data_mobil"])) {

        $namaDriver   = htmlspecialchars($_POST["nama_driver"]);
        $merekKendaraan   = htmlspecialchars($_POST["merek_kendaraan"]);
        $noKendaraan  = htmlspecialchars($_POST["no_kendaraan"]);
        $kmAwal          = htmlspecialchars($_POST["km_awal"]);
        $kmAkhir         = htmlspecialchars($_POST["km_akhir"]);
        $tanggal         = htmlspecialchars($_POST["tanggal"]);
        $tujuan          = htmlspecialchars($_POST["tujuan"]);
        $keperluan       = htmlspecialchars($_POST["keperluan"]);

        try {
            $sql = "INSERT INTO data_mobil (`id_mobil`,  `id_pengguna`, `tanggal`, `nama_driver`,	`merek_kendaraan`, `no_kendaraan`, `km_awal`,	`km_akhir`, `tujuan`, `keperluan`) VALUES (null,  :id_pengguna, :tanggal, :nama_driver,	:merek_kendaraan, :no_kendaraan, :km_awal,	:km_akhir, :tujuan, :keperluan)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "id_pengguna"    => $_SESSION["id_pengguna"],
                "tanggal"        => $tanggal,
                "nama_driver"    => $namaDriver,
                "merek_kendaraan" => $merekKendaraan,
                "no_kendaraan"   => $noKendaraan,
                "km_awal"        => $kmAwal,
                "km_akhir"       => $kmAkhir,
                "tujuan"         => $tujuan,
                "keperluan"      => $keperluan,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data Berhasil Disimpan", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
    // Catat Barang Internal
    if (isset($_POST["kirim_data_barang_internal"])) {
        
        // Nama barang
        $namaBarangRaw = array_map("htmlspecialchars", $_POST['nama_barang']) ?? [];
        if (!is_array($namaBarangRaw)) $namaBarangRaw = [$namaBarangRaw];
        
        // Jumlah barang
        $jumlahBarangRaw = array_map("htmlspecialchars", $_POST['jumlah_barang']) ?? [];
        if (!is_array($jumlahBarangRaw)) $jumlahBarangRaw = [$jumlahBarangRaw];

        $items = [];
        foreach ($namaBarangRaw as $i => $n) {
            $n = trim((string)$n);
            $j = isset($jumlahBarangRaw[$i]) ? (int)$jumlahBarangRaw[$i] : 0;
            if ($n !== '' && $j > 0) {
                $items[] = ['nama_barang' => $n, 'jumlah_barang' => $j];
            }
        }
    
        $namaPembawa = htmlspecialchars($_POST["nama_pembawa"]);
        $namaJumlahBarang = json_encode($items, JSON_UNESCAPED_UNICODE);
        $tanggal = htmlspecialchars($_POST["tanggal"]);;
        $keterangan = htmlspecialchars($_POST["keterangan"]);

        try {
            $sql = "INSERT INTO data_barang_internal (`id_barang_internal`,  `id_pengguna`, `nama_pembawa`, `nama_jumlah_barang`, `tanggal`, `keterangan`) VALUES (null, :id_pengguna, :nama_pembawa, :nama_jumlah_barang, :tanggal, :keterangan)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "id_pengguna" => $_SESSION["id_pengguna"],
                "nama_pembawa" => $namaPembawa,
                "nama_jumlah_barang" => $namaJumlahBarang,
                "tanggal" => $tanggal,
                "keterangan" => $keterangan,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data Berhasil Disimpan", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
        // Catat Barang Eksternal
    if (isset($_POST["kirim_data_barang_eksternal"])) {
        
        // Nama barang
        $namaBarangRaw = array_map("htmlspecialchars", $_POST['nama_barang']) ?? [];
        if (!is_array($namaBarangRaw)) $namaBarangRaw = [$namaBarangRaw];
        
        // Jumlah barang
        $jumlahBarangRaw = array_map("htmlspecialchars", $_POST['jumlah_barang']) ?? [];
        if (!is_array($jumlahBarangRaw)) $jumlahBarangRaw = [$jumlahBarangRaw];

        $items = [];
        foreach ($namaBarangRaw as $i => $n) {
            $n = trim((string)$n);
            $j = isset($jumlahBarangRaw[$i]) ? (int)$jumlahBarangRaw[$i] : 0;
            if ($n !== '' && $j > 0) {
                $items[] = ['nama_barang' => $n, 'jumlah_barang' => $j];
            }
        }
    
        $namaDriver = htmlspecialchars($_POST["nama_driver"]);
        $namaSuplier = htmlspecialchars($_POST["nama_suplier"]);
        $namaJumlahBarang = json_encode($items, JSON_UNESCAPED_UNICODE);
        $tanggal = htmlspecialchars($_POST["tanggal"]);;
        $jamKedatangan = htmlspecialchars($_POST["jam_kedatangan"]);
        $noKendaraan = htmlspecialchars($_POST["no_kendaraan"]);
        $keterangan = htmlspecialchars($_POST["keterangan"]);

        try {
            $sql = "INSERT INTO data_barang_eksternal (`id_barang_eksternal`,  `id_pengguna`, `nama_driver`, `nama_suplier`, `nama_jumlah_barang`, `tanggal`, `jam_kedatangan`, `no_kendaraan`, `keterangan`) VALUES (null, :id_pengguna, :nama_driver, :nama_suplier, :nama_jumlah_barang, :tanggal, :jam_kedatangan, :no_kendaraan, :keterangan)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "id_pengguna" => $_SESSION["id_pengguna"],
                "nama_driver" => $namaDriver,
                "nama_suplier" => $namaSuplier,
                "nama_jumlah_barang" => $namaJumlahBarang,
                "tanggal" => $tanggal,
                "jam_kedatangan" => $jamKedatangan,
                "no_kendaraan" => $noKendaraan,
                "keterangan" => $keterangan,
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
    
    // Barang internal
    if (isset($jsonData["hapus_barang_internal"])) {
        try {
            $sql = "DELETE FROM data_barang_internal WHERE `id_barang_internal` = :idData";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idData" => $jsonData["id_barang_internal"],
            ]);

            echo json_encode(generateAPI("success", 200, "Data Berhasil Dihapus", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
        // Barang eksternal
    if (isset($jsonData["hapus_barang_eksternal"])) {
        try {
            $sql = "DELETE FROM data_barang_eksternal WHERE `id_barang_eksternal` = :idData";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idData" => $jsonData["id_barang_eksternal"],
            ]);

            echo json_encode(generateAPI("success", 200, "Data Berhasil Dihapus", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
        // mobil
    if (isset($jsonData["hapus_mobil"])) {
        try {
            $sql = "DELETE FROM data_mobil WHERE `id_mobil` = :idData";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idData" => $jsonData["id_mobil"],
            ]);

            echo json_encode(generateAPI("success", 200, "Data Berhasil Dihapus", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }   
}
?>

