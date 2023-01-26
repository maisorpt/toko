<?php


$id = $_POST["id"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// $sql = "SELECT `foto` FROM `test1` WHERE `no` = $id;";

// $data_foto = $conn->query($sql);
// $foto = $data_foto->fetch_assoc();

// //hapus data gambar di assests

// unlink("assets/" . $foto['foto']);

$sqlhapus = "DELETE FROM `gudang` WHERE gudang.id = '$id';";

$conn->query($sqlhapus);    

$conn->close();
