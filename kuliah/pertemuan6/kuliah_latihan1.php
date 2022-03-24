<?php 

// Array Associative
// Array yang key nya ber-Asosiasi / berpasangan dengan string
  $mahasiswa = [
    ["nama" => "Sandhika Galih", "npm" => "043040023", "email" => "sandhikagalih@unpas.ad.id", "jurusan" => "Teknik Informatika"],
    ["nama" => "Doddy Ferdiansyah", "npm" => "103040001","email" => "doddy@gmail.com", "jurusan" =>"Teknik Mesin"],
    ["nama" => "Reza Dwi Pranata Iskandar", "npm" => "213040139" , "email" => "rdp@gmail.com", "jurusan" =>"Teknik Informatika"],
    ["nama" => "Wildan Nasrulloh Reliyanto", "npm" =>"213040140", "email" =>"wildannasrulloh321@gmail.com", "jurusan" =>"Teknik Informatika"]
    
];

//var_dump($mahasiswa[3]["email"]);
?>

<?php foreach($mahasiswa as $mhs) { ?>
	<ul>
        <li>Nama : <?php echo $mhs["nama"];?></li>
        <li>NPM : <?php echo $mhs["npm"]; ?></li>
        <li>Email : <?php echo $mhs["email"]; ?></li>
        <li>Jurusan : <?php echo $mhs["jurusan"];?></li>
    </ul>

<?php } ?>