<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once('layout/resourcehead.php') ?>
</head>

<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('layout/sidenav.php') ?>

        <!-- Content Start -->
        <div class="content">

            <?php include_once('layout/navbar.php') ?>
            <div class="row">
                <div class="col m-4">
                    <div class="bg-light rounded p-3">
                        <h3 class="mb-4 mt-2">Warehouse Stock</h3>
                        <table class="table table-bordered text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col"> No</th>
                                    <th scope="col"> Item Code</th>
                                    <th scope="col"> Item Name</th>
                                    <th scope="col"> Item Brand</th>
                                    <th scope="col"> Item Category</th>
                                    <th scope="col"> Unit of Measure</th>
                                    <th scope="col"> Unit Price</th>
                                    <th scope="col"> Qty</th>
                                    <th><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                            New </button> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //                 		$batas = 10;
//                         $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
//                         $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                                
                                //                         $previous = $halaman - 1;
//                         $next = $halaman + 1;
                                
                                include "../koneksi.php";


                                //                 $data =  $conn->query("SELECT dk.id, dk.id_kelas, k.nama_kelas, t.*
//                 FROM daftar_kelas AS dk
//                 JOIN kelas as k ON dk.id_kelas=k.id_kelas
//                RIGHT JOIN test1 as t ON dk.id_nama=t.no ORDER BY ID");
                                

                                // $previous = $halaman - 1;
// $next = $halaman + 1;
                                
                                //                 $jumlah_data = $data->num_rows;
//                 $total_halaman = ceil($jumlah_data / $batas);
                                

                                $sql = "SELECT g.*,k.jenis, s.satuan, b.merek
                                FROM gudang AS g 
                                JOIN barang as b ON g.id_barang=b.id
                                JOIN kategori as k ON g.id_jenis=k.id
                                JOIN satuan as s ON g.id_satuan=s.id
                ";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) {

                                        // if ($row["foto"] == "") {
                                        //     $gambar = "gambar.jpg";
                                        // } else {
                                        //     $gambar = $row["foto"];
                                        // }
                                        // 
                                        
                                        ?>

                                        <tr>
                                            <th scope="row">
                                                <?= $no++ ?>
                                            </th>
                                            <td>
                                                <?= $row["id"] ?>
                                            </td>
                                            <td class="edited">
                                                <?= $row["item_name"] ?>
                                            </td>
                                            <td>
                                                <?= $row["merek"] ?>
                                            </td>
                                            <td>
                                                <?= $row["jenis"] ?>
                                            </td>
                                            <td>
                                                <?= $row["satuan"] ?>
                                            </td>
                                            <td class="edited">
                                                <?= $row["price"] ?>
                                            </td>
                                            <td class="edited">
                                                <?= $row["quantity"] ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-id="<?= $row["id"] ?>">
                                                    Edit</button>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete"
                                                    data-bs-id="<?= $row["id"] ?>">
                                                    Delete</button>

                                            </td>
                                        </tr>
                                        <?php

                                    } 

                                    
                                }

                                ?>

                            </tbody>


                        </table>
                    </div>

                </div>

            </div>



            <?php include_once('layout/footer.php') ?>
            <?php include_once('layout/modal.php')?>

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script>
  $(document).ready(function () {
            //  alert('ok');
            const modal = document.getElementById('exampleModal')

            modal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id')
                $.post("data/form.php", {id}, function (a) {
                    // console.log(a);
                    $('.modal-body').html(a);
                }).done(function () {

                }).fail(function () {
                    // alert("error");
                }).always(function () {
                    // alert("finished");
                });
            })
            const model = document.getElementById('delete')
            model.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id')
                
                $('#hapus').on('click', function (event) {
                    
                    $.post("data/delete.php", {id}, function (a) {
                       window.location.reload();
                    })
                })
            })
            const modul = document.getElementById('new')
            modul.addEventListener('show.bs.modal', event => {
                const id = 1;
                $.post("data/new.php", {id}, function (a) {
                    $('.modal-create').html(a);
                })

            })
            
        })
    </script>
    <?php include_once('layout/resourcejs.php') ?>
</body>

</html>