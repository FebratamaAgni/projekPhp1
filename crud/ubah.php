<?php

session_start();

if (!isset($_SESSION["masuk"])) {
    header("Location: login.php");
    exit;
}

require "../function.php";

// ambil data dari URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!');
        document.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
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
    <title>Ubah data Mahasiswa</title>

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
            <a class="navbar-brand fs-1 fw-semibold mx-auto">Ubah Data Mahasiswa</a>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- form ubah mahasiswa -->
    <section id="ubah">
        <div class="container">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                <div class="row bg-light">
                    <div class="col-5 mt-3 mb-1">
                        <label for="nama" class="col-form-label">Masukkan Nama Mahasiswa :</label>
                    </div>
                    <div class="col-7 mt-3 mb-1">
                        <input type="text" id="nama" name="nama" placeholder=" Nama Mahasiswa" required value="<?= $mhs["nama"]; ?>">
                    </div>
                    <div class="col-5 my-1">
                        <label for="npm" class="col-form-label">Masukkan Npm Mahasiswa :</label>
                    </div>
                    <div class="col-7 my-1">
                        <input type="text" id="npm" name="npm" placeholder=" Npm Mahasiswa" required value="<?= $mhs["npm"]; ?>">
                    </div>
                    <div class="col-5 my-1">
                        <label for="email" class="col-form-label">Masukkan Email Mahasiswa :</label>
                    </div>
                    <div class="col-7 my-1">
                        <input type="email" id="email" name="email" placeholder=" Email Mahasiswa" required value="<?= $mhs["email"]; ?>">
                    </div>
                    <div class="col-5 mb-3 mt-1">
                        <label for="jurusan" class="col-form-label">Masukkan Jurusan Mahasiswa :</label>
                    </div>
                    <div class="col-7 mb-3 mt-1">
                        <input type="text" id="jurusan" name="jurusan" placeholder=" Jurusan Mahasiswa" required value="<?= $mhs["jurusan"]; ?>">
                    </div>
                </div>
                <div class="row bg-light">
                    <div class="col d-flex justify-content-center">
                        <a href="index.php">
                            <button class="btn btn-success mb-3 fw-semibold" type="submit" name="submit">Ubah Data Mahasiswa</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- akhir form -->
</body>

</html>