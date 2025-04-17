<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "data-barang";

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Cek apakah terjadi kesalahan koneksi
if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
};