<?php
include "koneksi.php";  //menghubungkan ke data base
header('Content-Type: text/xml'); //fungsi menggunakan xml
$query = "SELECT * FROM mahasiswa"; //mengambil data dari tabel mahasiswa
$hasil = mysqli_query($con,$query); //menerjemahkan fungsi query ke mysql dari php
$jumField = mysqli_num_fields($hasil); //Mengembalikan jumlah bidang dalam hasil set
echo "<?xml version='1.0'?>";
echo "<data>";
    while ($data = mysqli_fetch_array($hasil)) //perulangan yang akan terus berjalan sampai jumlah data
    {
    echo "<mahasiswa>";
        echo"<nim>",$data['nim'],"</nim>";
        echo"<nama>",$data['nama'],"</nama>";
        echo"<jkel>",$data['jkel'],"</jkel>";
        echo"<alamat>",$data['alamat'],"</alamat>";
        echo"<tgllhr>",$data['tgllhr'],"</tgllhr>";
        echo "</mahasiswa>";
    }
    echo "</data>";
?>