<?php  
	$koneksi = new mysqli("localhost","root","","arkademy");
	$koneksi->query("CREATE TABLE IF NOT EXISTS produk (id_produk INT(10) NOT NULL AUTO_INCREMENT, nama_produk VARCHAR(20) NOT NULL, keterangan VARCHAR(150) NOT NULL, harga INT(20) NOT NULL, jumlah INT(20) NOT NULL, PRIMARY KEY (id_produk)) ENGINE = InnoDB");
?>

<!DOCTYPE html>
<html>
<head>
	<title>BOOTCAMP ARKADEMY</title>
	<style type="text/css">
		.flexbox {
			display: flex;
		}
		h4 {
			margin-top: 10px; 
			margin-bottom: 5px;
		}
		.form {
			text-align: center; 
			border: 1px solid black; 
			width: 30%;
			margin-left: 5%;
		}
	</style>
</head>
<body>
	<h1 align="center" style="margin-bottom: 10px; color: skyblue">BOOTCAMP ARKADEMY</h1>
	<marquee style="margin-bottom: 10px; color: red;"> <i>MUHAMMAD BAHRUL ASHFIYA</i> </marquee>
	<br>
	<div style="text-align: center;  width: 30%; margin-left: 5%;">
		<h2><u>TAMBAH PRODUK</u></h2>
	</div>
	<div class="flexbox">
	<div class="form">
		<form method="post">
			<h4>Nama Produk</h4>
			<input type="text" placeholder="Masukkan Nama Produk..." name="nama">
			<h4>Keterangan Produk</h4>
			<textarea style="width: 170px" name="keterangan" placeholder="Masukan Keterangan Produk..."></textarea>
			<h4>Harga Produk</h4>
			<input type="number" placeholder="Masukkan Harga Produk..." name="harga">
			<h4>Jumlah Produk</h4>
			<input type="number" placeholder="Masukkan Jumlah Produk..." name="jumlah">
			<br><br><input style="margin-bottom: 10px" type="submit" name="tambah" value="Tambah">
		</form>
	</div>
	<div>
		<table border="1" style=" width: 760px; margin-left: 8%; text-align: center;">
			<thead>
				<th>No</th>
				<th>ID Produk</th>
				<th>Nama Produk</th>
				<th>Keterangan</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Tindakan</th>
			</thead>
			<tbody>
				<?php 
					$no=1;
					$perintah= $koneksi->query("SELECT * FROM produk");
					while($baris= $perintah->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $baris['id_produk']; ?></td>
					<td><?php echo $baris['nama_produk']; ?></td>
					<td><?php echo $baris['keterangan']; ?></td>
					<td><?php echo number_format($baris['harga']); ?></td>
					<td><?php echo number_format($baris['jumlah']); ?></td>
					<td style="text-align: center; ">
						<a href="tindakan.php?Ubah=<?php echo $baris['id_produk'] ?>"><button>Update</button></a> 
						<a href="tindakan.php?Hapus=<?php echo $baris['id_produk'] ?>"><button>Delete</button></a>
					</td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>
	</div>
</body>
</html>

<?php 
if(isset($_POST['tambah'])){
  	$koneksi->query("INSERT INTO produk VALUES ('','$_POST[nama]','$_POST[keterangan]','$_POST[harga]','$_POST[jumlah]')");
 	echo "<script>alert('Produk telah ditambahkan')</script>";
  	echo "<meta http-equiv='refresh' content='1;url=arkademy.php'>";
}