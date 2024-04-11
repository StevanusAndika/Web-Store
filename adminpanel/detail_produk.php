<?php
session_start();
require "session.php";
require "../koneksi.php";

// Fungsi untuk mendapatkan detail produk berdasarkan ID
function getDetailProduk($con, $id) {
    $query = "SELECT * FROM produk WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengupdate detail produk
function updateDetailProduk($con, $id, $nama, $kategori_id, $harga, $detail, $ketersediaan_stok) {
    $query = "UPDATE produk SET nama = '$nama', kategori_id = '$kategori_id', harga = '$harga', detail = '$detail', ketersediaan_stok = '$ketersediaan_stok' WHERE id = '$id'";
    return mysqli_query($con, $query);
}

// Fungsi untuk menghapus produk
function deleteProduk($con, $id) {
    // Prepare the SQL statement
    $query = "DELETE FROM produk WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the execution was successful
    if($result) {
        return true;
    } else {
        return false;
    }
}


// Mendapatkan ID produk dari URL
$id = $_GET['id'];

// Memproses form jika ada data yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        // Mendapatkan data dari form
        $nama = htmlspecialchars($_POST['nama']);
        $kategori_id = htmlspecialchars($_POST['kategori']);
        $harga = htmlspecialchars($_POST['harga']);
        $detail = htmlspecialchars($_POST['detail']);
        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

        // Melakukan update detail produk
        if (updateDetailProduk($con, $id, $nama, $kategori_id, $harga, $detail, $ketersediaan_stok)) {
            echo "<div class='alert alert-success mt-3' role='alert'>Data berhasil diperbarui!</div>";
            echo "<meta http-equiv='refresh' content='5; url=produk.php'>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Gagal memperbarui data produk!</div>";
        }
    } elseif (isset($_POST['delete'])) {
        // Melakukan delete produk
        if (deleteProduk($con, $id)) {
            echo "<div class='alert alert-success mt-3' role='alert'>Produk berhasil dihapus!</div>";
            echo "<meta http-equiv='refresh' content='5; url=produk.php'>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Gagal menghapus produk!</div>";
        }
    }
}

// Mendapatkan detail produk
$produk = getDetailProduk($con, $id);

// Query untuk mendapatkan daftar kategori
$kategori = mysqli_query($con, "SELECT * FROM kategori");
?>

<!-- HTML code for detail_produk.php -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-tshirt text-white"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Toko Fashion</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-bars"></i>
                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="produk.php">Produk</a>
                        <a class="collapse-item active" href="index.php">Home</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="profile.php">Profil Admin</a>
                        <a class="collapse-item" href="#">Waktu Login</a>
                        <a class="collapse-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../image/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Produk</h1>
                    </div>

                    <div class="container">
                        <form action="" method="post">
                            <div>
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" id="nama" name="nama" value="<?php echo $produk['nama']; ?>"
                                    class="form-control">
                            </div>
                            <div>
                                <label for="kategori">Kategori:</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <?php
                                    while ($data = mysqli_fetch_array($kategori)) {
                                        $selected = ($data['id'] == $produk['kategori_id']) ? "selected" : "";
                                        echo "<option value='$data[id]' $selected>$data[name]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="harga" class="form-label">Harga:</label>
                                <input type="number" id="harga" name="harga"
                                    value="<?php echo $produk['harga']; ?>" class="form-control">
                            </div>
                            <div>
                                <label for="detail" class="form-label">Detail:</label>
                                <textarea class="form-control" id="detail"
                                    name="detail"><?php echo $produk['detail']; ?></textarea>
                            </div>

                            <div>
                                <label for="foto" class="form-label">Foto:</label>
                                <img src="../image/<?php echo $produk['foto']; ?>" width="100" height="200"
                                    class="image-fluid">
                                <input type="file" name="foto" id="foto" class="form-control">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                <div>
                                    <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok:</label>
                                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                        <option value="tersedia" <?php if ($produk['ketersediaan_stok'] == 'tersedia') {
                                        echo "selected";
                                    } ?>>Tersedia</option>
                                        <option value="habis" <?php if ($produk['ketersediaan_stok'] == 'habis') {
                                        echo "selected";
                                    } ?>>Habis</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button type="submit" name="update" class="btn btn-success mt-3">Update</button>
                                <button type="submit" name="delete" class="btn btn-danger mt-3">Delete</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Steven <?php echo date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin logout??</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">pilih tombol "logout" jika anda ingin keluar .</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>