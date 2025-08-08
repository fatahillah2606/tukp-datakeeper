<?php

//Mulai sesi
session_start();

// Ambil database
require "../connection/db_tukp.php";
// Ambil fungsi untuk membuat API
require "generate_api.php";

// Jika request yang diterima menggunakan method "POST"
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Cek apakah yang login security
    if (isset($_POST["security"])) {
        
        // Ambil data dari form
        $pengguna =  htmlspecialchars($_POST["pengguna"]);
        $id_user = htmlspecialchars($_POST["id_user"]);
        $password = htmlspecialchars($_POST["password"]);

        // Proses Validasi
        $query_sql = "SELECT * FROM pengguna WHERE id_user = :id_user";
        $stmt = $pdo->prepare($query_sql);
        $stmt->execute(["id_user"=> $id_user]);
        $hasil =  $stmt->fetch();
        
        // Cek jika akun tersedia 
        if (empty($hasil)) {
             echo json_encode(generateAPI("failed", 403, "Akun Tidak Terdaftar", []));
        } else {

            // Verifikasi Password
            if (password_verify($password, $hasil["password"])) {

                // Jika Berhasil, buat sesi
                $_SESSION["id_user"] = $hasil["id_user"];
                $_SESSION["nama_user"] = $hasil["nama_user"];
                $_SESSION["role"] = $hasil["role"];

                // Buat Token untuk menyimpan cookies
                $token = bin2hex(random_bytes(32));
                $cacahToken = password_hash($token, PASSWORD_BCRYPT);

                // Simpan sesi ke database
                $query_sql = "UPDATE pengguna SET token_login = :token_login WHERE id_pengguna= :id_pengguna";
                $stmt = $pdo->prepare($query_sql);
                $stmt->execute([
                    "token_login" => $cacahToken,
                    "id_pengguna" => $hasil["id_pengguna"]
                ]);

                // Atur Cookie
                setcookie("login", $hasil["id_pengguna"] . ":" . $token, time() + (86400 * 30), "/");

                // Berikan respon jika berhasil login
               echo json_encode(generateAPI("success", 200, "Berhasil Login", []));
             } else {

                // Jika Gagal, Kasih Keterangan
                echo json_encode(generateAPI("failed", 403, "Id Pengguna atau Sandi Salah", []));
            }
        }
        
    }
        // Cek apakah yang login admin
    if (isset($_POST["admin"])) {
        
        // Ambil data dari form
        $pengguna =  htmlspecialchars($_POST["pengguna"]);
        $email_user = htmlspecialchars($_POST["email_user"]);
        $password = htmlspecialchars($_POST["password"]);

        // Proses Validasi
        $query_sql = "SELECT * FROM pengguna WHERE email_user= :email_user";
        $stmt = $pdo->prepare($query_sql);
        $stmt->execute(["email_user"=> $email_user]);
        $hasil =  $stmt->fetch();
        
        // Cek jika akun tersedia 
        if (empty($hasil)) {
             echo json_encode(generateAPI("failed", 403, "Akun Tidak Terdaftar", []));
        } else {

            // Verifikasi Password
            if (password_verify($password, $hasil["password"])) {

                // Jika Berhasil, buat sesi
                $_SESSION["email_user"] = $hasil["email_user"];
                $_SESSION["nama_user"] = $hasil["nama_user"];
                $_SESSION["role"] = $hasil["role"];

                // Buat Token untuk menyimpan cookies
                $token = bin2hex(random_bytes(32));
                $cacahToken = password_hash($token, PASSWORD_BCRYPT);

                // Simpan sesi ke database
                $query_sql = "UPDATE pengguna SET token_login = :token_login WHERE id_pengguna = :id_pengguna";
                $stmt = $pdo->prepare($query_sql);
                $stmt->execute([
                    "token_login" => $cacahToken,
                    "id_pengguna" => $hasil["id_pengguna"]
                ]);

                // Atur Cookie
                setcookie("login", $hasil["id_pengguna"] . ":" . $token, time() + (86400 * 30), "/");

                // Berikan respon jika berhasil login
               echo json_encode(generateAPI("success", 200, "Berhasil Login", []));
             } else {

                // Jika Gagal, Kasih Keterangan
                echo json_encode(generateAPI("failed", 403, "Email Pengguna atau Sandi Salah", []));
            }
        }
        
    }
            // Cek apakah yang login tamu
    if (isset($_POST["tamu"])) {
        
        // Ambil data dari form
        $pengguna =  htmlspecialchars($_POST["pengguna"]);
        $token = htmlspecialchars($_POST["token"]);

        // Proses Validasi
        $query_sql = "SELECT * FROM pengguna WHERE `role` = :peran";
        $stmt = $pdo->prepare($query_sql);
        $stmt->execute(["peran"=> "tamu"]);
        $hasil =  $stmt->fetch();
        
        // Cek jika akun tersedia 
        if (empty($hasil)) {
             echo json_encode(generateAPI("failed", 403, "Akun Tidak Terdaftar", []));
        } else {

            // Verifikasi Password
            if (password_verify($token, $hasil["password"])) {

                // Jika Berhasil, buat sesi

                $_SESSION["nama_user"] = $hasil["nama_user"];
                $_SESSION["role"] = $hasil["role"];

                // Buat Token untuk menyimpan cookies
                $token = bin2hex(random_bytes(32));
                $cacahToken = password_hash($token, PASSWORD_BCRYPT);

                // Simpan sesi ke database
                $query_sql = "UPDATE pengguna SET token_login = :token_login WHERE id_pengguna= :id_pengguna";
                $stmt = $pdo->prepare($query_sql);
                $stmt->execute([
                    "token_login" => $cacahToken,
                    "id_pengguna" => $hasil["id_pengguna"]
                ]);

                // Atur Cookie
                setcookie("login", $hasil["id_pengguna"] . ":" . $token, time() + (86400 * 30), "/");

                // Berikan respon jika berhasil login
               echo json_encode(generateAPI("success", 200, "Berhasil Login", []));
             } else {

                // Jika Gagal, Kasih Keterangan
                echo json_encode(generateAPI("failed", 403, "Token Salah", []));
            }
        }
        
    }
}
?>