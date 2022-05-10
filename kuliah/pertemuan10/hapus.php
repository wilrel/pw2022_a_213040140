<?php  
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

$id = $_GET['id'];

    if (hapus ($id) > 0) {
        echo "
           <script>
           alert(' Data berhasil Dihapus !');
           document.location.href = 'index.php';
           </script>";
    } else {
         echo 'Data Gagal Untuk DiHapus';
    }


?>
