<?php
session_start();

// Cek apakah terdapat session
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login
    header("Location: ../auth/login.php");
}
?>
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

            <!-- Navbar Start -->
            <nav
                class="navbar navbar-expand bg-primary navbar-light sticky-top px-4 shadow-lg pt-0 mb-4 bg-body-tertiary rounded">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-light mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0 ">
                    <i class="fa fa-bars"></i>
                </a>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                } else {
                    $id = "";
                }

                ?>
                <form class="d-none d-md-flex ms-4" role="search"
                    action="http://localhost/toko/dashboard_admin/search.php" method="get" id="form">
                    <input class="form-control border-0" type="hidden" value="<?= $id ?>" name="id">
                    <input class="form-control border-0" type="search" placeholder="Search" name="query">
                    <button class="btn btn-outline-light mx-1" type="submit">Search</button>
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex text-light">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex  text-light">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="layout/img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex  text-light">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="../auth/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <div class="row">
                <div
                    class="col m-4 shadow-lg p-3 m-3 bg-body-tertiary rounded shadow-lg p-3 m-3 bg-body-tertiary rounded">

                    <?php
                    if (!isset($_GET['query'])) {
                        $_GET['query'] = "";
                    }
                    if (isset($_GET['id'])) {
                        // Warehouse search Start 
                        if ($_GET['id'] == 2) {
                            $keyword = $_GET['query']; ?>


                            <?php
                            $batas = 5;
                            $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            include "../koneksi.php";

                            if ($_GET['query'] != "") {



                                $data = $conn->query("SELECT g.*,k.jenis, s.satuan, b.merek
                                        FROM gudang AS g 
                                        LEFT JOIN barang as b ON g.id_barang=b.id
                                        LEFT JOIN kategori as k ON g.id_jenis=k.id
                                        LEFT  JOIN satuan as s ON g.quantity=s.id WHERE g.id LIKE '%$keyword%' OR g.item_name LIKE '%$keyword%' OR g.quantity LIKE '%$keyword%' OR g.price LIKE '%$keyword%' OR k.jenis LIKE '%$keyword%' OR b.merek LIKE '%$keyword%' OR s.satuan LIKE '%$keyword%'");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);


                                $sql = "SELECT g.*,k.jenis, s.satuan, b.merek
                                FROM gudang AS g 
                                LEFT JOIN barang as b ON g.id_barang=b.id
                                LEFT JOIN kategori as k ON g.id_jenis=k.id
                                LEFT  JOIN satuan as s ON g.quantity=s.id WHERE g.id LIKE '%$keyword%' OR g.item_name LIKE '%$keyword%' OR g.quantity LIKE '%$keyword%' OR g.price LIKE '%$keyword%' OR k.jenis LIKE '%$keyword%'OR b.merek LIKE '%$keyword%' OR s.satuan LIKE '%$keyword%'
                                LIMIT $halaman_awal, $batas;
                                        ";

                            } else {

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
                            }
                            ?>
                            <div class="rounded p-3">
                                <h3 class="mb-4 mt-2 ">Warehouse Stock</h3>
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
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {

                                                ?>

                                                <tr>
                                                    <th scope="row">
                                                        <?= $no++ ?>
                                                    </th>
                                                    <td>
                                                        <?= $row["id"] ?>
                                                    </td>
                                                    <td>
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
                                                    <td>
                                                        <?= $row["price"] ?>
                                                    </td>
                                                    <td>
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
                                <?php include_once('layout/pagination.php') ?>
                            </div>
                            <?php
                            // Category End
                            // Stuff Start
                        } elseif ($_GET['id'] == 3) {

                            $keyword = $_GET['query'];
                            $batas = 5;
                            $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            include "../koneksi.php";
                            if ($_GET['query'] != "") {

                                $data = $conn->query("SELECT * FROM barang WHERE id LIKE '%$keyword%' OR merek LIKE '%$keyword%';");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);

                                $sql = "SELECT * FROM barang WHERE id LIKE '%$keyword%' OR merek LIKE '%$keyword%' LIMIT $halaman_awal, $batas;";

                            } else {

                                $data = $conn->query("SELECT * FROM barang;");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);

                                $sql = "SELECT * FROM barang LIMIT $halaman_awal, $batas;";

                            }
                            ?>
                            <div class="rounded p-3">
                                <h3 class="mb-4 mt-2">Stuff</h3>
                                <table class="table table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"> No</th>
                                            <th scope="col">Brand ID</th>
                                            <th scope="col">Brand Name</th>
                                            <th scope="col"> Brand Logo</th>
                                            <th><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                                                    New </button> </th>
                                            <!-- w -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {

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
                                                        <img src="assets\<?= $row["brand_image"] ?>" style="max-width:50px ;"></img>
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
                                <?php include_once('layout/pagination.php') ?>
                            </div>
                            <?php

                            //Stuff End
                            //Category Start
                        } elseif ($_GET['id'] == 4) {
                            $keyword = $_GET['query'];
                            $batas = 5;
                            $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            include "../koneksi.php";
                            if ($_GET['query'] != "") {

                                $data = $conn->query("SELECT * FROM kategori WHERE id LIKE '%$keyword$' OR jenis LIKE '%$keyword$';");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);

                                $sql = "SELECT * FROM kategori WHERE id LIKE '%$keyword$' OR jenis LIKE '%$keyword$' LIMIT $halaman_awal, $batas;";

                            } else {

                                $data = $conn->query("SELECT * FROM kategori;");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);

                                $sql = "SELECT * FROM kategori LIMIT $halaman_awal, $batas;";

                            }
                            ?>
                            <div class="rounded p-3">
                                <h3 class="mb-4 mt-2">Category</h3>
                                <table class="table table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"> No</th>
                                            <th scope="col">Category ID</th>
                                            <th scope="col">Category</th>
                                            <th><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                                                    New </button> </th>
                                        </tr>
                                        <!-- w -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {

                                                ?>

                                                <tr>
                                                    <th scope="row">
                                                        <?= $no++ ?>
                                                    </th>
                                                    <td>
                                                        <?= $row["id"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row["jenis"] ?>
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
                                <?php include_once('layout/pagination.php') ?>
                            </div>
                            <?php
                            //Category end
                            // Unit of Measure Start
                        } elseif ($_GET['id'] == 5) {
                            $keyword = $_GET['query'];
                            $batas = 5;
                            $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            include "../koneksi.php";
                            if ($_GET['query'] != "") {
                                ?>
                                <?php


                                $data = $conn->query("SELECT * FROM satuan WHERE id LIKE '%$keyword%' OR satuan LIKE '%$keyword%';");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);


                                $sql = "SELECT * FROM satuan WHERE id LIKE '%$keyword%' OR satuan LIKE '%$keyword%' LIMIT $halaman_awal, $batas;";



                            } else {

                                $data = $conn->query("SELECT * FROM satuan;");

                                $jumlah_data = $data->num_rows;
                                $total_halaman = ceil($jumlah_data / $batas);


                                $sql = "SELECT * FROM satuan LIMIT $halaman_awal, $batas;";
                            }
                            ?>
                            <div class="rounded p-3">
                                <h3 class="mb-4 mt-2">Unit of Measure</h3>
                                <table class="table table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"> No</th>
                                            <th scope="col">Unit of Measure</th>
                                            <th><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                                                    New </button> </th>
                                        </tr>
                                        <!-- w -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?= $no++ ?>
                                                    </th>
                                                    <td>
                                                        <?= $row["satuan"] ?>
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
                                <?php include_once('layout/pagination.php') ?>
                            </div>
                            <?php
                        } else {
                            echo "HELLO THERE";
                        }

                        // warehouse search end 
                    
                    } else {
                        echo "HELLO THERE";
                    }


                    ?>


                </div>
                <?php include_once('layout/footer.php') ?>
            </div>

            <?php include_once('layout/modal.php') ?>

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
                $.post("data/form.php", { id }, function (a) {
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

                    $.post("data/delete.php", { id }, function (a) {
                        window.location.reload();
                    })
                })
            })
            const modul = document.getElementById('new')
            modul.addEventListener('show.bs.modal', event => {
                const id = 1;
                $.post("data/new.php", { id }, function (a) {
                    $('.modal-create').html(a);
                })

            })

            // $("form").submit(function (event) {
            //     event.preventDefault();
            //     alert("hoi");
            //     const id = $("#form").attr("search-id");

            //     alert(id);
            //     const ide = $(this).find("input").val();
            //     alert(ide);
            // });

        })
    </script>
    <?php include_once('layout/resourcejs.php') ?>
</body>

</html>