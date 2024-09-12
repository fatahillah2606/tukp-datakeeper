<?php
$conn = new mysqli("localhost", "andika", "CODOTERSNA29", "tukp_datakeeper");
if ($conn->connect_error){
    die("Kesalahan: ".$conn->connect_error);
}
?>