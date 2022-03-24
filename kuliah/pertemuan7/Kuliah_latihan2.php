<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Get</title>
</head>
<body>
    <!-- Mengirim data menggunakan get -->
    <a href="Kuliah_latihan3.php?nama=Galih">Kirim Data Nama </a>

    <!-- Mengirim data menggunakan post -->
    <form action="kuliah_latihan3.php">
        <label for = "nama">Nama : </label>
        <input type="text" name="nama" id="nama">
    
    <hr>
    <button type="submit">Kirim</button>


    </form>
</body>
</html>