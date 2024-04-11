<?php 
require "../koneksi.php";
require "session.php";

$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$_SESSION[username]'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
        
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row align-items-center justify-content-center">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../image/undraw_profile.svg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              
            <h5 class="my-3"><?php echo $data['username'] ?></h5>
            <p class="text-muted mb-1"></p>
            <p class="text-muted mb-4"><?php echo "password : rahasia" ?></p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary"><a href="#" class="text-white">Edit</button></a>
              <button type="button" class="btn btn-outline-primary ms-1" onclick="window.location.href='index.php';">Kembali</button>

            </div>
          </div>
        </div>
        
  </div>
</section>
</body>
</html>