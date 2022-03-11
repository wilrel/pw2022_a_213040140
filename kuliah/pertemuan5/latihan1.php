<?php 
//Pertemuan 5 - ARRAY
// array adalah variabel yang dapat menyimpan banyak nilai sekaligus



//Membuat Array 
$hari = ["Senin", "Selasa", "Rabu"];  //Versi baru
$bulan = array("Januari", "Februari", "Maret"); //Versi lama


//Mencetak array
//Menggunakan index, dimulai dari 0
echo $hari[0];
echo "<br>";
echo $bulan[2];
echo "<br>";

//Menggunakan var_dump() atau print_r()
//hanya menggunakan debugging
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<hr>";

//mencetak untuk user
//menggunakan looping
	for ($i = 0; $i < count($hari); $i++ ) {
    	echo $hari[$i];
    	echo "<br>";
    }
//menggunakan foreach
//pengulangan khusus ARRAY 
	foreach($bulan as $b) {
        echo $b;
        echo "<br>";
    }
		echo "<hr>";
//memanipulasi ARRAY
$hari[] = "Jum'at";
$hari[] = "Sabtu";
	print_r($hari);
	echo "<br>";
$bulan[] = "April";
$bulan[] = "Mei";
$bulan[] = "Juni";
$bulan[] = "Juli";
$bulan[] = "Agustus";
	print_r($bulan); 


?>