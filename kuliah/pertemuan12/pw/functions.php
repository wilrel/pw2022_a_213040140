<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw2022_d');
}

function  query($query)
{
  $db = koneksi();

  $result = mysqli_query($db, $query);

  // Jika Hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $db = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
                  mahasiswa 
                VALUES
                (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
  mysqli_query($db, $query) or die(mysqli_error($db));
  return mysqli_affected_rows($db);
}

function hapus($id)
{
  $db = koneksi();
  mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($db));
  return mysqli_affected_rows($db);
}

function ubah($data)
{
  $db = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE mahasiswa SET
            nama = '$nama',
            nrp = '$nrp',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
              WHERE id = $id";
  mysqli_query($db, $query) or die(mysqli_error($db));
  return mysqli_affected_rows($db);
}

function cari($keyword) {
  $db = koneksi();
  $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword' OR nrp LIKE '$keyword' OR email LIKE '$keyword'";
  $result = mysqli_query($db, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}