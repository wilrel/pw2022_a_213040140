<?php
// Variabel global
//  $nama = "Sandhika"

function cetakNama (){
    // variabel lokal
    $nama = "Galih";
    return "Halo $nama";
}

echo cetakNama();

$nama = "Sandhika";

function cetakNama($nama){
    return "Hallo $nama";
}

echo cetakNama($nama);

$nama = "";
echo $nama;

// SUPERGLOBALS
// Variabel PHP yang bisa kita pakai dimanapun
// Bentuknya adalah array associative
// $_GET
// $_POST
// $_REQUEST
// $_SERVER
// var_dump($_SERVER["SERVER_NAME"]);

// $_GET = [
//     "nama" => "Sandhika"
// ];

$_GET["nama"] = "Sandhika";
$_GET["email"] = "sandhika@gmail.com";
// echo $_GET["nama"];
var_dump($_GET);




?>