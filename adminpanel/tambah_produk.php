<?php
session_start();
require "session.php";
require "../koneksi.php";

$kategori = mysqli_query($con, "SELECT * FROM kategori");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/8428/8428349.png">

    <title>Tambah Produk</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

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
                        
                        <a class="collapse-item " href="kategori.php">Kategori</a>

                        <a class="collapse-item active" href="produk.php">Produk</a>
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
                <div class="container mt-5">
                <h2 class="text-2xl">Tambah Produk</h2>
                </div>

        <div class=" my-5 col-12 col-md-6">
        <form action="" method="post" enctype="multipart/form-data"> <!-- Ganti "proses_tambah_produk.php" dengan nama file yang sesuai -->
    <div class="mt-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama"  placeholder="Input nama barang ..." autocomplete="off">
    </div>
    <div class="mt-3">
        <label for="deskripsi" class="form-label">Kategori</label>
        <select name="kategori" class="form-control" id="kategori">
            <?php
            while ($data = mysqli_fetch_array($kategori)) {
                echo "<option value=''>Pilih Kategori</option>";
                echo "<option value='$data[id]'>$data[name]</option>";
            }
            ?>
        </select>
    </div>
    <div class="mt-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga"  placeholder="Input harga ..." autocomplete="off">
    </div>
    <div class="mt-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file"name="foto" id="foto" class="form-control">
    </div>
    <div class="mt-3">
        <label for="detail" class="form-label">Detail</label>
        <textarea class="form-control" id="detail" name="detail"  autocomplete="off"></textarea>
    </div>
    <div class="mt-3">
        <label for="deskripsi" class="form-label">Stok</label>
        <select name="ketersediaan_stok" class="form-control" id="ketersediaan_stok">
            <option value="tersedia">Tersedia</option>
            <option value="habis">Habis</option>
        </select>
    </div>
    <div class="mt-3">
        <button type="submit" name="simpan" class="btn btn-success">Submit</button>
    </div>
    </form>
    <?php 
    if (isset($_POST['simpan'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $kategori_id = htmlspecialchars($_POST['kategori']); // Perbaikan: ganti $kategori dengan $kategori_id
        $harga = htmlspecialchars($_POST['harga']);
        $detail = htmlspecialchars($_POST['detail']);
        $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);
    
        // UPLOAD FOTO
        $file = $_FILES['foto'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
    
        $uploadDirectory = '../image/';
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // dapatekstensi file
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg', 'gif');
    
        if (in_array($fileExt, $allowedExtensions)) {
            if ($fileError === 0) {
                if ($fileSize < 5000000) { // Batasan ukuran file (dalam byte)
                    $newFileName = uniqid('', true) . "." . $fileExt;
                    $uploadPath = $uploadDirectory . $newFileName;
                    move_uploaded_file($fileTmpName, $uploadPath);
    
                    // Simpan data ke database
                    $query = "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES ('$kategori_id', '$nama', '$harga', '$newFileName', '$detail', '$ketersediaan_stok')";
                    $result = mysqli_query($con, $query);
    
                    if ($result) {
                        echo "<div class='alert alert-success mt-3' role='alert'>Data berhasil disimpan!</div>";
                        echo "<meta http-equiv='refresh' content='5; url=produk.php'>";
                    } else {
                        echo "<div class='alert alert-danger mt-3' role='alert'>Gagal menyimpan data ke database!</div>";
                        echo "<meta http-equiv='refresh' content='5; url=produk.php'>";
                    }
                } else {
                    echo "<div class='alert alert-danger mt-3' role='alert'>Ukuran file terlalu besar!</div>";
                    echo "<meta http-equiv='refresh' content='5; url=produk.php'>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Terjadi kesalahan saat mengupload file!</div>";
                echo "<meta http-equiv='refresh' content='5; url=produk.php'>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Tipe file tidak diizinkan!</div>";
            echo "<meta http-equiv='refresh' content='5; url=produk.php'>";
        }
    }
    ?>
    
            
            
        
        </div>

    
    

                    </div>

            

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
