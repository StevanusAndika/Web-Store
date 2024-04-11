<?php 

$con = mysqli_connect("localhost", "root", "", "toko_online");

if (mysqli_connect_errno()) {
    echo "gagal koneksi".mysqli_connect_error();
    exit();

}



?>