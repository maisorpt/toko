<?php
include "../../koneksi.php";

if(isset($_GET['no'])){
    $header = 1;
    $id = $_GET['no'];
    $item_name = $_POST['nama'];
    $item_brand = $_POST['merek'];
    $item_category = $_POST['jenis'];
    $item_unit = $_POST['satuan'];
    $item_qty = $_POST['jumlah'];
    $item_price = $_POST['harga'];
    
    $sql = "UPDATE gudang SET `id_barang` = '$item_brand', `item_name` = '$item_name', `id_satuan` = '$item_unit', `quantity` = '$item_qty', `price` = '$item_price', `id_jenis` = '$item_category' WHERE gudang.id = '$id';";
    
}elseif(isset($_GET['stuff_id']) && isset($_FILES['image']['name']) ){

    $header = 2;
    $id = $_GET['stuff_id'];
    $item_brand = $_POST['brand'];
    if($_FILES['image']['name'] != ""){
        $item_image = $_FILES['image']['name'];
        $sql = "UPDATE barang SET `merek` = '$item_brand', `brand_image` = '$item_image' WHERE id = '$id';";
        $nama = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/$nama");
    }else{
        $sql = "UPDATE barang SET `merek` = '$item_brand' WHERE id = '$id';";
    }

}elseif(isset($_GET['category_id'])){

    $header = 3;
    $id = $_GET['category_id'];
    $item_category = $_POST['category'];
    $sql = "UPDATE kategori SET `jenis` = '$item_category' WHERE id = '$id';";

}elseif(isset($_GET['unit_measure_id'])){

    $header = 4;
    $id = $_GET['unit_measure_id'];
    $item_unit_measure = $_POST['unit'];
    $sql = "UPDATE satuan SET `satuan` = ' $item_unit_measure' WHERE id = '$id';";

}else{
    header("Location:../warehouse.php");
}

$conn->query($sql);

if($header == 1){
    header("Location:../warehouse.php");
}elseif($header == 2){
    header("Location:../stuff.php");
}elseif($header == 3){
    header("Location:../category.php");
}elseif($header == 4){
    header("Location:../unit.php");
}else{
    header("Location:../warehouse.php");
}


$conn->close();
?>