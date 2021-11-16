<?php include('koneksi.php'); 

	if(isset($_GET['id_buku'])) {
		$id_buku = $_GET['id_buku'];
		$query = "SELECT * FROM book WHERE id_buku = '$id_buku'";
		$result = mysqli_query($koneksi, $query);
		if(!$result) {
			die("Query Error :".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}
		$data = mysqli_fetch_assoc($result);

		if(!count($data)) {
			echo "<script>alert('Data tidak ditemukan pada tabel.');window.location='index.php';</script>";
		}

	} else {
		echo "<script>alert('Masukkan ID yang ingin di edit');window.location='index.php';</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FORM BOOK</title>
	<style type="text/css">
		* {
			font-family: "Trebuchet MS";
		}

		h1 {
			text-transform: uppercase;
			color: darkblue;
		}
		.base {
			width: 400px;
			padding: 20px;
			margin-left: auto;
			margin-right: auto;
			background-color: #EDEDED;
		}
		label {
			margin-top: 10px;
			float: left;
			text-align: left;
			width: 100%;
		}
		input {
			padding: 6px;
			width: 100%;
			box-sizing: border-box;
			background-color: #F8F8F8;
			border: 2px solid #CCC;
			outline-color: darkblue;
		}
		button {
			background-color: darkblue;
			color: #FFF;
			padding: 10px;
			font-size: 12px;
			border: 0;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<center><h1>Form Edit Buku <?php echo $data['judul']; ?></h1></center>
	<form method="POST" action="proses_edit.php" enctype="multipart/form-data">
	<section class="base">
		<div>
			<label>Judul Buku</label>
			<input type="text" name="judul" autofocus=""required="" value="<?php echo $data['judul']; ?>" />
		</div>
		<div>
			<label>Pengarang</label>
			<input type="text" name="pengarang" required="" value="<?php echo $data['pengarang']; ?>" />
		</div>
		<div>
			<label>Penerbit</label>
			<input type="text" name="penerbit" required="" value="<?php echo $data['penerbit']; ?>" />
		</div>
		<div>
			<label>Gambar</label>
			<img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
			<input type="file" name="gambar" />
			<i style="float: left;font-size: 11px;color: red;">Abaikan jika tidak merubah gambar buku</i>
		</div>
		<div>
			<label>Harga Buku</label>
			<input type="text" name="harga_buku" required="" value="<?php echo $data['harga_buku']; ?>" />
		</div>
		<div>
			<br>
			<button type="submit">Simpan Perubahan</button>
		</div>
	</form>
	</section>
</body>
</html>