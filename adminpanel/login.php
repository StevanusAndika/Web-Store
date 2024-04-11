<?php
session_start();
require "../koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="main d-flex flex-column justify-content-center align-items-center">
    <div class="login-box p-5 shadow">
        <form action="" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" autocomplete="off">
            </div>
            <div>
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                    <button type="button" id="showPasswordBtn" class="btn btn-outline-secondary">Show</button>
                </div>
            </div>
            <div>
                <button type="submit" name="loginbtn" id="loginbtn" class="btn btn-success form-control mt-3">Login</button>
            </div>
        </form>
    </div>
    <div class="mt-3" style="width:500px;">
        <?php
        if (isset($_POST['loginbtn'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
            $data = mysqli_fetch_array($query);
            $countdata = mysqli_num_rows($query);
            if ($countdata > 0) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;
                    header("location:index.php");
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Username / Password salah
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-info" role="alert">
                    Akun tidak ditemukan
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<script>
    document.getElementById('showPasswordBtn').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        var passwordType = passwordInput.getAttribute('type');
        if (passwordType === 'password') {
            passwordInput.setAttribute('type', 'text');
            this.textContent = 'Hide';
        } else {
            passwordInput.setAttribute('type', 'password');
            this.textContent = 'Show';
        }
    });
</script>

</body>
</html>
