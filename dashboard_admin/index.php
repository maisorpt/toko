<?php
session_start();

// Cek apakah terdapat session
if (!isset($_SESSION['username']) ) {
    // Redirect ke halaman login
    header("Location: ../auth/login.php");
}
$content = 1;
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
    <?php include_once('layout/navbar.php') ?>
        <div class="row ">
            <span><h2 class="text-center shadow-sm p-3">Inventory</h2></span>
        </div>
            
            <?php 
        include "../koneksi.php";

           $sql_1 = "SELECT COUNT(quantity) as available FROM `gudang`WHERE quantity > 0 ;";
           $sql_2 = "SELECT COUNT(quantity)  as out_of_stock FROM `gudang`WHERE quantity = 0 ;";
           $sql_3 = "SELECT COUNT(item_name) as item FROM `gudang`;";
           $sql_4 = "SELECT COUNT(merek) as count_merek FROM  `barang`;";

           $result_1 =$conn->query($sql_1)->fetch_assoc();
           $result_2 =$conn->query($sql_2)->fetch_assoc();
           $result_3 =$conn->query($sql_3)->fetch_assoc();
           $result_4 =$conn->query($sql_4)->fetch_assoc();
           
           ?>

            <div class="row m-3">
                <div class="col-6 ">
                    <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                        <i class="fas fa-box fa-8x text-primary "></i>
                        <div class="ms-3">
                            <p class="mb-2" style="font-size: 20px;">Stock Available</p>
                            <h3 class="mb-0"><?=  $result_1["available"]?></h3>
                            <p>Item</p>
                        </div>
                    </div>
                </div>

                <div class="col-6 ">
                    <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                        <i class="fas fa-exclamation-circle fa-8x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2" style="font-size: 20px;">Out of Stock</p>
                            <h3 class="mb-0"><?=  $result_2["out_of_stock"]?></h3>
                            <p>Item</p>
                        </div>
                    </div>
                </div>   
            </div>

            <div class="row m-3">
               <div class="col-6  ">
                   <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                       <i class="fas fa-warehouse fa-8x text-primary"></i>
                       <div class="ms-3">
                           <p class="mb-2" style="font-size: 20px;">Total Item</p>
                           <h3 class="mb-0"><?=  $result_3["item"]?></h3>
                           <p>In Warehouse</p>
                       </div>
                   </div>
               </div>
                <div class="col-6 ">
                    <div class="bg-white rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                        <i class="fas fa-chart-pie fa-8x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2" style="font-size: 20px;">Total Brand</p>
                            <h3 class="mb-0"><?=  $result_4["count_merek"]?></h3>
                            <p>In Warehouse</p>
                        </div>
                    </div>
                </div>   
            </div>

            <?php include_once('layout/footer.php')?>

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <?php include_once('layout/resourcejs.php') ?>
</body>

</html>