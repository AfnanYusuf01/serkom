<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_beasiswa";

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>