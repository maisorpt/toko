<?php
session_start();
use LDAP\Result;

include "..\koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the submitted username/email and password
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // check if the user entered a valid email address
    if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
        // query the database for a user with the given email address
        $query = "SELECT * FROM admin WHERE email = '$username_or_email' AND password = '$password'";
    } else {
        // query the database for a user with the given username
        $query = "SELECT * FROM admin WHERE username = '$username_or_email' AND password = '$password'";
    }

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['username'] = $username_or_email;
        $_SESSION['logged_in'] = 'true';

        // Redirect ke halaman index
        header("Location: ../dashboard_admin/index.php");
    } else {
        // Tampilkan pesan kesalahan
        echo "Username atau password salah";
    }
}

// if (empty($_COOKIE['nama_login'])){
//     header("Location: login.php");
// }else{
//     header("Location: index.php");
// }



// echo var_dump($_POST);




?>