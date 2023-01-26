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
                        <h3 class="mb-4 mt-2">Stuff</h3>
                        <table class="table table-bordered text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col"> No</th>
                                    <th scope="col">Brand ID</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col"> Brand Logo</th>
                                    <th><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#new">
                            New </button> </th>
                                    <!-- w -->
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
                                

                                $sql = "SELECT * FROM barang";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                        // if ($row["foto"] == "") {
                                        //     $gambar = "gambar.jpg";
                                        // } else {
                                        //     $gambar = $row["foto"];
                                        // }
                                        // 
                                        $no = 1;
                                        ?>

                                        <tr>
                                            <th scope="row">
                                                <?= $no++ ?>
                                            </th>
                                            <td>
                                                <?= $row["id"] ?>
                                            </td>
                                            <td>
                                                <?= $row["merek"] ?>
                                            </td>
                                            <td>
                                                <?= $row["brand_image"] ?>
                                            </td>
                                            <td>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
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
                const stuff_id = button.getAttribute('data-bs-id')
                alert(stuff_id);
                $.post("data/form.php", {stuff_id}, function (a) {
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
                //alert(id);
                
                $('#hapus').on('click', function (event) {
                    
                    $.post("data/delete.php", {id}, function (a) {
                       window.location.reload();
                    })
                })
            })
            const modul = document.getElementById('new')
            modul.addEventListener('show.bs.modal', event => {
                $.post("data/new.php", function (a) {
                    $('.modal-create').html(a);
                })

            })
            
        })
        </script>
    <?php include_once('layout/resourcejs.php') ?>
</body>

</html>