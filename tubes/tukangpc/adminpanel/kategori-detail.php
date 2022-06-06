<?php

require "session.php";
require "../koneksi.php";

$id = $_GET['r'];
$query = mysqli_query($db, "SELECT * FROM kategori WHERE id = '$id'");
$data = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/37eb096f3a.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kategori</title>
</head>

<body>
  <?php
  require 'navbar.php' ?>
  <div class="container mt-5">
    <h2>Detail Kategori</h2>
    <div class="col-11 col-md-6">
      <form action="" method="post">
        <div>
          <label for="kategori">Kategori</label>
          <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama'] ?>">
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary" name="editBtn">Ubah</button>
          <button type="submit" class="btn btn-danger" name="deleteBtn">Hapus</button>
        </div>
      </form>
      <?php
      if (isset($_POST['editBtn'])) {
        $kategori = htmlspecialchars($_POST['kategori']);

        if ($data['nama'] == $kategori) {
      ?>
          <meta http-equiv="refresh" content="0; url=kategori.php">
          <?php
        } else {
          $query = mysqli_query($db, "SELECT * FROM kategori WHERE nama='$kategori'");
          $jumlahData = mysqli_num_rows($query);

          if ($jumlahData > 0) {
          ?>
            <div class="alert alert-danger mt-5" role="alert">
              Kategori Sudah Tersedia
            </div>
            <?php
          } else {
            $querySimpan = mysqli_query($db, "UPDATE kategori SET nama = '$kategori' WHERE id = '$id'");

            if ($querySimpan) {
            ?>
              <div class="alert alert-success mt-4" role="alert">
                Kategori Sukses Diubah
              </div>

              <!-- Pengganti Ajax -->
              <meta http-equiv="refresh" content="0; url=kategori.php">
          <?php
            } else {
              echo mysqli_error($db);
            }
          }
        }
      }

      if (isset($_POST['deleteBtn'])) {
        $queryCheck = mysqli_query($db, "SELECT * FROM produk WHERE id_kategori = '$id'");
        $dataCount = mysqli_num_rows($queryCheck);

        if ($dataCount > 0) {
          ?>
          <div class="alert alert-danger mt-3">
            Kategori Gagal Dihapus, Dikarenakan masih ada produk
          </div>
        <?php
          die();
        }

        $queryDelete = mysqli_query($db, "DELETE FROM kategori WHERE id = '$id'");
        if ($queryDelete) {
        ?>
          <div class="alert alert-primary mt-3">
            Kategori Berhasil Dihapus
          </div>
          <!-- Pengganti Ajax -->
          <meta http-equiv="refresh" content="0; url=kategori.php">
      <?php
        } else {
          echo mysqli_error($db);
        }
      }
      ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>