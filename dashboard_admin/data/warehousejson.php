<?php
include '../../koneksi.php';
//ambil data
$sql = "SELECT g.*,k.jenis, s.satuan, b.merek
FROM gudang AS g 
JOIN barang as b ON g.id_barang=b.id
JOIN kategori as k ON g.id_jenis=k.id
JOIN satuan as s ON g.quantity=s.id";
$ambil_data = $conn->query($sql);

 //data array
 $array = array();
 while ($data = $ambil_data->fetch_assoc()) $array[] =  $data; 
   
  //mengubah data array menjadi json
  
   echo json_encode($array);

?>