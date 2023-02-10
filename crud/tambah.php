<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "function.php";
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
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
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Masukkan Nama Mahasiswa: </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="npm">Masukkan NPM Mahasiswa: </label>
                <input type="text" name="npm" id="npm" required>
            </li>
            <li>
                <label for="email">Masukkan Email Mahasiswa: </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Masukkan Jurusan Mahasiswa: </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
</body>

</html>