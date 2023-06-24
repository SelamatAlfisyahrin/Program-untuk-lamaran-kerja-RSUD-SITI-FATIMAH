<?php include "header_tu.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM tb_buku WHERE kd_buku='$_GET[kd_buku]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<div class="container">
	<div class="page-header">
	<h3>Edit Data Buku</h3>
	</div>
	<form method="post" action="">
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td>KODE BUKU</td>
			<td><input type="text" class="form-control"name="kd_buku" value="<?php echo $e['kd_buku']; ?>" readonly></td>
		</tr>
		<tr>
			<td>NAMA BUKU</td>
			<td><input type="text" class="form-control" name="nama_buku" value="<?php echo $e['nama_buku']; ?>" required></td>
		</tr>
		<tr>
			<td>TINGKAT</td>
			<td><input type="number" class="form-control" name="tingkat" value="<?php echo $e['tingkat']; ?>" required></td>
		</tr>
		<tr>
			<td>TIPE</td>
			<td><input type="text" class="form-control" name="tipe" value="<?php echo $e['tipe']; ?>" required/></td>
		</tr>
		<tr>
			<td>HARGA BUKU</td>
			<td><input type="number" class="form-control" name="harga" value="<?php echo $e['harga']; ?>" required/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-success" value="Update" /></td>
		</tr>
	</table>
	</div>
	
</form>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form
	$kd_buku 	= $_POST['kd_buku'];
	$nama_buku	= $_POST['nama_buku'];
	$tingkat 	= $_POST['tingkat'];
	$tipe 	    = $_POST['tipe'];
	$harga	    = $_POST['harga'];
	
    $update = mysqli_query($konek, "UPDATE tb_buku SET nama_buku='$nama_buku',tingkat='$tingkat',tipe='$tipe',harga='$harga'WHERE kd_buku='$kd_buku'");
		if(!$update){
			echo "Update data gagal...";

		}else{
			echo "<script>
			alert('data berhasil diedit');
			document.location.href = 'data_buku.php';
			</script>
			";
		}
}
?>

</div>

<?php include "footer.php" ?>