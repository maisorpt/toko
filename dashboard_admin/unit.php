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
                        <h3 class="mb-4 mt-2">Unit of Measure</h3>
                        <table class="table table-bordered text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col"> No</th>
                                    <th scope="col">Unit of Measure</th>
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
                                

                                $sql = "SELECT * FROM satuan";

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
                                                <?= $row["satuan"] ?>
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

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <?php include_once('layout/resourcejs.php') ?>
</body>

</html>