<?php
session_start();
require "../includes/db-connect.php";

// Proses Login User 
if (isset($_POST["LoginUser"])) {
    $userid = htmlspecialchars($_POST["userid"]);
    $password = htmlspecialchars($_POST["password"]);
   
    $sql = "SELECT id_user, nama_user, role, password, token_login FROM pengguna WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $stmt->bind_result($UserId, $NamaUser, $Role, $Password, $TokenLogin);
    $stmt->fetch();

    if ($password && password_verify($password, $Password)) {
        $_SESSION["user_id"] = $UserId;
        $_SESSION["nama_user"] = $NamaUser;
        $stmt->close();
        echo $UserId;

        $token = bin2hex(random_bytes(16));
        $hashedToken = password_hash($token,PASSWORD_BCRYPT);
        echo $hashedToken;

        $sql = "UPDATE pengguna SET token_login = ? WHERE id_user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $hashedToken, $UserId);
        $stmt->execute();

        setcookie("ingat_saya", $UserId.":".$token, time() + (30*24*60*60),"/");

    } else {echo "error Tolol";}
}else{
echo "error Tolol";
}
$stmt->close();
$conn->close();
?>