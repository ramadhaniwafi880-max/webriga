<?php

$db = new mysqli("localhost", "root", "", "apotek");

if ($db->connect_errno) {
    echo "Gagal koneksi database : " . $db->connect_error;
    exit();
}
?>