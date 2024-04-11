<?php
require "../koneksi.php";
require "session.php";


$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE id = '$id'");
$data = mysqli_fetch_array($query);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet " href = "../boostrap/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Halaman Kategori</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8428/8428349.png">
</head>
<body>

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Fitur
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-bars"></i>

                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item active" href="kategori.php">Kategori</a>

                        <a class="collapse-item" href="produk.php">Produk</a>
                        <a class="collapse-item" href="index.php">Home</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="profile.php">Profil</a>
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

                  
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../image/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Saya
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
                <div class="container">
                    <h2 class="text-2xl">Detail kategori</h2>
                    <div class="col-12 col-md-6">
                       
                        <form action="" method="post">
                        <div class="card shadow">
                        <input type="text" name="kategori" id="kategori" value="<?php echo $data['name']; ?>">

                        

                        </div>
                        <div class="mt-5 d-flex justify-content-between">
                            <button  type="submit" name="submit" class="btn btn-success">Ubah</button>
                            <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                        </div>
                        
                    </div>
                    </form>
                    <?php 

                    if(isset($_POST['submit'])){
                    $kategori = $_POST['kategori'];

                    if ($data['name'] == $kategori) {
                        echo "<div class='alert alert-warning mt-3'role='alert'>Kategori tidak diubah</div>";
                        echo "<meta http-equiv='refresh' content='0; url=detail.php?q=$data[name]&id=$data[id]'>";

                    } else {
                    $query = mysqli_query($con,"SELECT * FROM kategori WHERE name = '$kategori'");
                    $jumlahData = mysqli_num_rows($query);
                    if ($jumlahData > 0) {
                        echo "<div class='alert alert-danger mt-3'role='alert'>Kategori sudah ada</div>";

                    } else {
                        $query = mysqli_query($con,"UPDATE kategori SET name = '$kategori' WHERE id = '$data[id]'");
                        echo "<div class='alert alert-success mt-3'role='alert'>Kategori berhasil diupdate</div>";
                        echo "<button><a href='detail.php?q=$data[name]&id=$data[id]' class='btn btn-primary'>Kembali</a></button>";


                    }
                    }
                }
                if (isset($_POST['delete'])) {
                $cek = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$data[id]'");
                $jumlah_cek = mysqli_num_rows($cek);
                if ($jumlah_cek > 0) {
                    echo "<div class='alert alert-danger mt-3' role='alert'>Kategori tidak bisa dihapus karena masih digunakan di produk</div>";
                   
                }
                

                    $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id = '$id'");
                    if ($queryDelete) {
                        echo "<div class='alert alert-success mt-3' role='alert'>Kategori berhasil dihapus</div>";
                        echo "<meta http-equiv='refresh' content='0; url=kategori.php'>";
                    } else {
                        echo "<div class='alert alert-warning mt-3' role='alert'>Kategori gagal dihapus</div>";
                    }
                }
                

                

                    ?>

                </div>

            </div>
                        <!-- Begin Page Content -->
                

            
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


</body>
</html>
