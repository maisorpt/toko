<?php
//ambil data
$sql_1 = "SELECT * FROM barang";
$sql_2 = "SELECT * FROM kategori";
$sql_3 = "SELECT * FROM satuan";
$data_barang = $conn->query($sql_1);
$data_kategori = $conn->query($sql_2);
$data_satuan = $conn->query($sql_3);


?>