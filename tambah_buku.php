<?php include('koneksi.php'); ?>
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
	<center><h1>Form Tambah Buku</h1></center>
	<form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
	<section class="base">
		<div>
			<label>Judul Buku</label>
			<input type="text" name="judul" autofocus=""required="" />
		</div>
		<div>
			<label>Pengarang</label>
			<input type="text" name="pengarang" required="" />
		</div>
		<div>
			<label>Penerbit</label>
			<input type="text" name="penerbit" required="" />
		</div>
		<div>
			<label>Gambar</label>
			<input type="file" name="gambar" required="" />
		</div>
		<div>
			<label>Harga Buku</label>
			<input type="text" name="harga_buku" required="" />
		</div>
		<div>
			<button type="submit">Simpan Buku</button>
		</div>
	</form>
	</section>
</body>
</html>