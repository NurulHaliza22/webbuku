<?php
include('koneksi.php');
$id_buku = $_GET['id_buku'];
$query = "DELETE FROM book WHERE id_buku = '$id_buku'";
$result = mysqli_query($koneksi, $query);

if(!$result) {
	die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
} else {
	echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
}