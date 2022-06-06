<?php

require "session.php";
require "../koneksi.php";

$id = $_GET['r'];
$query = mysqli_query($db, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.id_kategori=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($db, "SELECT * FROM kategori WHERE id != '$data[id_kategori]'");


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
  <title>Detail Produk</title>
</head>
<style>
  form div {
    margin-bottom: 9px;
  }
</style>

<body>
  <?php require 'navbar.php'; ?>

  <div class="container mt-5">
    <h2>Detail Produk</h2>
    <div class="col-11 col-md-6">
      <form action="" method="POST" enctype="multipart/form-data">
        <div>
          <label for="nama">Nama</label>
          <input type="text" id="nama" value="<?php echo $data['nama'] ?>" name="nama" class="form-control" autocomplete="off" required>
        </div>
        <div>
          <label for="kategori">Kategori</label>
          <select name="kategori" id="kategori" class="form-control" required>
            <option value="<?= $data['id_kategori']; ?>"><?= $data['nama_kategori']; ?></option>
            <?php
            while ($dataKategori = mysqli_fetch_array($queryKategori)) {
            ?>
              <option value="<?php echo $dataKategori['id'] ?>"><?= $dataKategori['nama']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <label for="currentGambar">Gambar Saat Ini</label>
          <img src="../img/<?php echo $data['gambar']; ?>" alt="" width="250px">
        </div>
        <div>
          <label for="gambar">Gambar</label>
          <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <div>
          <label for="detail">Detail</label>
          <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
            <?= $data['detail']; ?>
          </textarea>
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary" name="simpan">Ubah</button>
          <button type="submit" class="btn btn-danger " name="hapus">Hapus</button>
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
          <div class="alert alert-warning mt-3" role="alert">
            Nama Wajib Diisi dan Kategori Wajib Dipilih !!
          </div>
          <?php
        } else {
          $queryUpdate = mysqli_query($db, "UPDATE produk SET id_kategori='$kategori', nama='$nama', detail='$detail' WHERE id='$id'");

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

                $queryUpdate = mysqli_query($db, "UPDATE produk SET gambar='$newName' WHERE id = '$id'");

                if ($queryUpdate) {
                ?>
                  <div class="alert alert-primary mt-3">
                    Produk Berhasil Diubah
                  </div>

                  <meta http-equiv="refresh" content="2; url=produk.php">
          <?php
                } else {
                  echo mysqli_error($db);
                }
              }
            }
          }
        }
      }
      if (isset($_POST['hapus'])) {
        $queryHapus = mysqli_query($db, "DELETE FROM produk WHERE id = '$id'");

        if ($queryHapus) {
          ?>
          <div class="alert alert-primary mt-3">
            Produk Berhasil Dihapus
          </div>
          <!-- Pengganti Ajax -->
          <meta http-equiv="refresh" content="2; url=produk.php">

      <?php
        }
      }
      ?>
    </div>
  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>