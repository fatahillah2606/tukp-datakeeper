<?php 
session_start();

require "db-connect.php";

if (!isset($_SESSION["id"]) && isset($_COOKIE["ingat_saya"])) {
    list($id, $token) = explode(":", $_COOKIE["ingat_saya"]);

    $sql = "SELECT token_login, nama_user, role, email_user, id_user FROM pengguna WHERE id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($TokenLoginDb, $NamaUserDb, $peranDb, $EmailDb, $IdUserDb);
    $stmt->fetch();

    echo 'Al Tampan';
    if ($TokenLoginDb && password_verify($token, $TokenLoginDb)) {
       $_SESSION['nama_user'] = $NamaUserDb;
       $_SESSION['user_role'] = $peranDb;
       if ($peranDb === 'Admin') {
        $_SESSION['email_user'] = $EmailDb;
       }
       else {
        $_SESSION['id_user'] = $IdUserDb;
       }
       echo 'hallo' . $_SESSION['nama_user'];
    }
    else {
        setcookie('ingat_saya', '', time() - 3600, '/');
    }
    $stmt->close();
}
$conn->close();
?>