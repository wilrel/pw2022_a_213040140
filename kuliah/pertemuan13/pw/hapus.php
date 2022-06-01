<?php
session_start();

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// Mengecek Id sudah ada di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}


//mengambil id dari url
$id = $_GET['id'];


if (hapus($id) > 0) {
  echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php'    
        </script>";
} else {
  echo "Data Gagal Dihapus";
}
