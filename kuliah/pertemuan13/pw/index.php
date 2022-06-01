<?php
session_start();

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


// Ketika Tombol Cari Diklik

if(isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <a href="logout.php">Logout</a>
  <h3>Daftar Mahasiswa</h3>
  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>
  <form action="" method="POST">
    <input type="text" name="keyword" placeholder="Masukan Nama Untuk Mencari" size="40" autocomplete="off" autofocus class = "keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari !</button>
  </form>
  <br>
  <div class="container">
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
<?php if(empty($mahasiswa)) : ?>
<tr>
  <td colspan="4"><p style="color: red;">Data Mahasiswa Tidak Ditemukan</p></td>
</tr>
<?php endif; ?>
    <?php $i = 1;
    foreach ($mahasiswa as $mhs) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $mhs['gambar']; ?>" alt="" width="100"></td>
        <td><?= $mhs['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $mhs['id']; ?>">Lihat Detail</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  </div>
<script src="js/script.js"></script>
</body>

</html>