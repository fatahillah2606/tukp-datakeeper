<?php 
session_start();

require "db-connect.php";

if (!isset($_SESSION["user_id"]) && isset($_COOKIE["ingat_saya"])) {
    list($id, $token) = explode(":", $_COOKIE["ingat_saya"]);

    $sql = "SELECT id, id_user, email_user, nama_user, role, token_login FROM pengguna WHERE id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($idDB, $nomorIdDB, $emailPenggunaDB, $namaPenggunaDB, $peranPenggunaDB, $tokenLoginDB);
    $stmt->fetch();


    if ($tokenLoginDB && password_verify($token, $tokenLoginDB)) {
       $_SESSION['user_id'] = $idDB;
       $_SESSION['nomor_id'] = $nomorIdDB;
       $_SESSION['email_pengguna'] = $emailPenggunaDB;
       $_SESSION['nama_pengguna'] = $namaPenggunaDB;
       $_SESSION['peran_pengguna'] = $peranPenggunaDB;
       
       
    }
    else {
        setcookie('ingat_saya', '', time() - 3600, '/');
        header("Location: /");
        exit();
    }
    $stmt->close();
} else if(!isset($_COOKIE["ingat_saya"])){
    header("Location: /");
    exit();
}

$conn->close();
?>