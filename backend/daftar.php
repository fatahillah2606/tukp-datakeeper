<?php
// Ambil database
require "../connection/db_tukp.php";
// Ambil fungsi untuk membuat API
require "generate_api.php";

// Bagian untuk request dengan method POST 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Jika request adalah register
    if (isset($_POST["register"])) {

        // Ambil data dari formulir 
        $type_user = htmlspecialchars($_POST ["selecttype"]);
        $user_id = ($_POST ["user-id"] == null) ? null : htmlspecialchars($_POST["user-id"]);    
        $user_email = ($_POST ["user-email"] == null) ? null : htmlspecialchars($_POST["user-email"]);    
        $nama = htmlspecialchars($_POST["nama"]);
        $sandi = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT);

        // Coba masukan datanya ke database
        try {
            $sql = "INSERT INTO `pengguna` (`id`, `id_user`, `email_user`, `nama_user`, `role`, `password`) VALUES (null, :idUser, :emailUser, :namaUser, :typeUser, :sandi)";
        } catch (\Throwable $th) {
        echo json_encode(generateAPI("failed", 500, "Internal Server Error"));
        }
        echo json_encode(generateAPI("success", 200, print_r($_POST),""));
    }
}
?>