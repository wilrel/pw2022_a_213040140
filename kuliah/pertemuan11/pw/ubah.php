<?php
require 'functions.php';

// Mengecek Id sudah ada di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}


//Ambil Id dari url
$id = $_GET['id'];

// Query Mahasiswa berdasarkan id
$mahasiswa = query("SELECT *FROM mahasiswa WHERE id = $id");


// cek apakah tombol ubah sudah ditekan !

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diubah');
            document.location.href = 'index.php'    
        </script>";
  } else {
    echo "Data Gagal Diubah";
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $mahasiswa['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          NRP :
          <input type="text" name="nrp" required value="<?= $mahasiswa['nrp']; ?>">
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="text" name="email" required value="<?= $mahasiswa['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required value="<?= $mahasiswa['jurusan']; ?>">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required value="<?= $mahasiswa['gambar']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data !</button>
      </li>
    </ul>

  </form>
</body>

</html>