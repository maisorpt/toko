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
                <div class="col m-4 shadow-lg p-3 m-3 bg-body-tertiary rounded">
                    <div class="rounded p-3">
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
                                    <th scope="col"> Qty</th>
                                    <th scope="col"> Unit Price</th>
                                    <th></th>
                                    <!-- w -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $batas = 10;
                                $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                $previous = $halaman - 1;
                                $next = $halaman + 1;

                                include "../koneksi.php";

                                $data = $conn->query("SELECT g.*,k.jenis, s.satuan, b.merek
                                FROM gudang AS g 
                               LEFT JOIN barang as b ON g.id_barang=b.id
                               LEFT JOIN kategori as k ON g.id_jenis=k.id
                               LEFT  JOIN satuan as s ON g.quantity=s.id");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);


                                $sql = "SELECT g.*,k.jenis, s.satuan, b.merek
                             FROM gudang AS g 
                            LEFT JOIN barang as b ON g.id_barang=b.id
                            LEFT JOIN kategori as k ON g.id_jenis=k.id
                            LEFT  JOIN satuan as s ON g.quantity=s.id
                            LIMIT $halaman_awal, $batas;
                            ";



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
                                                <?= $row["id_barang"] ?>
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
                                                <?= $row["quantity"] ?>
                                            </td>
                                            <td class="edited">
                                                <?= $row["price"] ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal" data-bs-id="" data_dk="" data_kelas="">
                                                    Edit</button>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete"
                                                    data-bs-id="">
                                                    Hapus</button>

                                            </td>
                                        </tr>
                                        <?php

                                    } ?>

                                    <?php include_once('layout/modal.php');
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
    <script>

        var cells = document.getElementsByClassName("edited");
        for (var i = 0; i < cells.length; i++) {
            cells[i].addEventListener("click", function () {
                this.contentEditable = true;
            });

            const modal = document.getElementById('exampleModal')

            modal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id')
                const id_dk = button.getAttribute('data_dk')
                const id_kelas = button.getAttribute('data_kelas')
                console.log(id_kelas);
                $.post("form.php", { id, id_dk, id_kelas }, function (a) {
                    // console.log(a);
                    $('.modal-body').html(a);
                }).done(function () {

                }).fail(function () {
                    // alert("error");
                }).always(function () {
                    // alert("finished");
                });
            })

            $("#myForm").submit(function(event){
             event.preventDefault(); // prevent the form from submitting
    // your code here
  });
        }</script>
    <?php include_once('layout/resourcejs.php') ?>
</body>

</html>