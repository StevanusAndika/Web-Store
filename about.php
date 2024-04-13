<?php
require "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/page.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark warna1 ml-auto">
        <a class="navbar-brand" href="#">Fashion Store <i class="fa fa-tshirt text-white"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="# ">Tentang Kami </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminpanel/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    

    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center">
            <h1 class="text-white">Tentang Kami </h1>
            
               
            </div>
        </div>
        <div class="container-fluid py-5">

        <div class="container fs-5 text-center">

      
            <p  class="text-center text-dark" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum voluptatum rem non adipisci ratione beatae voluptate esse corrupti, animi ducimus asperiores, explicabo ipsa odit consectetur rerum. At, molestiae. Odio, dolorum vitae. Error temporibus consequatur eum vitae harum quos. Libero et voluptatem neque, dignissimos eligendi nam in dicta officia laboriosam, nisi molestias saepe? Quas quisquam ratione rem quo consequuntur eveniet impedit, voluptates quis nesciunt iste similique, ut dolorum repellat eligendi molestias unde amet. Reprehenderit, itaque rerum? Dolores reprehenderit perferendis, minus at quasi molestias iste accusantium laborum! Consequatur assumenda sapiente expedita optio blanditiis provident ipsam doloremque, id, saepe ad quo nihil voluptatem?</p>
            <P class="text-center text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sed dolor natus sequi similique distinctio at ipsa officia, nemo voluptatum modi eligendi iure non id minus? Laborum, ullam eaque incidunt aliquam quos libero, nemo tempora et ipsam voluptatem asperiores! Illum veritatis officia, expedita aspernatur voluptatem culpa! Nobis laudantium reiciendis ipsam sed possimus voluptate. Esse, reiciendis iure quas, nisi sequi delectus quis asperiores beatae in facere consectetur numquam enim nemo ipsum qui. Minus quibusdam dolor magni excepturi in aliquam quia porro.</P>
        </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>


    <!-- Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
