<?php
$db = mysqli_connect("localhost", "root", "090807", "projek1");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $box = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $box[] = $data;
    }
    return $box;
}

// fungsi tambah data
function tambah($tambah)
{
    global $db;
    // ambil data dari tiap variabel dalam form
    $nama = htmlspecialchars($tambah["nama"]);
    $npm = htmlspecialchars($tambah["npm"]);
    $email = htmlspecialchars($tambah["email"]);
    $jurusan = htmlspecialchars($tambah["jurusan"]);
    // htmlspecialchars() berfungsi sebagai melihat script html jika ditambahkan pada form yg telah dibuat.

    // query insert data
    $insert = "INSERT INTO mahasiswa (nama, npm, email, jurusan) 
                VALUES ('$nama', '$npm', '$email', '$jurusan')";
    mysqli_query($db, $insert);

    return mysqli_affected_rows($db);
}

// fungsi hapus data
function hapus($hapus)
{
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $hapus");
    return mysqli_affected_rows($db);
}

// fungsi ubah data
function ubah($ubah)
{
    global $db;
    $id = $ubah["id"];
    $nama = htmlspecialchars($ubah["nama"]);
    $npm = htmlspecialchars($ubah["npm"]);
    $email = htmlspecialchars($ubah["email"]);
    $jurusan = htmlspecialchars($ubah["jurusan"]);
    // htmlspecialchars() berfungsi sebagai melihat script html jika ditambahkan pada form yg telah dibuat.

    // query update data
    $update = "UPDATE mahasiswa SET nama = '$nama', npm = '$npm', email = '$email', 
    jurusan = '$jurusan' WHERE id = $id";
    mysqli_query($db, $update);

    return mysqli_affected_rows($db);
}

// fungsi cari data
function cari($cari)
{
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%' OR npm LIKE '%$cari%'";
    return query($query);
}

// fungsi daftar akun
function daftar($daftar)
{
    global $db;
    $username = strtolower(stripslashes($daftar["username"]));
    $password = mysqli_real_escape_string($db, $daftar["password"]);
    $password2 = mysqli_real_escape_string($db, $daftar["password2"]);

    // cek username sudah terdaftar atau belum
    $user = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($user)) {
        echo "<script>
        alert('Username sudah terdaftar!')
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('Password dan Konfirmasi Password tidak sama!');
        </script>";
        return false;
    }

    // enkripsi password
    $enkripsi = password_hash($password, PASSWORD_DEFAULT);

    // query daftar akun
    mysqli_query($db, "INSERT INTO user (username, password) VALUES ('$username', '$enkripsi')");

    return mysqli_affected_rows($db);
}
