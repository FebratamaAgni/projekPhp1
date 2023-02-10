<?php
session_start();

if (isset($_SESSION["masuk"])) {
    header("Location: index.php");
    exit;
}

require "function.php";

if (isset($_POST["masuk"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($user) === 1) {
        // cek password
        $result = mysqli_fetch_assoc($user);
        if (password_verify($password, $result["password"])) {
            // set session
            $_SESSION["masuk"] = true;

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
if (isset($error)) {
    echo "
    <script>
        alert('Username atau Password Salah!!!');
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand ms-auto me-auto fw-bold fs-3" href="#">Login Admin</a>
            </div>
        </nav>
    </div>
    <!-- akhir navbar -->

    <!-- form login -->
    <section id="login">
        <div class="container bg-light">
            <div class="row">
                <form action="" method="post">
                    <div class="col-12 mt-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username Anda" required>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Anda" required>
                    </div>
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary w-100 fw-semibold" type="submit" name="masuk">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- akhir login -->

    <!-- form daftar -->
    <section id="daftar">
        <div class="container bg-light">
            <div class="row">
                <div class="col-12 mt-3">
                    <p>Belum punya akun??</p>
                </div>
                <div class="col-12">
                    <a href="daftar.php">
                        <button class="btn btn-success mb-3 fw-semibold">Daftar Akun!</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir daftar -->


    <!-- javascript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>