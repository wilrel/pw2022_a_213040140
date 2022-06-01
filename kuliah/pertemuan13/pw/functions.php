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

function login ($data) {
  $db = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);
// cek username
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek password
    if(password_verify($password, $user['password'])) {
      //set session 
      $_SESSION['login'] = true;
      header("Location: index.php");
      exit;
    } 
  } 
    return [
      'error' => true,
      'pesan' => 'Username / Password Salah !'
    ];
}

function registrasi ($data)
{
  $db = koneksi();
  $username = htmlspecialchars(strtolower($data['username']));
  $password1= mysqli_real_escape_string($db, $data['password1']);
  $password2= mysqli_real_escape_string($db, $data['password2']);


// Jika Username atau password kosong
  if(empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
    alert('username / password tidak boleh kosong!');
    document.location.href = 'registrasi.php';
    </script>";
    return false;
  }  

  // Jika username sudah ada
  if (query ("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
      alert('Username Sudah Terpakai!');
      document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // Jika Password tidak sesuai
  if ( $password1 !== $password2) {
    echo "<script>
        alert('konfirmasi password tidak sesuai !');
        document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // Jika Password < 5 digit
  if(strlen($password1) < 8) {
    echo "<script>
      alert('Password terlalu pendek, Minimal 8 Digit !');
      document.location.href = 'registrasi.php';
        </script>";
        return false;
  }

  // Jika Password Dan Username Sesuai
  // Enkripsi Password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // Insert ke tabel user
  $query = "INSERT INTO user
                VALUES 
            (null, '$username', '$password_baru')
            ";
  mysqli_query($db, $query) or die(mysqli_error($db));
  return mysqli_affected_rows($db);          

}