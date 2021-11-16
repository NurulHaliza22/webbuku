<?php
	include('koneksi.php');

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

			$query = "INSERT INTO book (judul, pengarang, penerbit, gambar, harga_buku) VALUES ('$judul', '$pengarang', '$penerbit', '$nama_gambar_baru', '$harga_buku')";
			$result = mysqli_query($koneksi, $query);

			if(!$result) {
				die("query Error : ".mysql_errno($koneksi)."-".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
			}

		} else {
			echo "<script>alert('Ekstensi gambar hanya boleh jpg dan png!');window.location='tambah_buku.php';</script>";
		}
	
	} else {
		$query = "INSERT INTO book (judul, pengarang, penerbit, harga_buku) VALUES ('$judul', '$pengarang', '$penerbit', '$harga_buku')";
			$result = mysqli_query($koneksi, $query);

			if(!$result) {
				die("query Error : ".mysql_errno($koneksi)."-".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
			}
	}

?>