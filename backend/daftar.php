<?php
require "../connection/db_tukp.php";
require "generate_api.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["register"])) {
        echo json_encode(generateAPI("success", 200, "Data Berhasil dikirim, namun belum di proses",""));
    }
}
?>