<?php

require "session.php";
require "../koneksi.php";
$query = mysqli_query($db, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.id_kategori=b.id");
$jumlahProduk = mysqli_num_rows($query);

$queryKategori = mysqli_query($db, "SELECT * FROM kategori");

function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/37eb096f3a.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk</title>
</head>

<style>
  .no-decoration {
    text-decoration: none;

  }

  form div {
    margin-bottom: 9px;
  }
</style>

<body>
  <?php require 'navbar.php' ?>
  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <a class="no-decoration text-muted" href="index.php"><i class="fa-solid fa-house"></i> Home
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Produk
        </li>
      </ol>
    </nav>

    <!-- tambah produk -->
    <div class="my-5 col-12 col-md-6">
      <h3>Tambah Produk</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <div>
          <label for="nama">Nama</label>
          <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
        </div>
        <div>
          <label for="kategori">Kategori</label>
          <select name="kategori" id="kategori" class="form-control" required>
            <option value="">Pilih Satu</option>
            <?php
            while ($data = mysqli_fetch_array($queryKategori)) {
            ?>
              <option value="<?php echo $data['id'] ?>"><?= $data['nama']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <label for="gambar">Gambar</label>
          <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <div>
          <label for="detail">Detail</label>
          <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div>
          <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </div>
      </form>

      <?php
      if (isset($_POST['simpan'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $kategori = htmlspecialchars($_POST['kategori']);
        $detail = htmlspecialchars($_POST['detail']);

        $target_dir = "../img/";
        $nama_file = basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . $nama_file;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $image_size = $_FILES['gambar']['size'];
        $random_name = generateRandomString(20);
        $newName = $random_name . "." . $imageFileType;

        if ($nama == '' || $kategori == '') {
      ?>
          <div class="alert alert-warning mt-3" role="alert">Nama Wajib Diisi dan Kategori Wajib Dipilih !!</div>
          <?php
        } else {
          if ($nama_file != '') {
            if ($image_size > 1000000) {
          ?>
              <div class="alert alert-danger mt-3" role="alert">Gambar Tidak Boleh Lebih Dari 1 MB!!</div>
              <?php
            } else {
              if ($imageFileType != 'jpg' && $imageFileType != 'gif' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
              ?>
                <div class="alert alert-danger mt-3" role="alert">Syarat Tipe Gambar Tidak Terpenuhi !</div>
            <?php
              } else {
                move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir . $newName);
              }
            }
          }
          //Query Insert ke tabel produk
          $queryTambah = mysqli_query($db, "INSERT INTO produk (id_kategori, nama, gambar, detail) VALUES ('$kategori', '$nama', '$newName', '$detail')");
          if ($queryTambah) {
            ?>
            <div class="alert alert-primary mt-3">
              Produk Berhasil Disimpan
            </div>
            <meta http-equiv="refresh" content="1; url=produk.php">
      <?php
          } else {
            echo mysqli_error($db);
          }
        }
      }
      ?>

    </div>
    <div class="mt-5">
      <h2>List Produk</h2>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No. </th>
              <th>Kategori</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($jumlahProduk == 0) {
            ?>
              <tr>
                <td colspan=3 class="text-center">Produk Tidak Tersedia</td>
              </tr>
              <?php
            } else {
              $jumlah = 1;
              while ($data = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?= $jumlah; ?></td>
                  <td><?= $data['nama_kategori']; ?></td>
                  <td><?= $data['nama']; ?></td>

                  <td><a href="produk-detail.php?r=<?= $data['id']; ?>" class="btn btn-info"> <i class="fa-solid fa-circle-info"></i></a></td>
                </tr>
            <?php
                $jumlah++;
              }
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>