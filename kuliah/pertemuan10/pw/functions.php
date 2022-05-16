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
