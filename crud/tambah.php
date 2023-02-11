<?php
// session_start();

// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

require "../function.php";
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = '../index.php';
        </script>
        ";
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Mahasiswa</title>

    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar bg-success navbar-dark">
        <div class="container">
            <a class="navbar-brand fs-1 fw-semibold mx-auto">Tambah Data Mahasiswa</a>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- form tambah mahasiswa -->
    <section id="tambah">
        <div class="container">
            <form action="" method="post">
                <div class="row bg-light">
                    <div class="col-5 mt-3 mb-1">
                        <label for="nama" class="col-form-label">Masukkan Nama Mahasiswa :</label>
                    </div>
                    <div class="col-7 mt-3 mb-1">
                        <input type="text" id="nama" name="nama" placeholder=" Nama Mahasiswa" required>
                    </div>
                    <div class="col-5 my-1">
                        <label for="npm" class="col-form-label">Masukkan Npm Mahasiswa :</label>
                    </div>
                    <div class="col-7 my-1">
                        <input type="text" id="npm" name="npm" placeholder=" Npm Mahasiswa" required>
                    </div>
                    <div class="col-5 my-1">
                        <label for="email" class="col-form-label">Masukkan Email Mahasiswa :</label>
                    </div>
                    <div class="col-7 my-1">
                        <input type="email" id="email" name="email" placeholder=" Email Mahasiswa" required>
                    </div>
                    <div class="col-5 mb-3 mt-1">
                        <label for="jurusan" class="col-form-label">Masukkan Jurusan Mahasiswa :</label>
                    </div>
                    <div class="col-7 mb-3 mt-1">
                        <input type="text" id="jurusan" name="jurusan" placeholder=" Jurusan Mahasiswa" required>
                    </div>
                </div>
                <div class="row bg-light">
                    <div class="col d-flex justify-content-center">
                        <a href="index.php">
                            <button class="btn btn-success mb-3 fw-semibold" type="submit" name="submit">Tambah Data Mahasiswa</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- akhir form -->
</body>

</html>