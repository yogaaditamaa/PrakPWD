<?php

echo "<head><title>My Guest Book</head></title>";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$status = $_POST['status'];
$komentar = $_POST['komentar'];

$data = "\n$nama|$alamat|$email|$status|$komentar";
$fp = fopen("guestbook.txt", "a");
fwrite($fp, $data);

fclose($fp);
echo "Terima Kasih Atas Partisipasi Anda Mengisi Buku Tamu<br>";
echo "<a href=tampilan.php> Isi Buku Tamu </a><br>";
echo "<a href=lihat.php> Lihat Buku Tamu </a><br>";
