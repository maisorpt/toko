<?php
session_start();

// Cek apakah terdapat session
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login
    header("Location: ../auth/login.php");
}
$content = 2;
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
            <div class="row">
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

            $("form").submit(function (event) {
                event.preventDefault();
                // alert("hoi");
                const id = $("#form").attr("search-id");

                // alert(id);
                const query = $(this).find("input").val();
            //    alert(query);
                
               window.location.href = "http://localhost/toko/dashboard_admin/search.php?id=" + id + "&query=" + query;

            });

        })
    </script>
    <?php include_once('layout/resourcejs.php') ?>
</body>

</html>