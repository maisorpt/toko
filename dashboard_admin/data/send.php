<?php 
include "../../koneksi.php";

$item_name = $_POST['nama'];
$item_brand = $_POST['merek'];
$item_category = $_POST['jenis'];
$item_unit = $_POST['satuan'];
$item_qty = $_POST['jumlah'];
$item_price = $_POST['harga'];

$query = "INSERT INTO `gudang` (`id`, `id_barang`, `item_name`, `image`, `id_satuan`, `quantity`, `price`, `id_jenis`) VALUES (NULL, '$item_brand', '$item_name', NULL, '$item_unit', '$item_qty', '$item_price', '$item_category');";

$conn->query($query);


//$nama = $_FILES["foto"]["name"];
//move_uploaded_file($_FILES["foto"]["tmp_name"], "assets/$nama");


header("Location:../warehouse.php");

$conn->close();
?>


?>