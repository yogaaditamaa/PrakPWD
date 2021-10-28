<?php
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nim 	= $_POST['nim'];
		$nama 	= $_POST['nama'];
		$jkel 	= $_POST['jkel'];
		$alamat = $_POST['alamat'];
		$tgllhr = $_POST['tgllhr'];

		if(empty($nim)){
			$arrayGagal[] = "NIM anda belum diisi!";
		}
		if(empty($nama)){
			$arrayGagal[] = "NAMA anda belum diisi!";
		}
		if(empty($jkel)){
			$arrayGagal[] = "JENIS KELAMIN anda belum diisi!";
		}
		if(empty($alamat)){
			$arrayGagal[] = "ALAMAT anda belum diisi!";
		}
		if(empty($tgllhr)){
			$arrayGagal[] = "TANGGAL LAHIR anda belum diisi!";
		}

		$jmlArray	= count($arrayGagal);

		if ($jmlArray===0) {
			// include database connection file
			include_once("koneksi.php");
			// Insert user data into table
			$result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr) VALUES('$nim','$nama', '$jkel','$alamat','$tgllhr')");
			// Show message when user added
			echo "Data berhasil disimpan. <a href='index.php'>View Users</a>";
		}
	}else{
		$nim 		= NULL;
		$nama 		= NULL;
		$jkel 		= NULL;
		$alamat 	= NULL;
		$tgllhr 	= NULL;
		$jmlArray	= NULL; 
	}
?>

<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>

	<form action="tambah.php" method="post" name="form1">
		<table width="25%" border="0">

			<?php if ($jmlArray>0): ?>
				<div style="width: 100%;padding: 10px;margin-bottom: 30px;background-color: #df4759;color: #fff;">
					<h4>Gagal menambah data, terdapat <em>form</em> yang belum diisi</h4>
					<ol>
						<?php
							for ($i=0; $i < $jmlArray; $i++) { 
								echo "<li>$arrayGagal[$i]</li>";
							}
						?>
					</ol>
				</div>
			<?php endif ?>

			<tr>
				<td>Nim</td>
				<td><input type="text" name="nim" value="<?= $nim; ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?= $nama; ?>"></td>
			</tr>
			<tr>
				<td>Gender (L/P)</td>
				<td><input type="text" name="jkel" value="<?= $jkel; ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?= $alamat; ?>"></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td>
				<td><input type="text" name="tgllhr" value="<?= $tgllhr; ?>"></td>
			</tr>
			<tr>
			<td></td>
				<td><input type="submit" name="Submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>