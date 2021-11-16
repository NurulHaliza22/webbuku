<?php
	include('koneksi.php');

	$id_buku = $_POST['id_buku'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$gambar = $_FILES['gambar']['name'];
	$harga_buku = $_POST['harga_buku'];

	if($gambar != "") {
		$ekstensi_diperbolehkan = array('png', 'jpg');
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['gambar']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_gambar_baru = $angka_acak.'-'.$gambar;

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

			$query = "UPDATE book SET judul = '$judul',pengarang = '$pengarang',penerbit = '$penerbit',gambar = '$nama_gambar_baru',harga_buku = '$harga_buku'";
			$query .= "WHERE id_buku = '$id_buku'";
			$result = mysqli_query($koneksi, $query);

			if(!$result) {
				die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
			}

		} else {
			echo "<script>alert('Ekstensi gambar hanya boleh jpg dan png!');window.location='edit_buku.php';</script>";
		}
	
	} else {
		$query = "UPDATE book SET judul = '$judul',pengarang = '$pengarang',penerbit = '$penerbit',harga_buku = '$harga_buku'";
			$query .= "WHERE id_buku = '$id_buku'";
			$result = mysqli_query($koneksi, $query);

			if(!$result) {
				die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
			}
	}

?>