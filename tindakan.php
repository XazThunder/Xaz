<?php
	$koneksi = new mysqli("localhost","root","","arkademy");
	if(isset($_GET['Ubah'])){
		$perintah=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[Ubah]'");
		$baris=$perintah->fetch_assoc();
?>
		<form method="post">
			<h4>ID Produk</h4>
			<input type="text" placeholder="Masukkan ID Produk..." id="id" name="id" value="<?php echo $baris['id_produk'] ?>" readonly>
			<h4>Nama Produk</h4>
			<input type="text" placeholder="Masukkan Nama Produk..." id="nama" value="<?php echo $baris['nama_produk'] ?>" name="nama">
			<h4>Keterangan Produk</h4>
			<textarea style="width: 170px" id="keterangan" name="keterangan" placeholder="Masukan Keterangan Produk..."><?php echo $baris['keterangan'] ?></textarea>
			<h4>Harga Produk</h4>
			<input type="number" placeholder="Masukkan Harga Produk..." id="harga" name="harga" value="<?php echo $baris['harga'] ?>">
			<h4>Jumlah Produk</h4>
			<input type="number" placeholder="Masukkan Jumlah Produk..." id="jumlah" name="jumlah"value="<?php echo $baris['jumlah'] ?>">
			<br><br><input style="margin-bottom: 10px" type="submit" name="update" value="Update">
		</form>
	<?php if (isset($_POST['update'])) {
			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', keterangan='$_POST[keterangan]', harga='$_POST[harga]', jumlah='$_POST[jumlah]' WHERE id_produk='$_GET[Ubah]'");
		 	echo "<script>alert('Produk telah diubah')</script>";
		  	echo "<meta http-equiv='refresh' content='1;url=arkademy.php'>";
		}
	}else{
		$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[Hapus]'");
		echo "<script>alert('Produk telah dihapus')</script>";
		echo "<meta http-equiv='refresh' content='1;url=arkademy.php'>";
	} ?>