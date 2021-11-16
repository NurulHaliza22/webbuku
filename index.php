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
		table {
			border: 1px solid #DDEEEE;
			border-collapse: collapse;
			border-spacing: 0;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		table thead th {
			background-color: #DDEFEF;
			border : 1px solid #DDEEEE;
			color: #0000FF;
			padding: 10px;
			text-align: left;
			text-shadow: 1px 1px 1px #FFF;
		}
		table tbody td {
			border : 1px solid #DDEEEE;
			color: #333;
			padding: 10px;
		}
		a {
			background-color: darkblue;
			color: #FFF;
			padding: 10px;
			font-size: 12px;
			text-decoration: none;
		}

	</style>
</head>
<body>
	<center><h1>Daftar Buku</h1></center>
	<center><a href="tambah_buku.php">+ &nbsp; Tambah Buku</a></center>
	<br>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Gambar</th>
				<th>Harga Buku</th>
				<th>Action</th>

			</tr>
		</thead>
		<tbody>
			<?php
				$query = "SELECT * FROM book ORDER BY id_buku ASC";
				$result = mysqli_query($koneksi, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				$no = 1;

				while ($row = mysqli_fetch_assoc($result)) {
			

			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['judul']; ?></td>
				<td><?php echo $row['pengarang']; ?></td>
				<td><?php echo $row['penerbit']; ?></td>
				<td><img style="width: 120px;" src="gambar/<?php echo $row['gambar']; ?>"></td>
				<td>Rp <?php echo number_format($row['harga_buku'], 0, ',','.'); ?></td>
				<td>
					<a href="edit_buku.php?id_buku=<?php echo $row['id_buku']; ?>">Edit</a>
					<a href="proses_hapus.php?id_buku=<?php echo $row['id_buku']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">Hapus</a>
				</td>

			</tr>
			<?php 
				$no++;

			}
			?>
		</tbody>
	</table>

</body>
</html>