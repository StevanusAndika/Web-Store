<?php
session_start();
require "session.php";
require "../koneksi.php";

// Jumlah produk per halaman
$produk_per_halaman = 2;

// Halaman saat ini
$halaman = isset($_GET['halaman']) ? intval($_GET['halaman']) : 1;

// Hitung offset
$offset = ($halaman - 1) * $produk_per_halaman;

// Kueri untuk mengambil total jumlah produk
$query_total = mysqli_query($con, "SELECT COUNT(*) AS total FROM produk");
$data_total = mysqli_fetch_assoc($query_total);
$total_produk = $data_total['total'];

// Kueri untuk mengambil data produk dengan batasan sesuai halaman
$query_produk = mysqli_query($con, "SELECT produk.*, kategori.name AS kategori_name FROM produk LEFT JOIN kategori ON produk.kategori_id = kategori.id LIMIT $offset, $produk_per_halaman");
$jumlah_produk = mysqli_num_rows($query_produk);

// Menghitung total halaman
$total_halaman = ceil($total_produk / $produk_per_halaman);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../boostrap/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../boostrap/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Halaman Kategori</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <linkhref="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link  rel ="stylesheet" href="../css/style.css">
   


    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-tshirt text-white"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Toko Fashion</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
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
                        <a class="collapse-item active" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="produk.php">Produk</a>
                        <a class="collapse-item " href="index.php">Home</a>
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
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?></span>
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
                <div class="container">
                    <!-- Page Heading -->
                </div>
                
        
        <!-- Isi tabel -->
        <div class="container mt-5">
        <h2 class="text-2xl">List produk</h2>
        <button class="btn btn-primary mt-3" onclick="window.location.href='tambah_produk.php'">Tambah produk</button>
        
    </form>
        <table id=" tabel-produk class" class="table table-responsive mt-4 no-scroll">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Detail</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($jumlah_produk == 0) {
                    echo "<tr>
                            <td colspan='6'>Tidak ada produk</td>
                          </tr>";
                } else {
                    $no = 1 + ($halaman - 1) * $produk_per_halaman;
                    while ($data = mysqli_fetch_array($query_produk)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['kategori_name']; ?></td>

                    <td><img src="../image/<?php echo $data['foto']; ?>" width="100" height="100" ></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['detail']; ?></td>
                    <td><?php echo $data['ketersediaan_stok']; ?></td>
                    <td><a href='detail_produk.php?q=<?php echo $data['nama']; ?>&id=<?php echo $data['id']; ?>' class='btn btn-primary'>Detail</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <!-- Tambahkan navigasi halaman di sini -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $total_halaman; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='?halaman=$i'>$i</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</body>
</div>
<br>
<br>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
    function cetakPDF() {
       
    }
</script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>

    <script src="../js/sb-admin-2.min.js"></script>
</body>
</html>
