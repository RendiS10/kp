<?php
$server     = "localhost";          // ==> server kita
$username   = "root";               // ==> username database
$password   = "";                   // ==> password database
$db         = "magangls";           // ==> nama database yang akan dipanggil

$koneksi = mysqli_connect($server, $username, $password, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
