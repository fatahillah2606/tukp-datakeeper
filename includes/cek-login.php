<?php 
session_start();

require "db-connect.php";

if (!isset($_SESSION["id"]) && isset($_COOKIE["ingat_saya"])) {
    list($iduser, $token) = explode(":", $_COOKIE["ingat_saya"]);

    $sql = "SELECT token_login, nama_user, role FROM pengguna WHERE id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $iduser);
    $stmt->execute();
    $stmt->bind_result($TokenLoginDb, $NamaUserDb, $peranDb);
}
?>