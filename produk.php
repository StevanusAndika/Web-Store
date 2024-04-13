<?php
require "koneksi.php";

$query_kategori = mysqli_query($con, "SELECT * FROM kategori");

// Handle GET requests
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($con, $_GET['keyword']);
    $query_produk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");
} elseif (isset($_GET['kategori'])) {
    $kategori = mysqli_real_escape_string($con, $_GET['kategori']);
    $query_get_kategori = mysqli_query($con, "SELECT id FROM kategori WHERE name = '$kategori'");
    $kategori_id = mysqli_fetch_array($query_get_kategori);

    $query_produk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '{$kategori_id['id']}'");

} else {
    $query_produk = mysqli_query($con, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($query_produk);
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
                    <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="about.php ">Tentang kami </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminpanel/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center">
            <h1 class="text-white">Produk</h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                <ul class="list-group">
                    <?php while ($kategori = mysqli_fetch_assoc($query_kategori)) : ?>
                        <a href="produk.php?kategori=<?php echo $kategori['name']; ?>">
                            <li class="list-group-item"><?php echo $kategori['name']; ?></li>
                        </a>
                    <?php endwhile; ?>
                </ul>
            </div>
            <!-- Main content -->
            <div class="col-lg-9">
                <h3 class="text-center mb-3">Produk</h3>
                <div class="row">
                    <?php if ($countData > 0) : ?>
                        <?php while ($produk = mysqli_fetch_assoc($query_produk)) : ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="image-box">
                                        <img src="image/<?php echo $produk['foto']; ?>">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $produk['nama'] ?></h4>
                                        <p class="card-text teks-harga">Rp <?php echo $produk['harga'] ?></p>
                                        <p class="card-text teks-harga"> <?php echo $produk['detail'] ?></p>
                                        <a href="detail.php?id=<?php echo $produk['id']; ?>" class="btn warna2 text-white">Detail</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <h4 class="text-center my-5">Produk tidak ditemukan</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php  require "footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
