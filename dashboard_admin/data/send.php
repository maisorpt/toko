<?php
include "../../koneksi.php";


if ($_GET['id'] == 1) {

    $item_name = $_POST['nama'];
    $item_brand = $_POST['merek'];
    $item_category = $_POST['jenis'];
    $item_unit = $_POST['satuan'];
    $item_qty = $_POST['jumlah'];
    $item_price = $_POST['harga'];

    $query = "INSERT INTO `gudang` (`id`, `id_barang`, `item_name`, `image`, `id_satuan`, `quantity`, `price`, `id_jenis`) VALUES (NULL, '$item_brand', '$item_name', NULL, '$item_unit', '$item_qty', '$item_price', '$item_category');";
} elseif ($_GET['id'] == 2) {
    $item_brand = $_POST['brand'];
    $item_image = $_FILES['image']['name'];
    $query = "INSERT INTO `barang` (`id`, `merek`, `brand_image`) VALUES( NULL, '$item_brand', '$item_image' ); ";
    $nama = $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/$nama");
} elseif ($_GET['id'] == 3) {
    $item_category = $_POST['category'];
    $query = "INSERT INTO `kategori` (`id`, `jenis`) VALUES( NULL, '$item_category' ); ";
} elseif ($_GET['id'] == 4) {
    $item_unit = $_POST['unit'];
    $query = "INSERT INTO `satuan` (`id`, `satuan`) VALUES( NULL, '$item_unit' ); ";
} else {
    header("Location:../warehouse.php");
}


$conn->query($query);



if ($_GET['id'] == 1) {
    header("Location:../warehouse.php");
} elseif ($_GET['id'] == 2) {
    header("Location:../stuff.php");
} elseif ($_GET['id'] == 3) {
    header("Location:../category.php");
} elseif ($_GET['id'] == 4) {
    header("Location:../unit.php");
} else {
    header("Location:../warehouse.php");
}


$conn->close();
?>


?>