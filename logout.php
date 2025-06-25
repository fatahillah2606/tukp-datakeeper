<?php
// Hapus semua sesi yang tersimpan
session_start();
session_destroy();

// Hapus semua cookies yang tersimpan
setcookie("login", "", time() - 3600, "/");

// Pindah user ke halaman login
header("Location: /");
exit();

?>