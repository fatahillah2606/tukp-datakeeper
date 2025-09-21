<?php
//Mulai sesi
session_start();

// Ambil database
require "../connection/db_tukp.php";
// Ambil fungsi untuk membuat API
require "generate_api.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {

        // Jika ada limit
            $query = "SELECT * FROM pengguna ORDER BY id_pengguna DESC";
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
// Tambah Pengguna security
    if (isset($_POST["kirim_data_pengguna"])) {

        $idUser  = htmlspecialchars($_POST["id_user"]);
        $namaUser   = htmlspecialchars($_POST["nama_user"]);
        $role  = htmlspecialchars($_POST["role"]);
        $password  = password_hash($_POST["password"], PASSWORD_BCRYPT);

        try {
            $sql = "INSERT INTO pengguna (`id_pengguna`, `id_user`, `nama_user`, `role`, `password`) VALUES (null, :id_user, :nama_user, :role, :password)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "id_user" => $idUser,
                "nama_user"  => $namaUser,
                "role"  => $role,
                "password"  => $password,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data Berhasil Disimpan", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
}
// Tambah Pengguna admin
    if (isset($_POST["kirim_data_pengguna_admin"])) {

        $emailUser  = htmlspecialchars($_POST["email_user"]);
        $namaUser   = htmlspecialchars($_POST["nama_user"]);
        $role  = htmlspecialchars($_POST["role"]);
        $password  = password_hash($_POST["password"], PASSWORD_BCRYPT);

        try {
            $sql = "INSERT INTO pengguna (`id_pengguna`, `email_user`, `nama_user`, `role`, `password`) VALUES (null, :email_user, :nama_user, :role, :password)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "email_user" => $emailUser,
                "nama_user"  => $namaUser,
                "role"  => $role,
                "password"  => $password,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data Berhasil Disimpan", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
    // Tambah Pengguna Tamu
    if (isset($_POST["kirim_data_pengguna_tamu"])) {


        $role  = htmlspecialchars($_POST["role"]);
        $namaUser   = htmlspecialchars($_POST["nama_user"]);
        $tokenLogin  = password_hash($_POST["token_login"], PASSWORD_BCRYPT);

        try {
            $sql = "INSERT INTO pengguna (`id_pengguna`, `role`, `nama_user`, `token_login`) VALUES (null, :role, :nama_user, :token_login)";
            $stmt = $pdo->prepare($sql);
            $dataDikirim = [
                "role"  => $role,
                "nama_user"  => $namaUser,
                "token_login"  => $tokenLogin,
            ];
            $stmt->execute($dataDikirim);
            echo json_encode(generateAPI("success", 200, "Data Berhasil Disimpan", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    }
// Untuk hapus 
if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    // Ambil data yang dikirim client
    $jsonData = file_get_contents('php://input');
    $jsonData = json_decode($jsonData, true);
// pengguna
    if (isset($jsonData["hapus_pengguna"])) {
        try {
            $sql = "DELETE FROM pengguna WHERE `id_pengguna` = :idData";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idData" => $jsonData["id_pengguna"],
            ]);

            echo json_encode(generateAPI("success", 200, "Data Berhasil Dihapus", []), JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            echo json_encode(generateAPI("error", 500, "Terjadi kesalahan", strval($th)), JSON_PRETTY_PRINT);
        }
    } 
}
?>