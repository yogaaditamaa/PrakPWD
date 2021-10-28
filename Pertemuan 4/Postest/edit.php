<?php
	// include database connection file
	include_once("koneksi.php");
	// Check if form is submitted for user update, then redirect to homepage after update
	if(isset($_POST['update'])){
		$nim 	= $_POST['nim'];
		$nama 	= $_POST['nama'];
		$jkel	= $_POST['jkel'];
		$alamat	= $_POST['alamat'];
		$tgllhr	= $_POST['tgllhr'];

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
			// update user data
			$result = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama',jkel='$jkel',alamat='$alamat',tgllhr='$tgllhr' WHERE nim='$nim'");
			// Redirect to homepage to display updated user in list
			header("Location: index.php");
		}
	}else{
		$jmlArray	= NULL;
	}
?>

<?php
	// Display selected user data based on id
	// Getting id from url
	$GETnim = $_GET['nim'];
	// Fetech user data based on id
	$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$GETnim'");
	while($user_data = mysqli_fetch_array($result)){
		$nim = $user_data['nim'];
		$nama = $user_data['nama'];
		$jkel = $user_data['jkel'];
		$alamat = $user_data['alamat'];
		$tgllhr = $user_data['tgllhr'];
	}
?>

<html>
<head>
	<title>Edit Data Mahasiswa</title>
</head>
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	<form name="update_mahasiswa" method="post" action="edit.php">
		<table border="0">

			<?php if ($jmlArray>0): ?>
				<div style="width: 20%;padding: 10px;margin-bottom: 30px;background-color: #df4759;color: #fff;">
					<h4>GAGAL menambah data, terdapat <em>form</em> yang belum diisi</h4>
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
				<td>NIM</td>
				<td><input type="text" name="nim" value="<?= $nim;?>" readonly></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?= $nama;?>"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="text" name="jkel" value="<?= $jkel;?>"></td>
			</tr>
			<tr>
				<td>alamat</td>
				<td><input type="text" name="alamat" value="<?= $alamat;?>"></td>
			</tr>
			<tr>
				<td>Tgl Lahir</td>
				<td><input type="text" name="tgllhr" value="<?= $tgllhr;?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>