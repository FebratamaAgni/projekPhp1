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
    <title>Belajar Databases</title>
</head>

<body>
    <h1>Halaman Admin</h1>
    <a href="tambah.php">Tambah data Mahasiswa</a>
    <a style="margin-left: 15px;" href="logout.php">Logout!</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="search" size="30" autocomplete="off" placeholder="Masukkan keyword untuk pencarian..">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?php echo $mhs["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?php echo $mhs["id"]; ?>" onclick="return confirm('Yakin menghapus data?');">Hapus</a>
                </td>
                <td><?php echo $mhs["npm"]; ?></td>
                <td><?php echo $mhs["nama"]; ?></td>
                <td><?php echo $mhs["email"]; ?></td>
                <td><?php echo $mhs["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>