<?php
	include 'koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		echo "<b>Hasil pencarian : ".$cari."</b>";
	}
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Kode MK</th>
        <th>Nama Mata Kuliah</th>
        <th>Nilai</th>
    </tr>

    <?php
			if(isset($_GET['cari'])){
				$cari 	= $_GET['cari'];
				$sql 	= "SELECT
							mahasiswa.NIM, nilai, mahasiswa.nama AS namaMahasiswa, kode, matakuliah.nama AS namaMK FROM khs
							INNER JOIN mahasiswa ON khs.NIM=mahasiswa.nim
							INNER JOIN matakuliah ON khs.kodeMK=matakuliah.kode
							WHERE mahasiswa.NIM='$cari'";
				$tampil = mysqli_query($con,$sql);
			}else{
				$sql 	= "SELECT
							mahasiswa.NIM, nilai, mahasiswa.nama AS namaMahasiswa, kode, matakuliah.nama AS namaMK FROM khs
							INNER JOIN mahasiswa ON khs.NIM=mahasiswa.nim
							INNER JOIN matakuliah ON khs.kodeMK=matakuliah.kode";
				$tampil = mysqli_query($con,$sql);
			}

			$no = 1;
			while($r = mysqli_fetch_array($tampil)){
		?>

    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $r['NIM']; ?></td>
        <td><?php echo $r['namaMahasiswa']; ?></td>
        <td><?php echo $r['kode']; ?></td>
        <td><?php echo $r['namaMK']; ?></td>
        <td><?php echo $r['nilai']; ?></td>
    </tr>

    <?php } ?>

</table>