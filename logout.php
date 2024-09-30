<?php
    session_start();
    session_destroy();
    setcookie("ingat_saya", "", time() - 3600, "/");
    header("Location: /");
    exit();
?>