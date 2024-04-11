<?php

session_start();
require "session.php";
require "../koneksi.php";

$query_kategori  = mysqli_query($con, "SELECT * FROM kategori");
$jumlah_kategori = mysqli_num_rows($query_kategori);


$produk  = mysqli_query($con, "SELECT * FROM produk");
$jumlah_produk = mysqli_num_rows($produk);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet " href = "../boostrap/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Halaman Dashboard</title>
</head>
<body>
<?php require "navbar.php";?>
    <h2> </h2>
</body>
</html>
