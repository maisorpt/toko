<?php
include "../../koneksi.php";


// $sql = "SELECT `foto` FROM `test1` WHERE `no` = $id;";

// $data_foto = $conn->query($sql);
// $foto = $data_foto->fetch_assoc();

// //hapus data gambar di assests

// unlink("assets/" . $foto['foto']);


if($_POST['id']){
    $header = 1;
    $id = $_POST['id'];
    $sqlhapus = "DELETE FROM `gudang` WHERE gudang.id = '$id';";
}elseif($_POST['stuff_id']){
    $header = 2;
    $id = $_POST['stuff_id'];
    $sqlhapus = "DELETE FROM `barang` WHERE barang.id = '$id';";
}elseif($_POST['category_id']){
    $header = 3;
    $id = $_POST['category_id'];
    $sqlhapus = "DELETE FROM `kategori` WHERE kategori.id = '$id';";
}elseif($_POST['unit_id']){
    $header = 2;
    $id = $_POST['unit_id'];
    $sqlhapus = "DELETE FROM `satuan` WHERE satuan.id = '$id';";
}else{

    header("Location:../warehouse.php");
}


$conn->query($sqlhapus);    

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
