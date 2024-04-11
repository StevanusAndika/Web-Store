<?php
require "koneksi.php";

$produk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/page.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark warna1 ml-auto">
        <a class="navbar-brand" href="#">Fashion Store<i class="fa fa-tshirt text-white"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminpanel/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center">
            <h1 class="text-white">Toko Fashion</h1>
            <h3 class="text-white">Mau cari apa??</h3>
            <div class="col-md-8 offset-md-2">
                <form action="produk.php" method="post">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Cari Produk">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-white" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="text-bold">Kategori terlaris</h3>
            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-daster d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=daster" class="text-white">Daster</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=baju koko" class="text-white">Daster Baju Koko</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-kaos d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="produk.php?kategori=kaos" class="text-white">Kaos</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- anout us -->

    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3 text-dark">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus amet, mollitia in assumenda neque magnam eum qui est dicta, vel repudiandae distinctio expedita minima excepturi rem quibusdam commodi ipsa debitis laboriosam veniam. Possimus incidunt recusandae consequatur dolores, dolorum illum ullam?
            </p>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>
            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($produk)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/<?php echo $data['foto']; ?>">
                            </div>
                            <p class="card-title"><?php echo $data['nama'] ?></p>
                            <p class="card-text teks-harga">Rp <?php echo $data['harga'] ?></p>
                            <p class="card-text teks-harga"> <?php echo $data['detail'] ?></p>
                            <a href="detail.php?id=<?php echo $data['id']; ?>" class="btn warna2 text-white">Detail</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid py-5 content-subscribe text-light">
        <div class="container">
            <h5 class="text-center mb-4">Temui Toko Kami</h5>
            <div class="row justify-content-center">
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <i class="bi bi-facebook fs-4"></i>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <i class="bi bi-instagram fs-4"></i>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <i class="bi bi-twitter fs-4"></i>
                </div>
                <div class="col-sm-1 d-flex justify-content-center mb-2">
                    <i class="bi bi-whatsapp fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid py-3 bg-dark text-light  w-100">
        <div class="container d-flex justify-content-between">
            <p class="m-0">Copyright &copy; Your Website 2022</p>
            <p class="m-0">Desain : <a href="https://startbootstrap.com/theme/sb-admin-2" class="text-decoration-none text-light">Start Bootstrap</a></p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
