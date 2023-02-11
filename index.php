<?php
// session_start();

// if (!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

// Koneksi ke database mysql
require "function.php";

// melihat semua isi database
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika menggunakan fitur pencarian
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["search"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


</head>

<body>
    <!-- navbar -->
    <nav class="navbar bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand fs-1">Dashboard Admin</a>
            <form class="d-flex">
                <a href="logout.php">
                    <button class="btn btn-light fw-semibold" type="submit">Logout</button>
                </a>
            </form>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- tabel data -->
    <div class="container">
        <div class="row">
            <div class="col-6 my-3">
                <a href="tambah.php">
                    <button class="btn btn-success fw-semibold">Tambah data Mahasiswa</button>
                </a>
            </div>
            <div class="col-6 my-3">
                <form class="d-flex" role="search" action="" method="post">
                    <input class="form-control me-2" type="text" name="search" placeholder="Masukkan keyword untuk pencarian.." aria-label="Search" autocomplete="off">
                    <button class="btn btn-outline-success fw-semibold" type="submit" name="cari">Cari!</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <table class="table">
                    <thead class="table-primary">
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tbody>
                            <td><?php echo $i; ?></td>
                            <td>
                                <a href="ubah.php?id=<?php echo $mhs["id"]; ?>">
                                    <button class="btn btn-info btn-sm text-white fw-semibold" type="submit" name="cari">Ubah</button>
                                </a>
                                <a href="hapus.php?id=<?php echo $mhs["id"]; ?>" onclick="return confirm('Yakin menghapus data?');">
                                    <button class="btn btn-danger btn-sm text-white fw-semibold ms-1" type="submit" name="cari">Hapus</button>
                                </a>
                            </td>
                            <td><?php echo $mhs["npm"]; ?></td>
                            <td><?php echo $mhs["nama"]; ?></td>
                            <td><?php echo $mhs["email"]; ?></td>
                            <td><?php echo $mhs["jurusan"]; ?></td>
                        </tbody>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <!-- akhir tabel -->
</body>

</html>