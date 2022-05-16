<?php
require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// Query Mahasiswa berdasarkan id
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $mahasiswa['gambar']; ?>" max width="100"></li>
    <li>NRP : <?= $mahasiswa['nrp']; ?></li>
    <li>Nama : <?= $mahasiswa['nama']; ?></li>
    <li>Email : <?= $mahasiswa['email']; ?></li>
    <li>Jurusan : <?= $mahasiswa['jurusan']; ?></li>
    <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
    <li><a href="latihan3.php">Kembali Ke Daftar Mahasiswa</a></li>
  </ul>
</body>

</html>