<?php
require "koneksi.php";

$id = htmlspecialchars($_GET['id']);

$stmt = mysqli_prepare($con, "SELECT * FROM produk WHERE id = ?");
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result);

$produk_terkait_stmt = mysqli_prepare($con, "SELECT * FROM produk WHERE id != ? ORDER BY RAND() LIMIT 4");
mysqli_stmt_bind_param($produk_terkait_stmt, "s", $id);
mysqli_stmt_execute($produk_terkait_stmt);

$produk_terkait_result = mysqli_stmt_get_result($produk_terkait_stmt);
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
                    <a class="nav-link active" href="about.php ">about  </a>
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
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?php echo $data['foto'] ?>" class="w-100">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $data['nama'] ?></h1>
                    <p class="fs-5">Deskripsi : <?php echo $data['detail'] ?></p>
                    <p class="teks-harga">Rp <?php echo $data['harga'] ?></p>
                    <p class="fs-5">Status : <strong><?php echo $data['ketersediaan_stok'] ?></strong></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white">Produk Terkait</h2>
            <div class="row">
                <?php while ($produk = mysqli_fetch_array($produk_terkait_result)) : ?>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="detail.php?id=<?php echo $produk['id'] ?>" class="card-link">
                            <img src="image/<?php echo $produk['foto'] ?>" alt="" class="img-fluid produk-terkait-image img-thumbnail w-full">
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
