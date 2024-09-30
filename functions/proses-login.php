<?php
session_start();
require "../includes/db-connect.php";

// Proses Login User 
if (isset($_POST["LoginUser"])) {
    $userid = htmlspecialchars($_POST["userid"]);
    $password = htmlspecialchars($_POST["password"]);
   
    $sql = "SELECT id, id_user, email_user, nama_user, role, password FROM pengguna WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $stmt->bind_result($idDB, $nomorIdDB, $emailPenggunaDB, $namaPenggunaDB, $peranPenggunaDB, $passwordDB);
    $stmt->fetch();

    if ($password) {
        if (password_verify($password, $passwordDB)) {
            $_SESSION['user_id'] = $idDB;
            $_SESSION['nomor_id'] = $nomorIdDB;
            $_SESSION['email_pengguna'] = $emailPenggunaDB;
            $_SESSION['nama_pengguna'] = $namaPenggunaDB;
            $_SESSION['peran_pengguna'] = $peranPenggunaDB;
            $stmt->close();
            
    
            $token = bin2hex(random_bytes(16));
            $hashedToken = password_hash($token,PASSWORD_BCRYPT);
          
    
            $sql = "UPDATE pengguna SET token_login = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashedToken, $idDB);
            $stmt->execute();
    
            setcookie("ingat_saya", $idDB.":".$token, time() + (30*24*60*60),"/");
    
            echo json_encode(["status" => "berhasil", "alihkan" => "/pages/dashboard.php"]);
    
        } else {echo "error password salah";}
    } else {echo "hallo penyusup";}
} else {
    echo "error";
}
$stmt->close();
$conn->close();

?>