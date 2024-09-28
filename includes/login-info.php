<?php
session_start();

// connect database
require 'db-connect.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION["user_id"]) && isset($_COOKIE["login"])) {
  list($id, $token) = explode(":", $_COOKIE["login"]);

  $sql = "SELECT id, id_user, email_user, nama_user, role, token_login FROM pengguna WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->bind_result($idDB, $nomorIdDB, $emailPenggunaDB, $namaPenggunaDB, $peranPenggunaDB, $tokenLoginDB);
  $stmt->fetch();

  if ($tokenLoginDB && password_verify($token, $tokenLoginDB)) {

    // Buat ulang sesi
    $_SESSION["user_id"] = $idDB;
    $_SESSION["nomor_id"] = $nomorIdDB;
    $_SESSION["email_pengguna"] = $emailPenggunaDB;
    $_SESSION["nama_pengguna"] = $namaPenggunaDB;
    $_SESSION["peran_pengguna"] = $peranPenggunaDB;

  } else {
    // jika token tidak valid, maka hapus cookie
    setcookie("login", "", time() - 3600, "/");
    header("Location: /");
    exit();
  }

// Jika belum
} else if (!isset($_COOKIE["login"])) {
  header("Location: /");
  exit();
}
?>